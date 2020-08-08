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
		<form method="post" action="<?=base_url()?>/admin/loket/postRegister">
		<div style="margin:10px;margin-left: 30px;margin-right: 30px;">
			<br>
			<center>
				<h3>Registrasi Loket</h3>
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
						<input type="text" name="user_id" class="form-control form-control-sm" required="">
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
						<label>Password</label>
					</td>
					<td>
						<input type="password" name="password" class="form-control form-control-sm" required="">
					</td>
				</tr>
				<tr>
					<td>
						<label>Alamat</label>
					</td>
					<td>
						<textarea name="alamat" class="form-control form-control-sm" required=""></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label>No. HP</label>
					</td>
					<td>
						<input type="tel" name="no_hp" class="form-control form-control-sm" required="">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p></p>
						<center>
						<button class="btn btn-primary">Register</button>
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