<?php
namespace App\Controllers;
use \Core\Controller;
use \Core\View;
use \App\Models\Users;

class UserController extends Controller
{

	public function IndexAction()
	{
		View::Render();
	}

}