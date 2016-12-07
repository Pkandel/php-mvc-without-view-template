<?php
namespace App\Controllers;
use \Core\Controller;
//use \Core\View;
use \Core\Template;
use \App\Models\Posts;

class HomeController extends Controller
{
//this method uses a database connection 
	public function indexAction()
	 {		
	 	
		 //Template::Render();	

	 // 	$posts = Posts::Get_All();
		// Template::render($posts);

		 //Template::RedirectToFile("post/index.html");	

		// $posts = Posts::Get_All();
		// Template::RedirectToFile("home/index.html",$posts);	

		 //Template::RedirectToAction("post/index");

		 $posts = Posts::Get_All();
		Template::RedirectToAction("post/index",$posts);	
	 	
	}

}