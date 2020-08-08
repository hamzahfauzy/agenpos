<?php
namespace App\Helpers;
if (!defined('Z_MVC')) die ("Not Allowed");

class AgenMiddleware
{
	function __construct()
	{
		if(!session()->get('id') || session()->user()->level != "agen")
		{
			redirect('/');
			die();
		}
	}
}