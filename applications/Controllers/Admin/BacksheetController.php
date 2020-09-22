<?php
namespace App\Controllers\Admin;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Pengiriman;
use App\Models\Pengaturan;
use App\Models\User;

class BacksheetController
{
	function __construct()
	{
		new AdminMiddleware;
	}

	function index()
	{
		$loket = User::where('level','agen')->get();
		foreach($loket as $l)
		{
			$pengaturan = Pengaturan::where('tanggal',date('Y-m-d'))->where('user_id',$l->id)->first();
			if(empty($pengaturan))
			{
				(new Pengaturan)->save([
					'user_id' => $l->id,
					'status_rekap' => 1,
					'tanggal' => date('Y-m-d')
				]);
			}
		}
		$pengirimans = Pengiriman::where('tanggal',date('Y-m-d'))->get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return view("admin.backsheet.index",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

	function tutup()
	{
		$loket = User::where('level','agen')->get();
		foreach($loket as $l)
		{
			$pengaturan = Pengaturan::where('tanggal',date('Y-m-d'))->where('user_id',$l->id)->first();
			$pengaturan->save([
				'status_rekap' => 0,
				'status_backsheet' => 0,
			]);
		}
	}

	function cetak()
	{
		$pengirimans = Pengiriman::where('tanggal',date('Y-m-d'))->get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return partial("admin.backsheet.cetak",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

	function rekap()
	{
		$pengirimans = Pengiriman::where('tanggal',date('Y-m-d'))->get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return view("admin.backsheet.rekap",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

}