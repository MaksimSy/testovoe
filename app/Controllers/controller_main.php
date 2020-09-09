<?php


class Controller_Main extends Controller
{
	function action_index($id)
	{	
		session_start();
		$this->view->generate('main_view.php', 'template_view.php', $id);
	}
	

}
