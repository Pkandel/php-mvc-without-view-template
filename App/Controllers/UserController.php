<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
use \Core\Template;
use \App\Models\Users;
session_start();
class UserController extends Controller
{

	public function loginAction()
	{
		session_destroy();
		Template::Render();
	}

	public function LoginCheckAction()
	 {		
	 	$username =  $_POST["username"];
	 	$password = $_POST["password"];
	 	$users = Users::Get_All();
	  	foreach ($users as $user) 
	  	{

		 	if($user->username === $username && $user->pass === $password)
		 	{
		 		
		 		$_SESSION['user'] = $user->username;
			 	if($user->username === "prasam" && $user->pass === "123")
			 	{
			 		$_SESSION['admin'] = $user->username;	
			 		View::RedirectToAction("admin/user/index");
			 		return false;
			 	}
			 	else
			 	{
			 		View::RedirectToAction("user/index");
			 		return false;
			 	}	 		
		 		
		 	}	
		 		
		 	}
		 	View::RedirectToAction("user/login"); 	
		 }

	public function RegisterAction()
	{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		 $users = new Users();
		if($users->save())
		{
			echo "success";
		}

	}

	public function IndexAction()
	{
		if(!isset($_SESSION['user']))
		{
			$_SESSION['error'] =  "You have to logged in";
			Template::RedirectToAction("user/login");
			return false;
		}
		
		Template::Render();
	}

	public function LogoutAction()
	{
		session_destroy();
		Template::RedirectToAction("user/login");

	}

}