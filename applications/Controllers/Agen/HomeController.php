<?php
namespace App\Controllers\Agen;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AgenMiddleware;

class HomeController
{
	function __construct()
	{
		new AgenMiddleware;
	}

	function index()
	{
		return view("agen.home.index");
	}

}