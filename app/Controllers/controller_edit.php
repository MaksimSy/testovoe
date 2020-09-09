<?php

use App\Core\Route;

class Controller_Edit extends Controller
{
	
	function action_edit($data)
	{	
		session_start();
		if ( $_SESSION['admin'] == "123" )
		{
			$this->view->generate('edit_view.php', 'template_view.php', $data);
		}
		else
		{
			session_destroy();
			Route::ErrorPage404();
		}
	}

}
