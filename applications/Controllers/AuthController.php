<?php
namespace App\Controllers;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Models\User;

class AuthController
{
	function login()
	{
		if(session()->get('id'))
            redirect("/");
		return view("auth.login");
	}

	function doLogin()
	{
		$request = request()->post();
        if($request)
        {
        	if($request->captcha != $_SESSION['Captcha'])
        	{
        		session()->set('error','Captcha Salah');
        		session()->set('old_user_id',$request->user_id);
				redirect("/auth/login");
				die();
        	}

        	$user    = User::where('id',$request->user_id)->where('password',md5($request->password))->where('status','aktif')->first();

			if(empty($user) || $user == null){
				session()->set('error','Username atau Password salah');
	            session()->set('old_user_id',$request->user_id);
				redirect("/auth/login");
				die();
			}

			session()->set('id',$user->id);
			redirect("/".$user->level."/home");
			return false;
        }
	}

	function captcha()
	{
		header("Content-type: image/png");
		$_SESSION["Captcha"] = "";
		// membuat gambar dengan menentukan ukuran
		$gbr = imagecreate(200, 50);
		 
		//warna background captcha
		imagecolorallocate($gbr, 69, 179, 157);
		 
		// pengaturan font captcha
		$color = imagecolorallocate($gbr, 253, 252, 252);
		// $font = dirname(dirname(dirname(__FILE__)))."\\public\\fonts\\Allura-Regular.otf"; 
		$font = dirname(dirname(dirname(__FILE__)))."/public/fonts/Allura-Regular.otf"; 
		$ukuran_font = 20;
		$posisi = 32;
		// membuat nomor acak dan ditampilkan pada gambar
		for($i=0;$i<=5;$i++) {
			// jumlah karakter
			$angka=rand(0, 9);
		 
			$_SESSION["Captcha"].=$angka;
		 
			$kemiringan= rand(20, 20);
		 	
			imagettftext($gbr, $ukuran_font, $kemiringan, 8+15*$i, $posisi, $color, $font, $angka);	
		}
		//untuk membuat gambar 
		imagepng($gbr); 
		imagedestroy($gbr);
	}

	function logout()
    {
        session()->destroy();
        redirect("/auth/login");
        return;
    }

}