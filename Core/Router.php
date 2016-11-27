<?php
/*
* namespace shoud match to the folder name
* 



*/
namespace Core;
 class Router
{
	protected $routes = [];

	protected $params = [];

private function print_array($array)
{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
}
/*
*Add a route to the routing table
* @param string $route the route URL
* @param array $params parameters (controller, action etc)
*/

	public function add($route, $params = [])
	{
		/* Convert the route to a regular expression
		here we escaping / escape forward slash(\/) /
		replace it with \/
		{controller}/{action} change to {controller}\/{action}
		because in regular expression we have to escape / sign by \/
		*/
		$route = preg_replace('/\//', '\\/', $route);

		/*
		this will change {controller} to (regular expression)
		so {controller}\/{action} becomes (?P[a-z-]+)\/(?P[a-z-]+)
		*/
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

		//Convert variables with custom regular expression like {id:\d+}
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		
		/* add start and end delimeters and case insensitive flag
		(?P[a-z-]+)\/(?P[a-z-]+) becomes 
		/^(?P[a-z-]+)\/(?P[a-z-]+)$/i
		this ?P make regular expession matches group to result as 
		[controller] => home
		[action] => index
		*/
		$route = '/^' . $route .'$/i';
		
		$this->routes[$route] = $params;
	}

	public function match($url)
	{
			//Get the capture group values
			foreach ($this->routes as $route => $params) 
			{
				//if regular expression of $route matches to url
				if(preg_match($route, $url, $matches))
				{
					// if it matches then $matches containes something like
					/*
						Array
							(
							    [0] => home/index
							    [controller] => home
							    [1] => home
							    [action] => index
							    [2] => index
							)
					*/
				
					foreach($matches as $key => $match)
					{
						if(is_string($key))
						{
							$params[$key] = $match;
						}
					}
					$this->params = $params;
					return true;		
				}
				
			}
			
			return false;
		
	}

	public function dispatch($url)
	{
		$url = $this->removeQueryStringVariables($url);
		if($this->match($url))
		{
			$controller = $this->params['controller'];
			$controller = $this->convertToStudyCaps($controller);
			$controller = $this->getNamespace().$controller;
			

			if(class_exists($controller))
			{
				$controller_object = new $controller($this->params);
				$action = $this->params['action'];
				$action = $this->convertToCamelCase($action);

				if(is_callable([$controller_object, $action]))
				{
					$controller_object->$action();
				}
				else
				{
					//echo "Method $action (in controller $controller) not found";
					throw new \Exception("Method $action (in controller $controller) not found");
				}
			}
			else
			{
				//echo "controller class $controller not found";
				throw new \Exception("controller class $controller not found");
			}
		}
		else
		{
			//echo 'No route matched';
			throw new \Exception("No route matched");
		}
	}

	protected function removeQueryStringVariables($url)
	{
		if($url != '')
		{
			$parts = explode('&',$url,2);
			if(strpos($parts[0], '=') === false)
			{
				$url = $parts[0];
			}
			else
			{
				$url = '';
			}
		}
		return $url;
	}
	protected function convertToStudyCaps($string)
	{
		return str_replace('-', '', ucwords(str_replace('.', ' ', $string)));
	}

	protected function convertToCamelCase($string)
	{
		return lcfirst($this->convertToStudyCaps($string));
	}
	// public function getRoutes()
	// {
	// 	return $this->routes;
	// }

	// public function getParams()
	// {
	// 	return $this->params;
	// }
	public function getNamespace()
	{
		$namespace = "app\controllers\\";
		if(array_key_exists('namespace', $this->params))
		{
			$namespace .= $this->params['namespace']. '\\';
		}
		return $namespace;
	}

}