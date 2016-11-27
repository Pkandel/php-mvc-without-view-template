<?php

namespace App\Controllers\admin;

use \Core\Controller;

class Users extends Controller
{
	/*before filter
	*/
	protected function before()
	{
		echo "You are not logged in";
		return false;
		//make sure that an admin is logged in
		//return flase;
	}
	public function indexAction()
	{
		echo "from admin index";
	}
}