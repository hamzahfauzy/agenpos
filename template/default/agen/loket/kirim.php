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
		<form method="post" action="<?=base_url()?>/admin/loket/postRegister">
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
						<b>ID Pelanggan</b>
						<input type="text" name="user_id" required="" style="width: 200px" placeholder="P">
						<b>EXT ID</b>
						<input type="text" name="user_id" required="" style="width: 200px" placeholder="L">
						<br>
						</div>
						</center>
						<br>
					</div>
					<div class="col-sm-12 col-md-4">
						<table width="100%">
							<tr>
								<td>
									<label>No. Resi</label>
								</td>
								<td>
									<input type="text" name="no_resi" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Tujuan</label>
								</td>
								<td>
									<input type="text" name="tujuan" readonly="" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Berat Aktual</label>
								</td>
								<td>
									<input type="text" name="berat_aktual" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Jenis Kiriman</label>
								</td>
								<td>
									<input type="text" name="jenis_kiriman" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Nilai Barang</label>
								</td>
								<td>
									<input type="number" name="nilai_barang" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<table class="table table-bordered">
										<tr>
											<td>No</td>
											<td>Layanan</td>
											<td>Tarif</td>
										</tr>
										<tr>
											<td colspan="3" style="height: 270px;vertical-align: middle">
												<center>
												<i>Tidak ada layanan</i>
												</center>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<label>Kategori</label>
								</td>
								<td>
									<input type="text" name="nilai_barang" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Isi Kiriman</label>
								</td>
								<td>
									<input type="text" name="nilai_barang" class="form-control form-control-sm" required="">
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
						<input type="text" name="user_id" required="" style="width: 50px" placeholder="P"> x
						L
						<input type="text" name="user_id" required="" style="width: 50px" placeholder="L"> x
						T
						<input type="text" name="user_id" required="" style="width: 50px" placeholder="T">
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
									<input type="text" name="no_resi" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Berat</label>
								</td>
								<td>
									<input type="text" name="tujuan" class="form-control form-control-sm" required="">
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
									<input type="text" name="no_resi" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Diskon</label>
								</td>
								<td>
									<input type="text" name="tujuan" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>PPN</label>
								</td>
								<td>
									<input type="text" name="tujuan" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>HTNB</label>
								</td>
								<td>
									<input type="text" name="tujuan" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Jumlah (RP)</label>
								</td>
								<td>
									<input type="text" name="tujuan" class="form-control form-control-sm" required="">
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
									<input type="text" name="user_id" class="form-control form-control-sm" required="">
									<p></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Nama</label>
								</td>
								<td>
									<input type="text" name="nama" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Alamat</label>
								</td>
								<td>
									<input type="text" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>E-Mail</label>
									<input type="text" name="password" required="" style="width: 100px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Kodepos&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>Kota</label>
									<input type="text" name="password" required="" style="width: 110px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Provinsi&nbsp;&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>Negara</label>
									<input type="text" name="password" required="" style="width: 100px">
								</td>
							</tr>
						</table>
						<br>
						<b>Data Pengirim</b>
						<table width="100%">
							<tr>
								<td colspan="2">
									<label>Nama Perusahaan</label>
									<input type="text" name="user_id" class="form-control form-control-sm" required="">
									<p></p>
								</td>
							</tr>
							<tr>
								<td>
									<label>Nama</label>
								</td>
								<td>
									<input type="text" name="nama" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td>
									<label>Alamat</label>
								</td>
								<td>
									<input type="text" class="form-control form-control-sm" required="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>E-Mail</label>
									<input type="text" name="password" required="" style="width: 100px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Kodepos&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>Kota</label>
									<input type="text" name="password" required="" style="width: 110px">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label>Provinsi&nbsp;&nbsp;</label>
									<input type="text" name="password" required="" style="width: 110px">

									<label>Negara</label>
									<input type="text" name="password" required="" style="width: 100px">
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
			<input type="text" name="password" required="" style="width: 110px">

			<label>Jumlah</label>
			<input type="text" name="password" required="" style="width: 110px">

			<label>BSU Loket</label>
			<input type="text" name="password" required="" style="width: 110px">

			<label>Kolektif</label>
			<input type="text" name="password" required="" style="width: 110px">

			<label>Batal</label>
			<input type="text" name="password" required="" style="width: 110px">

			<label>BSU Batal</label>
			<input type="text" name="password" required="" style="width: 110px">
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