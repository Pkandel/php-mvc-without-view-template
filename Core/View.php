<?php
namespace Core;
class View
{

// This is how we use overloading in php
	public static function render()
	{
		/* --------------------------------------------------------------------*/
		//only passing one argument
		if(func_num_args() == 1)
		{	
			if(!is_array(func_get_arg(0)))
			{
				$view = func_get_arg(0);
	      		$file = "../App/Views/$view"; //relative to core directory
	      		if(is_readable($file))
	      		{
	      			require $file;
	      		}
	      		else
	      		{

	      			throw new \Exception("$file not found");
	      		}
      		}
      		else
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
						//this will make singular like users to user
	      				$controller = rtrim($controller,"s");
						//this will give calling method like indexAction
	      				$callingMethod =  debug_backtrace()[1]['function'];
						//removing Action from calling method
	      				$method = rtrim($callingMethod, "Action");

						$file = "../App/Views/".$controller."/".$method.".php"; //relative to core directory
						if(is_readable($file))
						{
							require $file;
						}
						else
						{
							//echo "$file not found";
							throw new \Exception("$file not found");
						}

					}

				}

		}

	}
	/* --------------------------------------------------------------------*/
	//passing view with object
	else if(func_num_args() == 2)
	{
			//this will get the view to be render
		$view = func_get_arg(0);
			//this will get the model object
		$modelObject = func_get_args(1)[1];
		$newmodel = ["model" => $modelObject];
		extract($newmodel, EXTR_SKIP);

			//extract($modelObject, EXTR_SKIP);
			$file = "../App/Views/$view"; //relative to core directory
			if(is_readable($file))
			{
				require $file;
			}
			else
			{
			//echo "$file not found";
				throw new \Exception("$file not found");
			}
	}
	
/* --------------------------------------------------------------------*/
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
					//this will make singular like users to user
					$controller = rtrim($controller,"s");
					//this will give calling method like indexAction
					$callingMethod =  debug_backtrace()[1]['function'];
					//removing Action from calling method
					$method = rtrim($callingMethod, "Action");

					$file = "../App/Views/".$controller."/".$method.".php"; //relative to core directory
					if(is_readable($file))
					{
						require $file;
					}
					else
					{
						//echo "$file not found";
						throw new \Exception("$file not found");
					}

				}

			}
			
		}


	}


/*This is for twig template */
public static function renderTemplate()
{
	static $twig = null;
	if($twig === null)
	{
		$loader = new \Twig_Loader_Filesystem('../App/Views');
		$twig = new \Twig_Environment($loader);
	}


			/* --------------------------------------------------------------------*/
		//only passing one argument
		if(func_num_args() == 1)
		{	
			if(!is_array(func_get_arg(0)))
			{
				$view = func_get_arg(0);
	      		echo $twig->render($view);
      		}
      		else
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
						//this will make singular like users to user
	      				$controller = rtrim($controller,"s");
						//this will give calling method like indexAction
	      				$callingMethod =  debug_backtrace()[1]['function'];
						//removing Action from calling method
	      				$method = rtrim($callingMethod, "Action");

						$view = $controller."/".$method.".html"; //relative to core directory
						echo $twig->render($view, $newmodel);

					}

				}

		}

	}
	/* --------------------------------------------------------------------*/
	//passing view with object
	else if(func_num_args() == 2)
	{
			//this will get the view to be render
		$view = func_get_arg(0);
			//this will get the model object
		$modelObject = func_get_args(1)[1];
		$newmodel = ["model" => $modelObject];
		extract($newmodel, EXTR_SKIP);

		echo $twig->render($view, $newmodel);
	}
	
/* --------------------------------------------------------------------*/
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
					//this will make singular like users to user
					$controller = rtrim($controller,"s");
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

}