<?php
class Model_LogEntry {
	private $entryID;
	protected $logType;
	protected $projectName;
	protected $environment;
	protected $priority;
	protected $errorNumber;
	protected $message;
	protected $file;
	protected $line;
	protected $context;
	protected $stacktrace;
	protected $timestamp;
	protected $priorityName;
	
	
	/**
	 * @param field_type $entryID
	 */
	private function setEntryID($entryID) {
		$this->entryID = $entryID;
	}

	public function __construct($opts = null) {
		if(is_array($opts)) {
			foreach($opts as $var=>$val) {
				$method = 'set' . ucfirst($var);
				$this->{$method}($val);
			}
		}
	}
	
	/**
	 * @return the $entryID
	 */
	public function getEntryID() {
		return $this->entryID;
	}

	/**
	 * @return the $logType
	 */
	public function getLogType() {
		return $this->logType;
	}

	/**
	 * @return the $projectName
	 */
	public function getProjectName() {
		return $this->projectName;
	}

	/**
	 * @return the $environment
	 */
	public function getEnvironment() {
		return $this->environment;
	}

	/**
	 * @return the $priority
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * @return the $errorNumber
	 */
	public function getErrorNumber() {
		return $this->errorNumber;
	}

	/**
	 * @return the $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @return the $file
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @return the $line
	 */
	public function getLine() {
		return $this->line;
	}

	/**
	 * @return the $context
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * @return the $stacktrace
	 */
	public function getStacktrace() {
		return $this->stacktrace;
	}

	/**
	 * @return the $timestamp
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @return the $priorityName
	 */
	public function getPriorityName() {
		return $this->priorityName;
	}

	/**
	 * @param field_type $logType
	 */
	public function setLogType($logType) {
		$this->logType = $logType;
	}

	/**
	 * @param field_type $projectName
	 */
	public function setProjectName($projectName) {
		$this->projectName = $projectName;
	}

	/**
	 * @param field_type $environment
	 */
	public function setEnvironment($environment) {
		$this->environment = $environment;
	}

	/**
	 * @param field_type $priority
	 */
	public function setPriority($priority) {
		$this->priority = $priority;
	}

	/**
	 * @param field_type $errorNumber
	 */
	public function setErrorNumber($errorNumber) {
		$this->errorNumber = $errorNumber;
	}

	/**
	 * @param field_type $message
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * @param field_type $file
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * @param field_type $line
	 */
	public function setLine($line) {
		$this->line = $line;
	}

	/**
	 * @param field_type $context
	 */
	public function setContext($context) {
		$this->context = $context;
	}

	/**
	 * @param field_type $stacktrace
	 */
	public function setStacktrace($stacktrace) {
		$this->stacktrace = $stacktrace;
	}

	/**
	 * @param field_type $timestamp
	 */
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * @param field_type $priorityName
	 */
	public function setPriorityName($priorityName) {
		$this->priorityName = $priorityName;
	}

	public function toArray() {
		return get_object_vars($this);
	}
	
}