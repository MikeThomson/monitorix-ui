<?php
class Model_Mapper_User {

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
			$this->setDbTable('Model_DbTable_User');
		}
		return $this->_dbTable;
	}

	public function save(Model_User $rec) {
		$data = $rec->toArray();

		if(null === ($id = $rec->getId())) {
			unset($data['id']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('id = ?' => $id));
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
		return new Model_User($row->toArray());
	}

	public function fetchAll() {
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$rec = new Model_User($row->toArray());
			$entries[] = $rec;
		}
		return $entries;
	}
	
	public function checkLogin($user, $pass) {
		$select = $this->getDbTable()->select();
		$select->where('username = ?', $user);
		$select->where('password = ?', md5($pass));
		$select->from($this->_dbTable,'count(*)');
		
		$a = $this->getDbTable()->fetchRow($select);
		return ($a->{'count(*)'} == 1);
	}

}