<?php
namespace App\Controllers\Agen;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AgenMiddleware;
use App\Models\User;

class LoketController
{
	function __construct()
	{
		new AgenMiddleware;
	}

	function kirim()
	{
		return view("agen.loket.kirim");
	}

}