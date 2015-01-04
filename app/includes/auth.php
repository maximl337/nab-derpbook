<?php

class User_auth
{

	private $_db;

	function __construct($db)
	{
		$this->_db = $db;
	}
}