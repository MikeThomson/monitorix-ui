<?php

class DisplayController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->view->form = new App_Form_EntryRequest();
    }

    public function listAction() {
    	
    }

}

