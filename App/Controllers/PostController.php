<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
//use \App\Models\Posts;
/**
* 
*/
class PostController extends Controller
{
	
	public function indexAction()
	{
		// $content = json_decode($_GET['data']);
		// View::render($content);
		session_start();
		$posts = $_SESSION["data"];
		View::render($posts);
	}

}