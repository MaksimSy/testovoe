<?php


class Controller_Login extends Controller
{
	
	function action_index($id)
	{
		if(isset($_POST['name']) && isset($_POST['password']))
		{
			$name= filter_input(INPUT_POST, 'name');
			$password= filter_input(INPUT_POST, 'password');			
			$arr= Controller::get_user_data($_POST['name']);
			if($arr['name']==$name && $arr['password']==$password)
			{
				$data["login_status"] = "succsess";				
				session_start();
				$_SESSION['admin'] = $password;
				header('Location:/admin');
			}
			else
			{
				$data["login_status"] = "error";
			}
		}
		else
		{
			$data["login_status"] = "";
		}		
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}



	
}
