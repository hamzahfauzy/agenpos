<?php
$pengiriman->penerima();
$pengiriman->pengirim();
?>
<div style="padding:15px;border:2px solid #000;width: 600px">
<center>
	<img src="<?=asset('assets/logo-pos.jpg')?>" width="100px">
</center>
<b>AUTHORIZE PT. POS INDONESIA (PERSERO)</b>
<table cellspacing="0" cellpadding="5">
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?= date('Y-m-d') ?></td>
	</tr>
	<tr>
		<td>No Resi</td>
		<td>:</td>
		<td><?= $pengiriman->no_resi ?></td>
	</tr>
</table>
<center>
<p>
	Tanda Terima Kiriman <br>
	Dokumen dan Paket
</p>
</center>
<table cellspacing="0" cellpadding="5">
	<tr>
		<td>Jenis Kiriman</td>
		<td>:</td>
		<td><?= $pengiriman->jenis_kiriman?></td>
	</tr>
	<tr>
		<td>No Barcode</td>
		<td>:</td>
		<td><?= $pengiriman->no_resi?></td>
	</tr>
	<tr>
		<td>Isi Kiriman</td>
		<td>:</td>
		<td><?= $pengiriman->isi_kiriman?></td>
	</tr>
	<tr>
		<td>Berat Kiriman</td>
		<td>:</td>
		<td><?= $pengiriman->berat_aktual?></td>
	</tr>
</table>

<table cellspacing="0" cellpadding="5">
	<tr>
		<td>
			<br>
			<p>Penerima</p>
			<table cellspacing="0" cellpadding="5">
				<tr>
					<td><?= $pengiriman->penerima->nama?></td>
				</tr>
				<tr>
					<td><?= $pengiriman->penerima->alamat?></td>
				</tr>
				<tr>
					<td>Telp. <?= $pengiriman->penerima->hp?>, Email: <?= $pengiriman->penerima->email?></td>
				</tr>
				<tr>
					<td><?= $pengiriman->penerima->kode_pos?>, <?= $pengiriman->penerima->kota?>, <?= $pengiriman->penerima->provinsi?>, <?= $pengiriman->penerima->negara?></td>
				</tr>
			</table>

			<p>Pengirim</p>
			<table cellspacing="0" cellpadding="5">
				<tr>
					<td><?= $pengiriman->pengirim->nama?></td>
				</tr>
				<tr>
					<td><?= $pengiriman->pengirim->alamat?></td>
				</tr>
				<tr>
					<td>Telp. <?= $pengiriman->pengirim->hp?>, Email: <?= $pengiriman->pengirim->email?></td>
				</tr>
				<tr>
					<td><?= $pengiriman->pengirim->kode_pos?>, <?= $pengiriman->pengirim->kota?>, <?= $pengiriman->penerima->provinsi?>, <?= $pengiriman->penerima->negara?></td>
				</tr>
			</table>
		</td>
		<td style="vertical-align: top">
			<br>
			<table cellspacing="0" cellpadding="5">
				<tr>
					<td>Bea</td>
					<td>:</td>
					<td>Rp. <?= number_format($pengiriman->bea_kirim)?></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid #000;">Bea Lain</td>
					<td style="border-bottom: 1px solid #000;">:</td>
					<td style="border-bottom: 1px solid #000;">Rp. 0</td>
				</tr>
				<tr>
					<td>Netto</td>
					<td>:</td>
					<td>Rp. <?= number_format($pengiriman->bea_kirim) ?></td>
				</tr>
				<tr>
					<td>PPN</td>
					<td>:</td>
					<td>Rp. <?= number_format($pengiriman->ppn) ?></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid #000;">HTNB</td>
					<td style="border-bottom: 1px solid #000;">:</td>
					<td style="border-bottom: 1px solid #000;">Rp. <?= number_format($pengiriman->htnb) ?></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>Rp. <?= number_format($pengiriman->bea_kirim+$pengiriman->htnb) ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<center>
	<p>Persyaratan Pengiriman</p>
</center>
<table width="100%">
	<tr>
		<td width="50%">
			Kode Penerima (diisi pengantar)<br>
			O <br><br>
			Kode gagal antar di isi spv antaran<br>
			O
		</td>
		<td>
			<ol>
				<li>Setuju dengan ketentuan dan syarat pengirim yang ditetapkan PT. Pos Indonesia (persero)</li>
				<li>Nilai pertanggung jawaban Rp. <?=number_format($pengiriman->nilai_barang)?></li>
			</ol>
		</td>
	</tr>
</table>
</div>
<script type="text/javascript">
window.print();
</script>