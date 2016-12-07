<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\Template;
//use \App\Models\Posts;
/**
* 
*/
class PostController extends Controller
{
	
	public function indexAction()
	{
		//Template::render();

		session_start();
		$posts = $_SESSION["data"];
		Template::RedirectToFile("home/index.html",$posts);
	}

}