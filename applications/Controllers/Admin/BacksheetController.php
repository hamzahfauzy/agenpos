<?php
namespace App\Controllers\Admin;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AdminMiddleware;
use App\Models\Pengiriman;

class BacksheetController
{
	function __construct()
	{
		new AdminMiddleware;
	}

	function index()
	{
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

	function cetak()
	{
		$pengirimans = Pengiriman::get();
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