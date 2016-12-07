<?php
namespace Core;
class Template
{
public static function render()
	{
		static $twig = null;
		if($twig === null)
		{
			$loader = new \Twig_Loader_Filesystem('../App/Views');
			$twig = new \Twig_Environment($loader);
		}

		//only passing one argument
		if(func_num_args() == 1)
		{	
	      	$modelObject = [];
			//this will get the model object
	      	$modelObject = func_get_args(0)[0];
	      	$newmodel = ["model" => $modelObject];
	      	extract($newmodel, EXTR_SKIP);
	      	foreach(get_declared_classes() as $key => $className)
	      	{	
	      		if(strpos($className, "App\Controllers") !== false)
	      		{
					//removing the App/controllers/ and only taking rest of it
	      			$controller = substr($className,16);
					//if controller contain \ like admin\users then replace \ with /
	      			if (strpos($controller,"\\") !== false)
	      			{
	      				$controller = str_replace("\\", "/", $controller);
	      			}
	      			//removing Controller from controller class
	      			$controller = substr($controller, 0 , -10);
					//this will give calling method like indexAction
	      			$callingMethod =  debug_backtrace()[1]['function'];
					//removing Action from calling method
	      			$method = rtrim($callingMethod, "Action");

					$view = $controller."/".$method.".html"; //relative to core directory
					echo $twig->render($view, $newmodel);

				}

			}

		}

		//It automatically finds right view for controller and method
		else
		{
			
			foreach(get_declared_classes() as $key => $className)
			{	
				if(strpos($className, "App\Controllers") !== false)
				{
					//removing the App/controllers/ and only taking rest of it
					$controller = substr($className,16);
					//if controller contain \ like admin\users then replace \ with /
					if (strpos($controller,"\\") !== false)
					{
						$controller = str_replace("\\", "/", $controller);
					}
	      			//removing Controller from controller class
	      			$controller = substr($controller, 0 , -10);
					//this will give calling method like indexAction
					$callingMethod =  debug_backtrace()[1]['function'];
					//removing Action from calling method
					$method = rtrim($callingMethod, "Action");

					$view = $controller."/".$method.".html"; 
					echo $twig->render($view);
				}

			}
			
		}

	}
	public static function RedirectToFile()
	{
		static $twig = null;
		if($twig === null)
		{
			$loader = new \Twig_Loader_Filesystem('../App/Views');
			$twig = new \Twig_Environment($loader);
		}

		if(func_num_args() == 1)
		{
			$view = func_get_arg(0);
	      	echo $twig->render($view);
		}
		else
		{
			$view = func_get_arg(0);
			//this will get the model object
			$modelObject = func_get_args(1)[1];
			$newmodel = ["model" => $modelObject];
			extract($newmodel, EXTR_SKIP);
			echo $twig->render($view, $newmodel);
		}

	}

	public static function RedirectToAction()
	{

		$count_slashes = substr_count(func_get_arg(0),'/');
		$array = [];
		if($count_slashes == 1)
		{
			// controller/action
			$array = explode('/',func_get_arg(0));
		}
		else
		{
			// admin/controller/action
			$array = explode('/', func_get_arg(0));
			$last = array_pop($array);
			$array = array(implode('/', $array), $last);

		}
		$controller_class = $array[0]."Controller";
		if(func_num_args() == 1)
		{
			
			if (class_exists("\App\Controllers\\".$controller_class))
		    {
		      	header('Location: /'.$array[0].'/'.$array[1]);
		    }
		    else
		    {
		      	throw new \Exception($controller_class." class not found");
		      			
		    }

		}
		else
		{
			if (class_exists("\App\Controllers\\".$controller_class))
      		{
      			$view = func_get_arg(1);
      			session_start();
      			$_SESSION["data"] = $view;

      			//header('Location: /'.$array[0].'/'.$array[1].'?data='.json_encode($view));
      			header('Location: /'.$array[0].'/'.$array[1]);

      		}
      		else
      		{
      			throw new \Exception($controller_class." class not found");
      			
      		}

		}

	}
}