<?php
namespace App\Controllers\Admin;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\User;

class LoketController
{
	function __construct()
	{
		new AdminMiddleware;
	}

	function register()
	{
		return view("admin.loket.register");
	}

	function aktivasi()
	{
		$users = User::where('level','agen')->where('status','non-aktif')->get();
		return view("admin.loket.aktivasi",[
			'users' => $users
		]);
	}

	function nonaktivasi()
	{
		$users = User::where('level','agen')->where('status','aktif')->get();
		foreach($users as $user)
			$user->save([
				'status'=>'non-aktif'
			]);
		redirect("/admin/home");
	}

	function ubah()
	{
		if(isset($_GET['user_id']))
		{
			$id = $_GET['user_id'];
			$user = User::find($id);
			return view("admin.loket.ubah",[
				'user' => $user
			]);
		}
		$users = User::where('level','agen')->get();
		return view("admin.loket.data-user",[
			'users' => $users
		]);
	}

	function postRegister()
	{
		$request = request()->post();
        if($request)
        {
        	$user = new User;
        	$user->save([
        		'id' 	  => $request->user_id,
        		'nama'    => $request->nama,
        		'alamat'  => $request->alamat,
        		'no_hp'   => $request->no_hp,
        		'password'=> md5($request->password),
        		'status'  => 'non-aktif',
        		'level'   => 'agen',

        	]);
        	session()->set('success','Registrasi Loket Berhasil');
			redirect("/admin/loket/register");
			return false;
        }
	}

	function postAktivasi()
	{
		$request = request()->post();
        if($request)
        {
        	$user = User::find($request->user_id);
        	$nama = $user->nama;
        	$user->save([
        		'status'  => 'aktif',
        	]);
        	session()->set('success','Aktivasi User ('.$nama.' - '.$request->user_id.') Berhasil');
			redirect("/admin/loket/aktivasi");
			return false;
        }
	}

	function postUbah()
	{
		$request = request()->post();
        if($request)
        {
        	$user = User::find($request->user_id);
        	$user->save([
        		'nama' => $request->nama,
        		'alamat' => $request->alamat,
        		'password' => !empty($request->password) ? md5($request->password) : $user->getPassword(),
        		'no_hp' => $request->no_hp,
        	]);
        	session()->set('success','Ubah Data User ('.$request->nama.' - '.$request->user_id.') Berhasil');
			redirect("/admin/loket/ubah");
			return false;
        }
	}

}