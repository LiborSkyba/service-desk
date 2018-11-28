<?php

namespace App;

use Nette;
//use Model\UserModel;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    
    public function beforeRender() {
        
        parent::beforeRender();

        $id = $this->user->getId();
        if (!$id == NULL) {
            $login_user = \UserModel::findById($id);
            $this->template->login_user = $login_user;
        }            
    }
}
