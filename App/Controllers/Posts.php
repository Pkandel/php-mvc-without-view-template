<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
//use \App\Models\Posts;
/**
* 
*/
class Posts extends Controller
{
	
	public function indexAction()
	{
		View::renderTemplate("admin/users/index");
	}

}