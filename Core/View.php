<?php
namespace Core;
class View
{

// This is how we use overloading in php
public static function render()
	{
		//only passing the view file
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
			//echo "$file not found";
				throw new \Exception("$file not found");
			}
			}
			else
			{
			$modelObject = [];
			//this will get the model object
			$modelObject = func_get_args(0)[0];

			extract($modelObject, EXTR_SKIP);
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
		//passing view with object
		else if(func_num_args() == 2)
		{
			$modelObject = [];
			//this will get the view to be render
			$view = func_get_arg(0);
			//this will get the model object
			$modelObject = func_get_args(1)[1];
			extract($modelObject, EXTR_SKIP);

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
			//extract($modelObject, EXTR_SKIP);
			
		}
 	
	   
	}

}