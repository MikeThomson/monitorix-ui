<?php

class Model_DbTable_LogEntry extends Zend_Db_Table_Abstract {
	protected $_name = 'logentries';
	protected $_primary = 'entryID';
}