<?php

namespace App;

use Nette,Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

    /**
     * 
     */
    public function renderDefault()
	{           

            $id = $this->user->getId();
            if (!$id == NULL) {
                $costumer = \UserModel::findById($this->user->getId());
                if ($this->user->isInRole(3)) {
                    $requests = \RequestModel::findAll();
                }
                elseif($this->user->isInRole(2)) {
                    $requests = \RequestModel::findByTechnician($costumer);                    
                }                   
                else{
                    $requests = \RequestModel::findByOwner($costumer);                    
                }            
                            
                $this->template->costumer = $costumer;
                $this->template->requests = $requests;
            }            
        }

}
