<?php

class Controller_Portfolio extends Controller
{

	function __construct()
	{
		$this->model = new Model_Portfolio();
		$this->view = new View();
	}
	
	function action_index()
	{

	}

	public function hello() {
        return array(1,2);
    }
}
