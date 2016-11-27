<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;

class Home extends Controller
{

	public function indexAction()
	{
		echo "hello from home controller and index method";
	echo '<p> Query string parameters: <pre>'.
			htmlspecialchars(print_r($_GET, true)).'</pre></p>';
	}

	public function aboutAction()
	{
		View::render("Home/index.php",
			['name' => 'prakash',
			'colours' => ['red','green', 'blue']
			]);
	}
}