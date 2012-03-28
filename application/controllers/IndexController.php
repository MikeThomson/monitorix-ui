<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$this->session = new Zend_Session_Namespace('monitorix-ui');
    }

    public function indexAction()
    {
        // action body
    	if(isset($this->session->isLoggedIn) && $this->session->isLoggedIn) 
    		return $this->_helper->redirector('index', 'display');
    	return $this->_helper->redirector('login', 'user');
    }


}

