<?php
namespace App\Controllers\Agen;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AgenMiddleware;
use App\Models\Pengiriman;
use App\Models\Pengaturan;

class BacksheetController
{
	function __construct()
	{
		new AgenMiddleware;
	}

	function index()
	{
		$pengaturan = Pengaturan::where('tanggal',date('Y-m-d'))->where('user_id',session()->get('id'))->first();
		if(empty($pengaturan))
		{
			redirect("/agen/home");
			return;
		}
		if($pengaturan->status_backsheet == 0)
		{
			$pengaturan->save([
				'status_backsheet' => 1
			]);
		}
		$pengirimans = Pengiriman::where('id_agen',$_SESSION['id'])->where('tanggal',date('Y-m-d'))->get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return view("agen.backsheet.index",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

	function tutup()
	{
		$pengaturan = Pengaturan::where('tanggal',date('Y-m-d'))->where('user_id',session()->get('id'))->first();
		$pengaturan->save([
			'status_backsheet' => 0
		]);

		redirect("/agen/home");
		return false;
	}

	function semua()
	{
		$pengirimans = Pengiriman::get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return view("agen.backsheet.semua",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

	function cetak()
	{
		$pengirimans = Pengiriman::where('id_agen',$_SESSION['id'])->where('tanggal',date('Y-m-d'))->get();
		$layanans = [];

		foreach($pengirimans as $pengiriman){
			if(!in_array($pengiriman->jenis_layanan,$layanans)){
				$layanans[] = $pengiriman->jenis_layanan;
			}
		}
		return partial("agen.backsheet.cetak",[
			'pengirimans'=>$pengirimans,
			'layanans'=>$layanans,
		]);
	}

}