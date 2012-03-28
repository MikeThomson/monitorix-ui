<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$this->session = new Zend_Session_Namespace('monitorix-ui');
    }

    public function loginAction() {
    	$form = new App_Form_Login();
    	$form->populate($_POST);
    	if($this->getRequest()->isPost() && $form->isValid($_POST)) {
	    	$mapper = new Model_Mapper_User();
	    	if($mapper->checkLogin($form->loginusername->getValue(), $form->loginpassword->getValue())) {
	    		$this->session->isLoggedIn = true;
	    		return $this->_helper->redirector('index', 'display');
	    	}
    	}
    	$this->view->form = $form;
    }
    
    public function logoutAction() {
    	unset($this->session->isLoggedIn);
    	return $this->_helper->redirector('login');
    }

}

