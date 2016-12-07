<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
use \App\Models\Posts;

class HomeController extends Controller
{
//this method uses a database connection 
	public function indexAction()
	 {		
	 	
		// View::render();	

	 	// $posts = Posts::Get_All();
		// View::render($posts);

		 //View::RedirectToFile("home/index.php");	

		// $posts = Posts::Get_All();
		// View::RedirectToFile("post/index.php",$posts);	

		 //View::RedirectToAction("post/index");

		 $posts = Posts::Get_All();
		View::RedirectToAction("Post/index",$posts);	
	 	
	}

}