<?php

namespace App\Controllers\admin;

use \Core\Controller;
use \Core\View;

class Users extends Controller
{
	/*before filter
	*/
	protected function before()
	{
		//echo "You are not logged in";
		return true;
		//make sure that an admin is logged in
		//return flase;
	}
	public function indexAction()
	{
		View::render();
	}
}