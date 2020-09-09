<?php

class Route
{
	public static function start()
	{
		$controller_name = 'Main';
		$action_name = 'index';		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$id = null;

		if ( !empty($routes[1]) && $routes[1] != 'index.php')
		{	
			$controller_name = $routes[1];
		}

		if ( !empty($routes[2]))
		{
			$action_name = $routes[2];
		}

		if (is_numeric($routes[1])) {			
			$id=$routes[1];
			$controller_name = 'Main';
			$action_name = 'index';
		}

		if ( $routes[2]== 'edit' ) {
			$id= $routes[3];
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_Edit';
			$action_name = 'action_edit';
			$model_file = strtolower($model_name).'.php';
			$model_path = "app/core/".$model_file;
			if ($routes[4]=='save') {
				$action_name = 'action_save';
			}
		}else{
			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'action_'.$action_name;
			$model_file = strtolower($model_name).'.php';
			$model_path = "app/core/".$model_file;

		}

		if(file_exists($model_path))
		{
			include "app/core/".$model_file;
		}
		
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;

		if(file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}	

		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			$controller->$action($id);
		}
		else
		{
			Route::ErrorPage404();
		}
	}

	public static function page()
	{
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		return $routes[1];
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>