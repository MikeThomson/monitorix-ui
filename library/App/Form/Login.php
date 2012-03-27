<?php
class App_Form_Login extends Zend_Form {
	public function init() {
		$this->setMethod('POST');
		$this->setAction('/user/login');

		$this->loginusername = new Zend_Form_Element_Text('loginusername');
		$this->loginusername->setLabel('username');

		$this->loginpassword = new Zend_Form_Element_Password('loginpassword');
		$this->loginpassword->setLabel('password');

		$this->submit = new Zend_Form_Element_Submit('submit');
		$this->submit->setLabel('Login');
	}
}