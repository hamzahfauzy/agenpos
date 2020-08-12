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
				<h5>REKAPITULASI KIRIMAN AGEN</h5>
			</center>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>NO</th>
						<th>AGEN</th>
						<th>RESI</th>
						<th>PENGIRIM</th>
						<th>PENERIMA</th>
						<th>TUJUAN</th>
						<th>BERAT</th>
						<th>OK</th>
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
							<td><?=$pengiriman->agen()->nama?></td>
							<td><?=$pengiriman->no_resi?></td>
							<td><?=$pengirim->nama?></td>
							<td><?=$penerima->nama?></td>
							<td><?=$pengiriman->tujuan?></td>
							<td><?=$pengiriman->berat_aktual?></td>
							<td><?=$pengiriman->tarif?></td>
							<td></td>
						</tr>
					<?php 
					
						$i++; 

						endif;
					
					endforeach;
						
					?>

					<?php

					endforeach;
					
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>