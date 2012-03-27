<?php
class App_Form_EntryRequest extends Zend_Form {
	public function init() {
		$projects = array(
				'projectName' => 'projectName',
				'dynv6' => 'dynv6',
				);
		
		$this->setDecorators(array(array
				('ViewScript', array('viewScript' => 'forms/entry-request.phtml'))));
		
		$this->projects = new Zend_Form_Element_MultiCheckbox('projects');
		$this->projects->setMultiOptions($projects);
		
		$this->page = new Zend_Form_Element_Hidden('page');
		$this->page->setValue(1);
		
		$this->submit = new Zend_form_Element_Submit('submit');
	}
}