<?php

use App\Core\Route;

class Controller_Create extends Controller
{	
	function action_index($id)
	{	
		session_start();
		$this->view->generate('create_view.php', 'template_view.php', $data);
	}
}
