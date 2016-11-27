<?php
use core\Router;
/*
This is a front controller and every http requests comes first here
* we run autoload function which will automatically require php class files if exits
* then we make a router object and add route 
* then we take whatever comes after ? and store it into url 
* call dispatch function which will look for controller and run corresponding action method
*/
/* autoloader  */
spl_autoload_register(function($class)
{
	$root = dirname(__DIR__); //get the parent directory
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if(is_readable($file))
	{
		require $root . '/' . str_replace('\\', '/', $class) . '.php';
	}
});

$router = new Router();
//This is cutom router so should be defined first then default

/* this is for areas or different folder inside controller 
this is default for admin /admin lead to admin/users/index
 */
 $router->add(
 	'Admin',
 	[
 	'namespace' => 'Admin', 
 	'controller' => 'users',
 	'action' => 'index'
 	]);
 //this is for admin/users
$router->add(
	'Admin/{controller}',
	[
	'namespace' => 'Admin',
	'action' => 'index'
	]);
 /* this is the normal  route /admin/users/index*/
 $router->add(
 	'Admin/{controller}/{action}',
 	[
 	'namespace' => 'Admin'
 	]);
 /* this is the route with  id defined /admin/users/112/edit */
 $router->add(
 	'Admin/{controller}/{id:\d+}/{action}',
 	[
 	'namespace' => 'Admin'
 	]);

 //This is default route and should define last 

/* this is the default route*/
 $router->add(
 	'',
 	[
 	'controller' => 'home',
 	'action' => 'index'
 	]);
 /* if controller is there and action is not defined it loads index action method*/
 $router->add(
 	'{controller}',
 	[ 
 	'action' => 'index'
 	]);
 /* this is the normal  route*/
 $router->add(
 	'{controller}/{action}'
 	);
 /* this is the route with  id defined*/
 $router->add(
 	'{controller}/{id:\d+}/{action}'
 	);


$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
