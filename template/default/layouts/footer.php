<!-- Taskbar -->
<div class="taskbar">
    <div class="icons">
        <div class="icons-left">
            <a href="#start-menu-modal" id="start-menu"><i class="fa fa-windows" aria-hidden="true"></i></a>
        </div>
        <div class="icons-right">
        </div>
    </div>
</div>

<!-- Start menu -->
<div id="start-menu-modal">
    <div id="user">
        <a class="push" href="#"><i class="fa fa-bars"></i></a>
        <!-- <a href="#"><i class="fa fa-user"></i></a>
        <a href="#"><i class="fa fa-cog"></i></a> -->
        <a href="<?=base_url()?>/auth/logout"><i class="fa fa-power-off"></i></a>
    </div>
    <div id="apps">
    	<?php if(session()->user()->level == 'admin'): ?>
        <a href="javascript:void(0)" onclick="toggleActive('user')">Administrasi User</a>
        <a href="javascript:void(0)" onclick="toggleActive('layanan')">Administrasi Layanan</a>
        <a href="javascript:void(0)" onclick="toggleActive('transaksi')">Administrasi Transaksi</a>
        <a href="javascript:void(0)" onclick="toggleActive('laporan')">Laporan</a>
        <?php else: ?>

        <a href="javascript:void(0)" onclick="toggleActive('adm-transaksi')">Administrasi Transaksi</a>
        <a href="javascript:void(0)" onclick="toggleActive('adm-layanan')">Administrasi Layanan</a>
        <a href="javascript:void(0)" onclick="toggleActive('kiriman')">Kiriman POS</a>
    	<?php endif ?>
    </div>
    <div id="others">
    	<div class="other-item user <?= session()->user()->level == 'admin' ? 'active' : '' ?>">
			<div class="title-others">
	            Administrasi User
	        </div>
	        <div class="box-others">
	            <div class="box">
	            	<a href="<?=base_url()?>/admin/loket/register">
	                <img src="<?=asset('assets/register.png')?>" alt="">
	                <span>Registrasi Loket</span>
	                </a>
	            </div>
	            <div class="box">
	            	<a href="<?=base_url()?>/admin/loket/aktivasi">
	                <img src="<?=asset('assets/activation.png')?>" alt="">
	                <span>Aktivasi User</span>
	            	</a>
	            </div>
	            <div class="box">
	            	<a href="<?=base_url()?>/admin/loket/ubah">
	                <img src="<?=asset('assets/user-edit.jpg')?>" alt="">
	                <span>Ubah Data User</span>
	                </a>
	            </div>
	        </div>
        </div>

        <div class="other-item layanan">
	        <div class="title-others">
	            Administrasi Layanan
	        </div>
	        <div class="box-others">
	            <div class="box">
	                <img src="<?=asset('assets/report.png')?>" alt="">
	                <span>Buka Rekap</span>
	            </div>
	            <div class="box">
	                <img src="<?=asset('assets/cancel.png')?>" alt="">
	                <span>Tutup Rekap</span>
	            </div>
	        </div>
	    </div>

	    <div class="other-item transaksi">
	        <div class="title-others">
	            Administrasi Transaksi
	        </div>
	        <div class="box-others">
	            <div class="box">
	                <img src="<?=asset('assets/check.png')?>" alt="">
	                <span>Status Backsheet Loket</span>
	            </div>
	            <!-- <div class="box">
	                <img src="<?=asset('assets/saldo.jpg')?>" alt="">
	                <span>Cek Saldo</span>
	            </div> -->
	            <div class="box">
	                <img src="<?=asset('assets/tarif-check.png')?>" alt="">
	                <span>Cek Tarif</span>
	            </div>
	            <div class="box">
	                <img src="<?=asset('assets/cancel.png')?>" alt="">
	                <span>Pembatalan Kiriman</span>
	            </div>
	        </div>
	    </div>

        <div class="other-item laporan">
	        <div class="title-others">
	            Laporan
	        </div>
	        <div class="box-others">
	            <div class="box">
	                <img src="<?=asset('assets/report.png')?>" alt="">
	                <span>Laporan Transaksi Batal</span>
	            </div>
	            <div class="box">
	                <img src="<?=asset('assets/print.png')?>" alt="">
	                <span>Cetak Ulang Rekap</span>
	            </div>
	            <div class="box">
	                <img src="<?=asset('assets/print.png')?>" alt="">
	                <span>Cetak Ulang Backsheet</span>
	            </div>
	        </div>
	    </div>

	    <div class="other-item adm-transaksi  <?= session()->user()->level == 'agen' ? 'active' : '' ?>">
	        <div class="title-others">
	            Administrasi Transaksi
	        </div>
	        <div class="box-others">
	            <div class="box">
	                <img src="<?=asset('assets/check.png')?>" alt="">
	                <span>Cetak Backsheet POS</span>
	            </div>
	            <!-- <div class="box">
	                <img src="<?=asset('assets/saldo.jpg')?>" alt="">
	                <span>Cek Saldo</span>
	            </div> -->
	        </div>
	    </div>

	    <div class="other-item adm-layanan">
	        <div class="title-others">
	            Administrasi Layanan
	        </div>
	        <div class="box-others">
	            <div class="box">
					<a href="<?=base_url()?>/agen/backsheet/index">
						<img src="<?=asset('assets/report.png')?>" alt="">
						<span>Buka Backsheet</span>
					</a>
	            </div>
	            <div class="box">
	                <img src="<?=asset('assets/report.png')?>" alt="">
	                <span>Tutup Backsheet</span>
	            </div>
	        </div>
	    </div>

	    <div class="other-item kiriman">
	        <div class="title-others">
	            Kiriman Pos
	        </div>
	        <div class="box-others">
	            <div class="box">
	            	<a href="<?=base_url()?>/agen/loket/kirim">
	                <img src="<?=asset('assets/report.png')?>" alt="">
	                <span>Loket Kiriman Ritel</span>
	            	</a>
	            </div>
	        </div>
	    </div>
    </div>
</div>