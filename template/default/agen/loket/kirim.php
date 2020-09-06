<style type="text/css">
.center {
  /*display: flex;*/
  /*justify-content: center;*/
  /*align-items: center;*/
  overflow: auto;
}
.box-login {
	background-color: #FFF;
	height: auto;
	position: relative;
	margin-top: 20px;
	border:2px solid #3498db;
}
td label {
	font-size: 12px;
}
</style>
<div class="form-login center" style="margin-bottom: 80px;">
	<div class="box-login container">
		<form method="post" action="<?=base_url()?>/agen/loket/proses">
		<div style="margin:10px;margin-left: 30px;margin-right: 30px;">
			<center>
				<h3>Loket Pengiriman</h3>
			</center>
			<?php if(session()->get('success')): ?>
			<div class="alert alert-success"><?=session()->get('success')?></div>
			<?php session()->reset('success'); endif ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<p></p>
						<center>
						<div>
						<input type="hidden" name="pengiriman[id_agen]" value="<?=$_SESSION['id']?>">
						<b>ID Pelanggan</b>
						<input type="text" name="pengiriman[id_pelanggan]" value="0" style="width: 200px">
						<b>EXT ID</b>
						<input type="text" name="pengiriman[id_ext]" value="0" style="width: 200px">
						<br>
						</div>
						</center>
						<br>
					</div>

					<!-- Modals -->

					<div class="modal fade" tabindex="-1" role="dialog" id="tujuan">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Pilih Tujuan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Provinsi</label>
									<select class="form-control" id="id_provinsi" required="">
										<option value="">- Pilih -</option>
										<?php foreach($provinces as $province): ?>
										<option value="<?= $province->province_id ?>"><?=$province->province?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group" id="p-city" style="display:none">
									<label>Kabupaten</label>
									<select class="form-control" id="id_kabupaten" required="">
										<option value="">- Pilih -</option>
									</select>
								</div>
								<div class="form-group" id="p-address" style="display:none">
									<label>Alamat</label>
									<textarea id="address" rows="5" class="form-control"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="tujuan-ok" data-dismiss="modal">Ok</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							</div>
							</div>
						</div>
					</div>

					<!-- / Modals -->

					<div class="col-sm-12 col-md-4">
						<table width="100%">
							<tr>
								<td>
									<label>No. Resi</label>
								</td>
								<td>
									<input type="text" name="pengiriman[no_resi]" class="form-control form-control-sm" value="<?=$resi?>" readonly>
								</td>
							</tr>
							<tr>
								<td>
									<label>Tujuan</label>
								</td>
								<td>
								
									<input type="text" data-toggle="modal" data-target="#tujuan" name="pengiriman[tujuan]" id="i-tujuan" readonly="" class="form-control form-control-sm" required="">
								</td>		
							</tr>
							<tr>
								<td>
									<label>Berat Aktual</label>
								</td>
								<td>
									<input type="number" value="1" name="pengiriman[berat_aktual]" class="form-control form-control-sm berat_aktual" required="" min="1" id="berat-act">
								</td>
							</tr>
							<tr>
								<td>
									<label>Jenis Kiriman</label>
								</td>
								<td>
									<select class="form-control form-control-sm" name="pengiriman[jenis_kiriman]" required="">
										<option value="">- Pilih Jenis Kiriman -</option>
										<option value="Surat">Surat</option>
										<option value="Paket">Paket</option>
									</select>
									<!-- <input type="text" name="pengiriman[jenis_kiriman]" class="form-control form-control-sm" required=""> -->
								</td>
							</tr>
							<tr>
								<td>
									<label>Nilai Barang</label>
								</td>
								<td>
									<input type="number" name="pengiriman[nilai_barang]" min="1" value="1" class="form-control form-control-sm nilai_barang" required="">
								</td>
							</tr>
							<input type="hidden" name="pengiriman[jenis_layanan]" id="inp-layanan">
							<input type="hidden" name="pengiriman[tarif]" id="inp-tarif">	
							<tr>
								<td colspan="2">
									<table class="table table-bordered" >
										<tr>
											<td>No</td>
											<td>Layanan</td>
											<td>Tarif</td>
										</tr>
										<tbody id="tbl-layanan">
											<tr>
												<td colspan="3" style="height: 270px;vertical-align: middle">
													<center>
													<i>Tidak ada layanan</i>
													</center>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<label>Kategori</label>
								</td>
								<td>
									<input type="text" name="pengiriman[kategori]" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Isi Kiriman</label>
								</td>
								<td>
									<input type="text" name="pengiriman[isi_kiriman]" class="form-control form-control-sm" required="">
								</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-12 col-md-4">
						<select class="form-control" name="serbaguna">
							<option value="0 | Serbaguna">0 | Serbaguna</option>
							<option value="1 | XXXXXXXXX">1 | XXXXXXXXX</option>
						</select>
						<br>
						<b>Volumetrik</b>
						<p></p>
						<center>
						<div>
						P
						<input type="text" name="pengiriman[volume_p]" class="volume_p" style="width: 50px" value="0" disabled=""> x
						L
						<input type="text" name="pengiriman[volume_l]" class="volume_l" style="width: 50px" value="0" disabled=""> x
						T
						<input type="text" name="pengiriman[volume_t]" class="volume_t" style="width: 50px" value="0" disabled="">
						<br>
						</div>
						</center>
						= --------------------------------------------------------<br>
						<center>6000</center>

						<table width="100%">
							<tr>
								<td>
									<label>Berat Volume</label>
								</td>
								<td>
									<input type="number" value="0" name="pengiriman[volume_berat]" class="form-control form-control-sm volume_berat" min="0" readonly="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Berat</label>
								</td>
								<td>
									<input type="text" class="form-control form-control-sm berat_dipakai" readonly="">
								</td>
							</tr>
						</table>

						<p></p>
						<br><br><br><br><br>
						<b>Bea</b>
						<table width="100%">
							<tr>
								<td>
									<label>Bea Kirim</label>
								</td>
								<td>
									<input type="text" readonly="" name="pengiriman[bea_kirim]" class="bea-kirim form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Diskon</label>
								</td>
								<td>
									<input type="number" value="0" name="pengiriman[diskon]" class="form-control form-control-sm diskon" required="" readonly="">
								</td>
							</tr>
							<tr>
								<td>
									<label>PPN</label>
								</td>
								<td>
									<input type="number" value="0" name="pengiriman[ppn]" class="form-control form-control-sm ppn" required="" readonly="">
								</td>
							</tr>
							<tr>
								<td>
									<label>HTNB</label>
								</td>
								<td>
									<input type="number" value="0" name="pengiriman[htnb]" class="form-control form-control-sm htnb" required="" readonly="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Jumlah (RP)</label>
								</td>
								<td>
									<input type="text" readonly="" name="pengiriman[jumlah_bea]" class="form-control form-control-sm jumlah" required="">
								</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-12 col-md-4">
						<b>Data Penerima</b>
						<table width="100%">
							<tr>
								<td colspan="2">
									<label>Nama Perusahaan</label>
									<input type="text" name="penerima[nama_perusahaan]" class="form-control form-control-sm" >
									<p></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Nama</label>
								</td>
								<td>
									<input type="text" name="penerima[nama]" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Alamat</label>
								</td>
								<td>
									<input type="text" name="penerima[alamat]" class="form-control form-control-sm alamat_penerima" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="penerima[hp]" required="" style="width: 110px">

									<label>E-Mail</label>
									<input type="text" name="penerima[email]" required="" style="width: 100px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Kota</label>
									<input type="text" name="penerima[kota]" required="" class="kota_penerima" style="width: 110px">

									<label>Kodepos&nbsp;</label>
									<input type="text" name="penerima[kode_pos]" required="" style="width: 110px">

								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Provinsi&nbsp;&nbsp;</label>
									<input type="text" name="penerima[provinsi]" required="" class="provinsi_penerima" style="width: 110px">

									<label>Negara</label>
									<input type="text" name="penerima[negara]" required="" value="Indonesia" style="width: 100px">
								</td>
							</tr>
						</table>
						<br>
						<b>Data Pengirim</b>
						<table width="100%">
							<tr>
								<td colspan="2">
									<label>Nama Perusahaan</label>
									<input type="text" name="pengirim[nama_perusahaan]" class="form-control form-control-sm">
									<p></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Nama</label>
								</td>
								<td>
									<input type="text" name="pengirim[nama]" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Alamat</label>
								</td>
								<td>
									<input type="text" value="Jl. Sabang Merauke no 59 pematang siantar" name="pengirim[alamat]" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="pengirim[hp]" required="" style="width: 110px">

									<label>E-Mail</label>
									<input type="text" name="pengirim[email]" required="" style="width: 100px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Kota</label>
									<input type="text" name="pengirim[kota]" value="Pematang Siantar" required="" style="width: 110px">
									<label>Kodepos&nbsp;</label>
									<input type="text" name="pengirim[kode_pos]" value="21121" required="" style="width: 110px">

								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Provinsi&nbsp;&nbsp;</label>
									<input type="text" name="pengirim[provinsi]" value="Sumatera Utara" required="" style="width: 110px">

									<label>Negara</label>
									<input type="text" name="pengirim[negara]" value="Indonesia" required="" value="Indonesia" style="width: 100px">
								</td>
							</tr>
						</table>
						<br>
					</div>
				</div>
			</div>
			<p></p>
			<center>
			<div style="font-size: 12px;">
			<label>Tarif ($)</label>
			<input type="text" readonly="" name="pengiriman[total_tarif]" required="" id="i-tarif" readonly style="width: 110px">

			<label>Jumlah</label>
			<input type="text" name="pengiriman[jumlah_tarif]" required="" style="width: 110px">

			<label>BSU Loket</label>
			<input type="text" name="pengiriman[bsu_loket]" required="" style="width: 110px">

			<label>Kolektif</label>
			<input type="text" name="pengiriman[kolektif]" required="" style="width: 110px">

			<label>Batal</label>
			<input type="text" name="pengiriman[batal]" required="" style="width: 110px">

			<label>BSU Batal</label>
			<input type="text" name="pengiriman[bsu_batal]" required="" style="width: 110px">
			</div>
			</center>
			<center>
			<button class="btn btn-primary"><i class="fa fa-save"></i> Proses</button>
			<button class="btn btn-warning" type="reset"><i class="fa fa-refresh"></i> Reset</button>

			<a class="btn btn-success" href="<?=base_url()?>/agen/home"><i class="fa fa-close"></i> Cancel</a>
		</div>
		</form>
	</div>
</div>

<script>
var provinsi = document.querySelector("#id_provinsi")
var kabupaten = document.querySelector("#id_kabupaten")
var address = document.querySelector("#address")

var btnTujuan = document.querySelector("#tujuan-ok")

var pCity = document.querySelector("#p-city")
var pService = document.querySelector("#p-service")
var pAddress = document.querySelector("#p-address")

var iTujuan = document.querySelector("#i-tujuan")
var iTarif = document.querySelector("#i-tarif")
var tblLayanan = document.querySelector("#tbl-layanan")
var beratAct = document.querySelector("#berat-act")
var vBerat = document.querySelector(".volume_berat")
var jumlah = document.querySelector(".jumlah")
var beaKirim = document.querySelector(".bea-kirim")
var nilai_barang = document.querySelector(".nilai_barang")
var htnb = document.querySelector(".htnb")
var ppn  = document.querySelector(".ppn")
var volume_p = document.querySelector(".volume_p")
var volume_l = document.querySelector(".volume_l")
var volume_t = document.querySelector(".volume_t")
var volume_berat = document.querySelector(".volume_berat")

provinsi.onchange = async () => {
	var response = await fetch('<?=base_url()?>/agen/loket/get_cities/'+provinsi.value)
	var data     = await response.json()

	pCity.style.display = "block"

	kabupaten.innerHTML = "<option value=''>- Pilih -</option>"
	data.forEach(val => {
		kabupaten.innerHTML += `<option value='${val.city_id}'>${val.city_name}</option>`
	})
}

kabupaten.onchange = (e) => {
	pAddress.style.display = "block"	
}

btnTujuan.onclick = async () => {
	volume_p.disabled = false
	volume_l.disabled = false
	volume_t.disabled = false
	var response = await fetch('<?=base_url()?>/agen/loket/get_city/'+kabupaten.value+'?province='+provinsi.value)
	var res     = await response.json()
	iTujuan.value = res.province+", "+res.city_name+", "+address.value
	document.querySelector('.alamat_penerima').value = iTujuan.value
	document.querySelector('.provinsi_penerima').value = res.province
	document.querySelector('.kota_penerima').value = res.city_name
}	

async function getTujuan()
{
	var response = await fetch('<?=base_url()?>/agen/loket/get_city/'+kabupaten.value+'?province='+provinsi.value)
	var res     = await response.json()

	// iTujuan.value = res.province+", "+res.city_name+", "+address.value

	var res = await fetch('<?=base_url()?>/agen/loket/get_costs/'+kabupaten.value+"?courier=pos")
	var data = await res.json()

	var html = "";

	if(data.length > 0){
		data.forEach((layanan,i)=>{
			var harga = layanan.cost[0].value
			var _htnb = 0.0025 * nilai_barang.value
			harga = harga+_htnb

			var _ppn = 0.01*layanan.cost[0].value
			harga = harga+_ppn

			var berat = beratAct.value > vBerat.value ? beratAct.value : vBerat.value

			document.querySelector(".berat_aktual").value = berat

			harga = harga+(berat*harga)

			document.querySelector('.berat_dipakai').value = berat
			
			html += `
			<tr>
				<td>${i+1}</td>
				<td>${layanan.description}</td>
				<td>
					<b>Rp.${new Intl.NumberFormat().format(harga)}/kg</b><br>
					ETD: ${layanan.cost[0].etd}<br>
					<button class="btn btn-success btn-sm" type="button" onclick="selectTarif(${layanan.cost[0].value},'${layanan.description}',${harga})">Pilih</button>
				</td>
			</tr>
			`
		})
	}else{
		html = `
		<tr>
		<td colspan="3">Tidak ada data</td>
		</tr>
		`
	}


	tblLayanan.innerHTML = html
}

function selectTarif(val,layanan,harga){
	harga = new Intl.NumberFormat().format(harga)
	document.querySelector("#inp-layanan").value = layanan
	document.querySelector("#inp-tarif").value = harga

	beaKirim.value = val

	ppn.value = 0.01*val
	htnb.value = 0.025 * nilai_barang.value
	iTarif.value = harga
	jumlah.value = harga
}

document.querySelector(".nilai_barang").onblur = async (evt) => {
	await getTujuan()
}

document.querySelector(".berat_aktual").onblur = async (evt) => {
	await getTujuan()
}

document.querySelector(".volume_berat").onblur = async (evt) => {
	await getTujuan()
}

document.querySelector(".volume_p").onblur = async (evt) => {
	hitungMetrik()
	await getTujuan()
}

document.querySelector(".volume_l").onblur = async (evt) => {
	hitungMetrik()
	await getTujuan()
}

document.querySelector(".volume_t").onblur = async (evt) => {
	hitungMetrik()
	await getTujuan()
}

function hitungMetrik()
{
	volume_berat.value = (volume_p.value*volume_l.value*volume_t.value)/6000
}

// document.querySelector(".diskon").onkeyup = (evt) => {
// 	var ppn = document.querySelector(".ppn").value
// 	var htnb = document.querySelector(".htnb").value
// 	bea_kirim = beaKirim.value.replace(",","")
// 	var tarif = bea_kirim - (bea_kirim * parseInt(evt.target.value)/100) + parseInt(ppn) + parseInt(htnb)

// 	tarif = new Intl.NumberFormat().format(tarif)

// 	iTarif.value = tarif
// 	jumlah.value = tarif
// }

// document.querySelector(".ppn").onkeyup = (evt) => {
// 	var diskon = document.querySelector(".diskon").value
// 	var htnb = document.querySelector(".htnb").value
// 	bea_kirim = beaKirim.value.replace(",","")
// 	var tarif = bea_kirim - (bea_kirim * parseInt(diskon)/100) + parseInt(evt.target.value) + parseInt(htnb)
	
// 	tarif = new Intl.NumberFormat().format(tarif)

// 	iTarif.value = tarif
// 	jumlah.value = tarif
// }

// document.querySelector(".htnb").onkeyup = (evt) => {
// 	var diskon = document.querySelector(".diskon").value
// 	var ppn = document.querySelector(".ppn").value
// 	bea_kirim = beaKirim.value.replace(",","")
// 	var tarif = bea_kirim - (bea_kirim * parseInt(diskon)/100) + parseInt(evt.target.value) + parseInt(ppn)
	
// 	tarif = new Intl.NumberFormat().format(tarif)

// 	iTarif.value = tarif
// 	jumlah.value = tarif
// }

</script>