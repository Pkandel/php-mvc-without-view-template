<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
use App\Models\Posts;

class Home extends Controller
{
//this method uses a database connection 
	public function indexAction()
	 {
	// 	$posts = Posts::Get_All();
	// 	View::render("home/index.php",$posts);	
	 	$posts = Posts::Get_All();	
		View::renderTemplate($posts);
	 	
	}

}