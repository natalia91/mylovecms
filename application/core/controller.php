<?php

class Controller {
	
	public $model;
	public $view;
	public $db;
	
	function __construct()
	{
		$this->view = new View();
		$this->db = new Model();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
