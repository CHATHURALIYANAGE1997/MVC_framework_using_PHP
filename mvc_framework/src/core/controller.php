<?php


/**
 * main controller class
 */
class Controller
{
	
	public function view($view,$data = array())
	{
		extract($data);
		// code...

		if(file_exists("./source/views/" . $view . ".view.php"))
		{
			require ("./source/views/" . $view . ".view.php");
		}else{
			require ("./source/views/404.view.php");
		}
	}

	// public function load_model($model)
	// {

	// 	if(file_exists("./source/models/".ucfirst($model).".php"))
	// 	{
	// 		require("./source/models/".ucfirst($model).".php");
	// 		return $model = new $model();
	// 	}
		
	// 	return false;
	// }

	public function redirect($link)
	{
        header("Location:http://localhost/benefit/".trim($link,"/"));
		die;
	}
}
