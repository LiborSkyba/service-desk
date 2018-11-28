<?php

namespace App;

use Nette;

/**
 * Description of DevicePresenter
 *
 * @author Majitel
 */
class DevicePresenter extends BasePresenter
{

    /**
     * 
     */
    public function renderList()
    {
            $id = $this->user->getId();
            $costumer = \UserModel::findById($id);
            $devices = \DeviceModel::findByOwner($costumer);
                            
            $this->template->costumer = $costumer;
            $this->template->devices = $devices;
        
    }
    
    /**
     * 
     * @param int $deviceId
     */
    public function renderShow($deviceId)
    {
            $id = $this->user->getId();
            $costumer = \UserModel::findById($id);
            $device = \DeviceModel::findById($deviceId);
            $requests = \RequestModel::findByDevice($device);
                            
            $this->template->costumer = $costumer;
            $this->template->device = $device;       
            $this->template->requests = $requests;

    }
        
    /**
     * 
     * @param int $deviceId
     * @return \Nette\Application\UI\Form
     */
    protected function createComponentDeviceEditForm($deviceId)
    {
        
        $form = new Nette\Application\UI\Form;

        $form->addHidden('deviceId');
        $form['deviceId']->setValue($deviceId);
                
        $device_class = array(
        '1' => 'kopírka',
        '2' => 'multifunkce',
        '3' => 'laserová tiskárna',
        '4' => 'inkoustová tiskárna',
        );
        
        $form->addSelect('device_class_id', 'Druh zařízení:', $device_class)
             ->setPrompt('Zvolte druh zařízení.')
             ->setRequired();

        $form->addText('producer', 'Výrobce:')
            ->setRequired();
        
        $form->addText('name', 'Název zařízení:')
            ->setRequired();

        $form->addText('serial_number', 'Výrobní číslo:')
            ->setRequired();
                
        $form->addSubmit('send', 'Uložit');
        $form->onSuccess[] = $this->deviceEditFormSucceeded;

        return $form;
    }

    /**
     * 
     * @param Form $form
     */
    public function deviceEditFormSucceeded($form)
    {
        $values = $form->getValues();
        $deviceId = $this->getParameter('deviceId');
        
        if (!$this->user->isLoggedIn()) {
           $this->error('Pro vytvoření, nebo editaci zařízení se musíte přihlásit.');
        }        

        if ($deviceId == NULL) {
            $device = new \Device();
            $newDevice = TRUE;            
        } else {
            $device = \DeviceModel::findById($deviceId);
            $newDevice = FALSE;            
        }
       
        $device->setName($values["name"]);
        $device->setProducer($values["producer"]);
        $device->setSerial_number($values["serial_number"]);        
        $device_classId = $values["device_class_id"];        

        $ownerId = $this->user->getId();
        
        if ($newDevice) {
            $deviceId = \DeviceModel::insert($device);
        } else {
            $deviceId = \DeviceModel::updateId($deviceId,$device);
        }

        \DeviceModel::setOwner($deviceId,$ownerId);
        \DeviceModel::setDevice_class($deviceId,$device_classId);

        $this->flashMessage('Vaše zařízení bylo úspěšně uloženo', 'success');
        $this->redirect('Device:list');
    }
    
    /**
     * 
     * @param int $deviceId
     */
    public function actionEdit($deviceId)
        {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }

        $device = \DeviceModel::findById($deviceId);
        if (!$device) {
            $this->error('Zařízení nebylo nalezeno');
        }
        $this['deviceEditForm']->setDefaults(\DeviceModel::toArray($device));
        
    }

    /**
     * 
     */
    public function actionCreate()
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }
    
    /**
     * 
     */
    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.');
        $this->redirect('Homepage:default');
    }
}

