<?php
namespace App\Controllers\Agen;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AgenMiddleware;
use App\Models\Pengiriman;

class BacksheetController
{
	function __construct()
	{
		new AgenMiddleware;
	}

	function index()
	{
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