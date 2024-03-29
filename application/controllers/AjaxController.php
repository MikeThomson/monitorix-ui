<?php

class AjaxController extends Zend_Controller_Action
{
	protected $session;

    public function init()
    {
        /* Initialize action controller here */
    	$this->_helper->layout->disableLayout();
    	$this->_response->setHeader('Content-Type', 'application/json');
    	$this->_helper->viewRenderer->setRender('json', null, true);
    	$this->session = new Zend_Session_Namespace('monitorix-ui');
    }

    public function getRowsAction() {
    	$form = new App_Form_EntryRequest();
    	$form->populate($_REQUEST);
    	if(isset($this->session->isLoggedIn) && $this->session->isLoggedIn){
    		$logMapper = new Model_Mapper_LogEntry();
    		$entries = array();
    		$result = $logMapper->findByProjects($form->projects->getValue(), $form->page->getValue());
    		foreach($result as $entry)
    			$entries[] = $entry->toArray();
    		$this->view->data = $entries;
    	}
    }

}

