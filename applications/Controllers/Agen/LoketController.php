<?php
namespace App\Controllers\Agen;
if (!defined('Z_MVC')) die ("Not Allowed");

use App\Helpers\AgenMiddleware;
use App\Models\User;
use App\Models\Pengiriman;
use App\Models\Pengirim;
use App\Models\Penerima;

class LoketController
{

	public $apikey = "e07825fee157e94745b2c7d0e31c5953";

	function __construct()
	{
		new AgenMiddleware;
	}

	function kirim()
	{
		$resi = strtotime(date("Y-m-d h:i:s"));
		$provinces = $this->get_provinces();		
		return view("agen.loket.kirim",[
			'pengiriman' => Pengiriman::where('tanggal',date('Y-m-d'))->count(),
			'resi'=>$resi,
			'provinces'=>$provinces
		]);
	}

	function cetak($id_pengiriman)
	{
		$pengiriman = Pengiriman::find($id_pengiriman);
		return partial('agen.loket.cetak',[
			'pengiriman' => $pengiriman
		]);
	}

	function proses(){
		$_POST['pengiriman']['total_tarif'] = str_replace(',','',$_POST['pengiriman']['total_tarif']);
		$pengiriman = (new Pengiriman)->save($_POST['pengiriman']);
		if($pengiriman){
			$_POST['pengirim']['id_pengiriman'] = $pengiriman;
			$_POST['pengirim']['status_kolektif'] = 0;
			$_POST['penerima']['status_kolektif'] = 0;
			$_POST['penerima']['id_pengiriman'] = $pengiriman;

			if( (new Pengirim)->save($_POST['pengirim']) && (new Penerima)->save($_POST['penerima']) ){
				redirect("/agen/loket/cetak/$pengiriman");
				return false;
			}
		}
	}

	function get_provinces(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYHOST=> 0,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->apikey"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if($err)
			print_r($err);

		$results = json_decode($response);
		return $results->rajaongkir->results;
	}

	function get_city($id){
		$curl = curl_init();

		$province = $_GET['province'];

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$id&province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_SSL_VERIFYHOST=> 0,
			CURLOPT_SSL_VERIFYPEER=>0,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->apikey"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if($err)
			print_r($err);

		$results = json_decode($response);
		return $results->rajaongkir->results;
	}

	function get_cities($prov_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$prov_id",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_SSL_VERIFYHOST=> 0,
		CURLOPT_SSL_VERIFYPEER=>0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: $this->apikey"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$results = json_decode($response);

		echo json_encode($results->rajaongkir->results);
	}

	function get_costs($dest){
		$curl = curl_init();

		$courier = $_GET['courier'];

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_SSL_VERIFYHOST=> 0,
		CURLOPT_SSL_VERIFYPEER=>0,
		CURLOPT_POSTFIELDS => "origin=353&destination=$dest&weight=1000&courier=$courier",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: $this->apikey"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$results = json_decode($response);

		echo json_encode($results->rajaongkir->results[0]->costs);
	}

}