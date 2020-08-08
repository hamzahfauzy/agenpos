<?php
namespace App\Helpers;
if (!defined('Z_MVC')) die ("Not Allowed");

class AuthMiddleware
{
	function __construct()
	{
		if(!session()->get('id'))
		{
			redirect(base_url().'/auth/login');
			die();
		}
		else
		{
			redirect(base_url().'/'.session()->user()->level.'/home');
			die();
		}
	}
}