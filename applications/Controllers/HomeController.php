<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AuthMiddleware;

class HomeController
{
	function __construct()
	{
		new AuthMiddleware;
	}

	function index()
	{
		return view("home.index");
	}

}