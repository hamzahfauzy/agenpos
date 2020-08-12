<style type="text/css">
.box-login {
	background-color: #FFF;
	height: auto;
	position: relative;
	border:2px solid #3498db;
	padding:12px;
	margin-top: 20px;
}
.center {
  overflow: auto;
}
</style>
<div class="form-login center" style="margin-bottom: 80px;">
<div class="box-login container">
	<div class="row">
		<div class="col-12">
			<center>
				<h5>BACKSHEET KIRIMAN POS</h5>
				<h5>TANGGAL : <?= date("d-m-Y") ?></h5>
			</center>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>NO</th>
						<th>RESI</th>
						<th>PENGIRIM</th>
						<th>PENERIMA</th>
						<th>TUJUAN</th>
						<th>BERAT</th>
						<th>OK</th>
						<th>PPN</th>
						<th>HTNB</th>
						<th>PPN HTNB</th>
						<th>BSU</th>
						<th>KET</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=1;

					$total_berat = 0;
					$total_tarif = 0;
					$total_ppn = 0;
					$total_htnb = 0;
					$total_ppn_htnb = 0;
					$total_bsu_loket = 0;

					foreach($layanans as $layanan):
					
					$sub_total_berat = 0;
					$sub_total_tarif = 0;
					$sub_total_ppn = 0;
					$sub_total_htnb = 0;
					$sub_total_ppn_htnb = 0;
					$sub_total_bsu_loket = 0;

					?>

						<tr>
							<td colspan="12"> <b> <?=$layanan?> </b></td>
						</tr>

					<?php

					foreach($pengirimans as $pengiriman):

						if($layanan == $pengiriman->jenis_layanan):
						
						$pengirim = $pengiriman->pengirim();
						$penerima = $pengiriman->penerima();

						$sub_total_berat += $pengiriman->berat_aktual;
						$sub_total_tarif += $pengiriman->tarif;
						$sub_total_ppn += $pengiriman->ppn;
						$sub_total_htnb += $pengiriman->htnb;
						$sub_total_bsu_loket += $pengiriman->bsu_loket;
						$sub_total_ppn_htnb += $pengiriman->ppn + $pengiriman->htnb;

						?>
						
						<tr>
							<td><?=$i?></td>
							<td>
								<?=$pengiriman->no_resi?><br>
								<a href="<?=base_url()?>/agen/loket/cetak/<?=$pengiriman->id?>" class="no-print"><i class="fa fa-print"></i> Cetak Ulang Resi</a>
							</td>
							<td><?=$pengirim->nama?></td>
							<td><?=$penerima->nama?></td>
							<td><?=$pengiriman->tujuan?></td>
							<td><?=$pengiriman->berat_aktual?></td>
							<td><?=$pengiriman->tarif?></td>
							<td><?=$pengiriman->ppn?></td>
							<td><?=$pengiriman->htnb?></td>
							<td><?=$pengiriman->ppn + $pengiriman->htnb?></td>
							<td><?=$pengiriman->bsu_loket?></td>
							<td></td>
						</tr>
					<?php 
					
						$i++; 

						endif;
					
					endforeach;

					$total_berat += $sub_total_berat;
						$total_tarif += $sub_total_tarif;
						$total_ppn += $sub_total_ppn;
						$total_htnb += $sub_total_htnb;
						$total_ppn_htnb += $sub_total_ppn_htnb;
						$total_bsu_loket += $sub_total_bsu_loket;
					
						
					?>

					<tr>
						<th colspan="5">SUBTOTAL</th>
						<td><?=$sub_total_berat?></td>
						<td><?=$sub_total_tarif?></td>
						<td><?=$sub_total_ppn?></td>
						<td><?=$sub_total_htnb?></td>
						<td><?=$sub_total_ppn_htnb?></td>
						<td><?=$sub_total_bsu_loket?></td>
						<td></td>
					</tr>

					<?php

					endforeach;
					
					?>

					<tr>
						<th colspan="5">TOTAL</th>
						<td><?=$total_berat?></td>
						<td><?=$total_tarif?></td>
						<td><?=$total_ppn?></td>
						<td><?=$total_htnb?></td>
						<td><?=$total_ppn_htnb?></td>
						<td><?=$total_bsu_loket?></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table cellpadding="5">
				<tr>
					<th>Keterangan</th>
					<th>:</th>
					<td>0</td>
				</tr>
				<tr>
					<th>Jumlah transaksi batal</th>
					<th>:</th>
					<td>0</td>
				</tr>
				<tr>
					<th>Jumlah transaksi</th>
					<th>:</th>
					<td><?=count($pengirimans)?></td>
				</tr>
				<tr>
					<th>Total berat (kg)</th>
					<th>:</th>
					<td><?=$total_berat?></td>
				</tr>
				<tr>
					<th>Total besar tunai</th>
					<th>:</th>
					<td></td>
				</tr>
				<tr>
					<th>BSU Tunai</th>
					<th>:</th>
					<td></td>
				</tr>
				<tr>
					<th>BSU Kredit</th>
					<th>:</th>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
	<br><br>
</div>
</div>