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
		<form method="post" action="<?=base_url()?>/auth/doLogin">
		<div style="margin:10px;margin-left: 30px;margin-right: 30px;">
			<br>
			<center>
				<img src="<?=asset('assets/agen.png')?>">
				<h3>Login Form</h3>
			</center>
			<?php $old_email=""; if(session()->get('error')): $old_email = session()->get('old_user_id');?>
			<div class="alert alert-danger"><?=session()->get('error')?></div>
			<?php session()->reset('error');session()->reset('old_user_id'); endif ?>
			<table width="100%">
				<tr>
					<td>
						<label>User ID</label>
					</td>
					<td>
						<input type="text" name="user_id" value="<?=$old_email?>" class="form-control form-control-sm" required="">
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
					<td style="vertical-align: initial;">
						<label>Captcha</label>
					</td>
					<td style="vertical-align: initial;">
						<input type="text" name="captcha" class="form-control form-control-sm" placeholder="Masukkan Kode Captcha" required="">
						<p></p>
						<img src="<?=base_url()?>/auth/captcha" alt="gambar" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p></p>
						<center>
						<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
						<button class="btn btn-warning" type="reset"><i class="fa fa-close"></i> Cancel</button>
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