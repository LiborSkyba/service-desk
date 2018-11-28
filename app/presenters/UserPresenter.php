<?php

namespace App;

use Nette;

/**
 * Description of ZakazkaPresenter
 *
 * @author Majitel
 */
class UserPresenter extends BasePresenter
{

    /**
     * 
     * @param type $userId
     */
    public function renderShow($userId)
    {

    }
    
    /**
     * 
     * @param int $requestId
     */
    public function renderTechList($requestId)
    {
        $request = \RequestModel::findById($requestId);
        $technicians = \UserModel::findTechnicians();

        $this->template->request = $request;
        $this->template->device = $request->getDevice();
        $this->template->costumer = $request->getOwner();
        $this->template->technicianAct = $request->getTechnician();        
        $this->template->technicians = $technicians;        

    }
    
    /**
     * 
     * @param int $roleId
     * @return \Nette\Application\UI\Form
     */
    protected function createComponentUserRegForm($roleId)
    {
		$form = new Nette\Application\UI\Form;
                
                if ($roleId == NULL) $roleId = 1; 

                $form->addText('login_name', 'Login:')
			->setRequired('Zadejte Vaše uživatelské jméno.');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte Vaše heslo.');

		$form->addText('company', 'Firma:');
//			->setRequired('Zadejte název firmy.');

		$form->addText('ico', 'IČO:');
//			->setRequired('Zadejte IČO firmy.');

		$form->addText('dic', 'DIČ:');
//			->setRequired('Zadejte DIČ firmy.');

		$form->addText('surname', 'Příjmení:')
			->setRequired('Zadejte Vaše příjmení.');

		$form->addText('name', 'Jméno:')
			->setRequired('Zadejte Vaše jméno.');

		$form->addText('address', 'Adresa:');
//			->setRequired('Zadejte Vaši adresu (ulice a číslo).');

		$form->addText('town', 'Město:');
//			->setRequired('Zadejte Vaše městoo.');

		$form->addText('postcode', 'PSČ:');
//			->setRequired('Zadejte Vaše PSČ.');

		$form->addText('phone', 'telefon:')
			->setRequired('Zadejte Vaše telefonní číslo.');

		$form->addText('email', 'email:')
			->setRequired('Zadejte Váš email.');

		$form->addSubmit('send', 'Registrovat');

		$form->onSuccess[] = $this->userRegFormSucceeded;
		return $form;
	}

        /**
         * 
         * @param type $form
         */
        public function userRegFormSucceeded($form)
        {

        $values = $form->getValues();

        $user = new \User;
       
        $user->setLogin_name($values["login_name"]);
        $user->setPassword($values["password"]);
        $user->setName($values["name"]);
        $user->setSurname($values["surname"]);
        $user->setAddress($values["address"]);
        $user->setTown($values["town"]);
        $user->setPostcode($values["postcode"]);
        $user->setCompany($values["company"]);
        $user->setIco($values["ico"]);
        $user->setDic($values["dic"]);
        $user->setPhone($values["phone"]);
        $user->setEmail($values["email"]);

        $id = \UserModel::insert($user);

        \UserModel::setRole($id,1);
        
        $this->flashMessage('Vaše údaje byly úspěšně zadány do systému. Nyní se můžete přihlásit', 'success');
        $this->redirect('Sign:in');                       
    }

    /**
     * 
     */
    protected function createComponentUserEditForm()
	{
		$form = new Nette\Application\UI\Form;

                $form->addText('login_name', 'Login:')
			->setRequired('Zadejte Vaše uživatelské jméno.');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte Vaše heslo.');

		$form->addText('company', 'Firma:');
//			->setRequired('Zadejte název firmy.');

		$form->addText('ico', 'IČO:');
//			->setRequired('Zadejte IČO firmy.');

		$form->addText('dic', 'DIČ:');
//			->setRequired('Zadejte DIČ firmy.');

		$form->addText('surname', 'Příjmení:')
			->setRequired('Zadejte Vaše příjmení.');

		$form->addText('name', 'Jméno:')
			->setRequired('Zadejte Vaše jméno.');

		$form->addText('address', 'Adresa:');
//			->setRequired('Zadejte Vaši adresu (ulice a číslo).');

		$form->addText('town', 'Město:');
//			->setRequired('Zadejte Vaše městoo.');

		$form->addText('postcode', 'PSČ:');
//			->setRequired('Zadejte Vaše PSČ.');

		$form->addText('phone', 'telefon:')
			->setRequired('Zadejte Vaše telefonní číslo.');

		$form->addText('email', 'email:')
			->setRequired('Zadejte Váš email.');

		$form->addSubmit('send', 'Uložit změny');

                $form->addSubmit('cancel', 'Zrušit změny')->setValidationScope(NULL);
                
		$form->onSuccess[] = $this->userEditFormSucceeded;
                
		return $form;
	}

        /**
         * 
         * @param Form $form
         */
        public function userEditFormSucceeded($form)
        {

        $values = $form->getValues();
        
        $id = $this->user->getId();

//        $user = \UserModel::findById($values["id"]);
        $user = \UserModel::findById($id);
       
        $user->setLogin_name($values["login_name"]);
        $user->setPassword($values["password"]);
        $user->setName($values["name"]);
        $user->setSurname($values["surname"]);
        $user->setAddress($values["address"]);
        $user->setTown($values["town"]);
        $user->setPostcode($values["postcode"]);
        $user->setCompany($values["company"]);
        $user->setIco($values["ico"]);
        $user->setDic($values["dic"]);
        $user->setPhone($values["phone"]);
        $user->setEmail($values["email"]);

        //ToDo updateUser
        \UserModel::updateId($id,$user);
        
        $this->flashMessage('Vaše změny byly úspěšně uloženy', 'success');
        $this->redirect('Homepage:default');                      
    }
    
    /**
     * 
     * @param int $userId
     */
    public function actionEdit($userId)
        {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }        
        $user = \UserModel::findById($userId);
        if (!$user) {
            $this->error('Uživatel nebyl nalezen');
        }
        $this['userEditForm']->setDefaults(\UserModel::toArray($user));
    }

    /**
     * 
     * @param int $userId
     */
    public function actionDelete($userId)
        {
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
        $user = \UserModel::findById($userId);
        if (!$user) {
            $this->error('Uživatel nebyl nalezen');
        }
        $this['userDelForm']->setDefaults(\UserModel::toArray($user));
    }
       
    /**
     * 
     */
    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Byli jste odhlášení z IS');
        $this->redirect('Homepage:default');
    }
}