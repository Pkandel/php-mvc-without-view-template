<?php
namespace App\Controllers;
use \Core\Controller;
/**
* 
*/
class Posts extends Controller
{
	
	public function indexAction()
	{
		echo "from posts controller and index method";
	}
	public function addNewAction()
	{
		echo "from posts controller addNew method";
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