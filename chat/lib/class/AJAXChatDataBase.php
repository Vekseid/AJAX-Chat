<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license Modified MIT License
 * @link https://blueimp.net/ajax/
 */

// Class to initialize the DataBase connection:
class AJAXChatDataBase {

	protected
		$_db;

	function __construct(&$dbConnectionConfig) {
	    // Saved for potential postgres in whatever future.
		switch($dbConnectionConfig['type']) {
			case 'mysqli':
				$this->_db = new AJAXChatDatabaseMySQLi($dbConnectionConfig);
				break;
			default:
                $this->_db = new AJAXChatDatabaseMySQLi($dbConnectionConfig);
		}
	}
	
	// Method to connect to the DataBase server:
	function connect(&$dbConnectionConfig) {
		return $this->_db->connect($dbConnectionConfig);
	}
	
	// Method to determine if an error has occurred:
	function error() {
		return $this->_db->error();
	}
	
	// Method to return the error report:
	function getError() {
		return $this->_db->getError();
	}
	
	// Method to return the connection identifier:
	function &getConnectionID() {
		return $this->_db->getConnectionID();
	}
	
	// Method to prevent SQL injections:
	function makeSafe($value) {
		return $this->_db->makeSafe($value);
	}

	// Method to perform SQL queries:
	function sqlQuery($sql) {
		return $this->_db->sqlQuery($sql);
	}

	// Method to retrieve the last inserted ID:
	function getLastInsertedID() {
		return $this->_db->getLastInsertedID();
	}

}
