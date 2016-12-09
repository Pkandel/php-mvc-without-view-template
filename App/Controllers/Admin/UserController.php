<?php

namespace App\Controllers\Admin;

use \Core\Controller;
use \Core\Template;
use \App\Models\Users;
//session_start();
class UserController extends Controller
{
	/*before filter
	*/
	protected function before()
	{
		if(isset($_SESSION['admin']))
		{
			if($_SESSION['admin'] === "prasam")
			{
				return true;
			}
			else
			{
				echo "you are not a admin";
				Template::RedirectToFile("user/login.html");
			}
			
		}
		else{
			echo "you should sign in";
			Template::RedirectToFile("user/login.html");
			return false;
		}
		
		//make sure that an admin is logged in
		//return flase;
	}
	public function indexAction()
	{
		Template::render();
	}
}