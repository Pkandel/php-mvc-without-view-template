<?php

namespace App\Controllers\Admin;

use \Core\Controller;
use \Core\View;
use \App\Models\Users;

class UserController extends Controller
{
	/*before filter
	*/
	protected function before()
	{
		
	}
	public function indexAction()
	{
		View::render();
	}
}