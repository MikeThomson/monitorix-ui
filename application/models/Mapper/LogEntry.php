<?php
class Model_Mapper_LogEntry {
	
	public function findByProjectsErrors($projects, $errors, $page = 1) {
		
	}
	
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Model_DbTable_LogEntry');
		}
		return $this->_dbTable;
	}
	
	public function save(Model_LogEntry $rec) {
		$data = array(
				'logType' => $rec->getLogType(),
				'projectName' => $rec->getProjectName(),
				'environment' => $rec->getEnvironment(),
				'priority' => $rec->getPriority(),
				'errorNumber' => $rec->getErrorNumber(),
				'message' => $rec->getMessage(),
				'file' => $rec->getFile(),
				'line' => $rec->getLine(),
				'context' => $rec->getContext(),
				'stacktrace' => $rec->getStacktrace(),
				'timestamp' => $rec->getTimestamp(),
				'priorityName' => $rec->getPriorityName(),
		);
	
		if (null === ($id = $rec->getEntryID())) {
			unset($data['entryID']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('entryID = ?' => $id));
		}
	}
	
	public function delete($id) {
		$this->getDbTable()->delete(array('id = ?' => $id));
	}
	
	public function find($id) {
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
	
		$row = $result->current();
	
		$rec = new Model_Logentry();
		$rec->id = $row->id;
		$rec->userId = $row->id;
		$rec->zone = $row->id;
		$rec->domain = $row->id;
		$rec->recordType = $row->id;
		$rec->value = $row->id;
		$rec->ttl = $row->id;
	
		return $rec;
	}
	
	public function fetchAll() {
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$rec = new Model_LogEntry($row->toArray());
			$entries[] = $rec;
		}
		return $entries;
	}
	
	public function findByProjects($projects, $page = 1) {
		$perPage = 10;
		$select = $this->getDbTable()->select();
		foreach($projects as $project)
			$select->orWhere('projectName = ?', $project);
		$select->limitPage($page, $perPage);
		$resultSet = $this->getDbTable()->fetchAll($select);
	
		$entries   = array();
		foreach ($resultSet as $row) {
			$rec = new Model_LogEntry($row->toArray());
			$entries[] = $rec;
		}
		return $entries;
	}
	
	public function getProjects() {
		$select = $this->getDbTable()->select();
		$select->distinct();
		$select->from($this->getDbTable(), 'projectName');
		$resultSet = $this->getDbTable()->fetchAll($select);
		
		$entries   = array();
		foreach ($resultSet as $row) {
			$rec = $row->projectName;
			$entries[] = $rec;
		}
		return $entries;
	}
}