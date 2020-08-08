<style type="text/css">
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}
.box-login {
	background-color: #FFF;
	z-index: 1;
	width: 450px;
	height: auto;
	border:2px solid #3498db;
}
td label {
	font-size: 12px;
}
</style>
<div class="form-login center">
	<div class="box-login">
		<form method="post" action="<?=base_url()?>/admin/loket/postAktivasi">
		<div style="margin:10px;margin-left: 30px;margin-right: 30px;">
			<br>
			<center>
				<h3>Aktivasi User</h3>
			</center>
			<?php if(session()->get('success')): ?>
			<div class="alert alert-success"><?=session()->get('success')?></div>
			<?php session()->reset('success'); endif ?>
			<table width="100%">
				<tr>
					<td>
						<label>User ID</label>
					</td>
					<td>
						<select name="user_id" class="form-control form-control-sm" required="">
							<option value="">- Pilih -</option>
							<?php foreach($users as $user): ?>
							<option value="<?=$user->id?>"><?=$user->id?> (<?=$user->nama?>)</option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p></p>
						<center>
						<button class="btn btn-primary">Aktivasi</button>
						<a class="btn btn-warning" href="<?=base_url()?>/admin/home"><i class="fa fa-close"></i> Cancel</a>
						</center>
					</td>
				</tr>
			</table>
			<center>
			
			<br><br>
			&copy; Agen Pos 2020
			</center>
			<br>
		</div>
		</form>
	</div>
</div>