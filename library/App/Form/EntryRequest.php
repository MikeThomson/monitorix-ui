<?php
class App_Form_EntryRequest extends Zend_Form {
	public function init() {
		$mapper = new Model_Mapper_LogEntry();
		$projectList = $mapper->getProjects();
		$projects = array_combine($projectList, $projectList);
		$this->setDecorators(array(array
				('ViewScript', array('viewScript' => 'forms/entry-request.phtml'))));
		
		$this->projects = new Zend_Form_Element_MultiCheckbox('projects');
		$this->projects->setMultiOptions($projects);
		$this->projects->clearDecorators();
		$this->projects->addDecorator('ViewHelper');
		$this->projects->addDecorator('HtmlTag', array('tag'=>'span'));
		$this->projects->addDecorator('Label', array('tag' => 'span', 'placement' => 'APPEND'));
		
		$this->page = new Zend_Form_Element_Hidden('page');
		$this->page->setValue(1);
		
		$this->submit = new Zend_form_Element_Submit('submit');
	}
}