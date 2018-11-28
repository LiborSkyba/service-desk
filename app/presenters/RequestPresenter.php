<?php

namespace App;

use Nette;

/**
 * Description of ZakazkaPresenter
 *
 * @author Majitel
 */
class RequestPresenter extends BasePresenter
{
    
    /**
     * 
     * @param int $requestId
     */
    public function renderShow($requestId)
    {
        
    }

    /**
     * 
     * @param int $requestId
     */
    public function renderDetail($requestId)
    {

        $request = \RequestModel::findById($requestId);                    

        $this->template->request = $request;
        $this->template->device = $request->getDevice();
        $this->template->costumer = $request->getOwner();
        $this->template->technician = $request->getTechnician();
        
    }
    
    /**
     * 
     * @param int $deviceId
     * @return \Nette\Application\UI\Form
     */
    protected function createComponentRequestCreateForm($deviceId)
    {
        $deviceId = $this->getParam('deviceId');

        $form = new Nette\Application\UI\Form;
                
        $request_class = array(
        '1' => 'oprava',
        '2' => 'pravidelná údržba',
        '3' => 'instalace',
        '4' => 'konfigurace',
        );
        $form->addSelect('request_class_id', 'Druh zakázky:', $request_class)
             ->setPrompt('Zvolte druh zakázky.')
             ->setRequired();

        $form->addText('title', 'Stručný název:')
            ->setRequired();

        $form->addTextArea('description', 'Popis zakázky:')
            ->setRequired();
        
        $form->addHidden('device_id', 'Zařízení:');
        $form['device_id']->setValue($deviceId);

        $form->addHidden('request_status_id', 'Stav zakázky:');
        $form['request_status_id']->setValue("1");

        $form->addSubmit('send', 'Uložit zakázku');
        $form->onSuccess[] = $this->requestCreateFormSucceeded;

        return $form;
    }
    
    /**
     * 
     * @param Form $form
     */
    public function requestCreateFormSucceeded($form)
    {
        $values = $form->getValues();
        
        if (!$this->user->isLoggedIn()) {
           $this->error('Pro vytvoření, nebo editování zakázky se musíte přihlásit.');
        }

        $request = new \Request();

        $request->setTitle($values["title"]);
        $request->setDescription($values["description"]);
        $request->setCreated_time(new \DateTime());

        $ownerId = $this->user->getId();
        $deviceId = $values["device_id"];        
        $request_statusId = $values["request_status_id"];        
        $request_classId = $values["request_class_id"];        
        
        $requestId = \RequestModel::insert($request);
        \RequestModel::setOwner($requestId,$ownerId);
        \RequestModel::setDevice($requestId,$deviceId);
        \RequestModel::setRequest_status($requestId,$request_statusId);
        \RequestModel::setRequest_class($requestId,$request_classId);
        
        $this->flashMessage('Vaše zakázka byla úspěšně uložena', 'success');
        $this->redirect('Homepage:default');
    }

    /**
     * 
     * @return \Nette\Application\UI\Form
     */
    protected function createComponentRequestEditForm()
    {
        $form = new Nette\Application\UI\Form;
        
        $request_class = array(
        '1' => 'oprava',
        '2' => 'pravidelná údržba',
        '3' => 'instalace',
        '4' => 'konfigurace',
        );
        $form->addSelect('request_class_id', 'Druh zakázky:', $request_class)
             ->setPrompt('Zvolte druh zakázky.')
             ->setRequired();

        $form->addText('title', 'Stručný název:')
            ->setRequired();

        $form->addTextArea('description', 'Popis zakázky:')
            ->setRequired();
        
        $form->addHidden('request_status_id', 'Stav zakázky:');
        $form['request_status_id']->setValue("1");

        $form->addSubmit('send', 'Uložit zakázku');
        $form->onSuccess[] = $this->requestEditFormSucceeded;

        return $form;
    }
    
    /**
     * 
     * @param Form $form
     */
    public function requestEditFormSucceeded($form)
    {
        $values = $form->getValues();
        $requestId = $this->getParameter('requestId');
        
        if (!$this->user->isLoggedIn()) {
           $this->error('Pro vytvoření, nebo editování zakázky se musíte přihlásit.');
        }

        $request = new \Request();

        $request->setTitle($values["title"]);
        $request->setDescription($values["description"]);
        $request->setCreated_time(new \DateTime());

        $request_classId = $values["request_class_id"];        
        
        \RequestModel::update($requestId,$request);
        \RequestModel::setRequest_class($requestId,$request_classId);
        
        $this->flashMessage('Vaše zakázka byla úspěšně uložena', 'success');
        $this->redirect('Homepage:default');
    }
    
    /**
     * 
     * @param int $requestId
     */
    public function actionEdit($requestId)
        {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
        
        $request = \RequestModel::findById($requestId);
        if (!$request) {
            $this->error('Zakázka nebyla nalezena');
        }
        
        $this['requestEditForm']->setDefaults(\RequestModel::toArray($request));
    }
    
    /**
     * 
     * @param int $deviceId
     */
    public function actionCreate($deviceId)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }            
    }
        
    /**
     * 
     * @param int $requestId
     */
    public function actionAccept($requestId)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }  
        
        \RequestModel::setRequest_status($requestId, 2);
        $this->redirect('Homepage:');

    }

    /**
     * 
     * @param int $requestId
     * @param User $technician
     */
    public function actionAssign($requestId, $technician)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }  
        
        \RequestModel::setRequest_status($requestId, 3);
        \RequestModel::setTechnician($requestId,$technician);
        
        $this->redirect('Homepage:');

    }

    /**
     * 
     * @param int $requestId
     */
    public function actionEnd($requestId)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }  
        
        \RequestModel::ended($requestId);
        $this->redirect('Homepage:');

    }

    /**
     * 
     * @param int $requestId
     */
    public function actionCancel($requestId)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }  
        
        \RequestModel::setRequest_status($requestId, 4);
        $this->redirect('Homepage:');

    }

    /**
     * 
     */
    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.');
        $this->redirect('Homepage:');
    }

}