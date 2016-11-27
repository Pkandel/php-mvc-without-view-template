<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
//use App\Models\Posts;
/**
* 
*/
class Posts extends Controller
{
	
	public function indexAction()
	{
		View::render();
	}
	public function addNewAction()
	{
		$posts = \App\Models\Posts::Get_All();
		View::render(["posts" => $posts]);
	}
	public function editAction()
	{
		echo "Hello from the edit action in the post controller";
		echo '<p> Route parameters: <pre>'.
		htmlspecialchars(print_r($this->route_params, true)). "</pre></p>";
		//echo $_GET['name'];
		//echo $this->route_params['id'];
	}
}