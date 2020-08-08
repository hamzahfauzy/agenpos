<?php
namespace App\Controllers\Admin;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;

class HomeController
{
	function __construct()
	{
		new AdminMiddleware;
	}

	function index()
	{
		return view("admin.home.index");
	}

}