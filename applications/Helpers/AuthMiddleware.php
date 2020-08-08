<?php
namespace App\Helpers;
if (!defined('Z_MVC')) die ("Not Allowed");

class AuthMiddleware
{
	function __construct()
	{
		if(!session()->get('id'))
		{
			redirect('/auth/login');
			die();
		}
		else
		{
			redirect('/'.session()->user()->level.'/home');
			die();
		}
	}
}