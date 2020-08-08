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
		<div style="margin:10px;margin-left: 30px;margin-right: 30px;">
			<br>
			<center>
				<img src="<?=asset('assets/agen.png')?>">
				<br><br>
				<h3>Selamat Datang Agen <?=session()->user()->nama?></h3>
			</center>
			
			<center>
			
			<br><br>
			&copy; Agen Pos 2020
			</center>
			<br>
		</div>
	</div>
</div>