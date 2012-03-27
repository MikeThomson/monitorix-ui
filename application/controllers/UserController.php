<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction() {
    	$form = new App_Form_Login();
    	if($this->getRequest()->isPost() && $form->isValid($_POST)) {
    		$form->populate($_POST);
	    	$mapper = new Model_Mapper_User();
	    	if($mapper->checkLogin($form->loginusername->getValue(), $form->loginpassword->getValue())) {
	    		$this->session->loggedIn == true;
	    	}
    	}
    	$this->view->form = $form;
    }
    
    public function logoutAction() {
    	
    }

}

