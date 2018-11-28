<?php

namespace App;

use Nette,
	Model;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */

	protected function createComponentSignInForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('username', 'Uživatel:')
			->setRequired('Zadejte Vaše uživatelské jméno.');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte Vaše heslo.');

		$form->addCheckbox('remember', 'Zůstat přihlášen');

		$form->addSubmit('send', 'Přihlásit');

		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}

        /**
         * 
         * @param Form $form
         */
        public function signInFormSucceeded($form)
        {
            $values = $form->values;

            try {
                $this->getUser()->login($values->username, $values->password);
                if ($values->remember == true) $user->setExpiration('1 days', FALSE);
                $this->redirect('Homepage:');

            } catch (Nette\Security\AuthenticationException $e) {
                $form->addError('Nesprávné přihlašovací jméno nebo heslo.');
            }
        }

        /**
         * 
         */
        public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('Byli jste odhlášeni ze systému.');
	}

}
