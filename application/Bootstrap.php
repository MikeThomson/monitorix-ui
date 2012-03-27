<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload() {
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
				'basePath'  => APPLICATION_PATH,
				'namespace' => '',
		));
		$resourceLoader->addResourceType('model', 'models/', 'Model');
	}
	
	protected function _initSession() {
		Zend_Session::start();
	}

	protected function _initConfig()
	{
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config);
		return $config;
	}
	
	protected function _initMonitor()
	{
		$config = Zend_Registry::get('config');
		if(!$config->monitor->enabled) return;
		$monitorDb = Zend_Db::factory($config->monitor->db->adapter, $config->monitor->db->params);
	
		$monitor = new Monitorix_Monitor(new Zend_Log_Writer_Db($monitorDb, 'logentries'), "myproject");
	
		//if you want to monitor php errors
		$monitor->registerErrorHandler();
	
		//if you want to monitor fatal errors and syntax errors
		if($config->monitor->logFatal) $monitor->logFatalErrors();
	
		//if you want to log exceptions
		if($config->monitor->logExceptions) $monitor->logExceptions();
	
		//if you want to monitor javascript errors
		if($config->monitor->logJavascript) $monitor->logJavascriptErrors();
	
		//if you want to log slow database queries
		if($config->monitor->logSlowQueries) $monitor->logSlowQueries(array(Zend_Db_Table::getDefaultAdapter()));
	}
}

