<div class="continer">
	<div class="box box-info box-solid">
		<div class="box-header with-border">
			<?php if ($this->session->userdata('u_role') == "admin"): ?>
				<strong>Pelayanan Hari Ini</strong>
				<?php else: ?>
				<strong>Perthitungan Permohonan</strong>
			<?php endif ?>	
		</div>
		<div class="box-body">
			<div class="row">
				<?php if ($this->session->userdata('u_role_name') == "admin"): ?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
			                <div class="inner">
			                  <h3><?php echo number_format('1000000') ?></h3>
			                  <p><strong>Pelayanan Akta</strong></p>
			                </div>
			                <div class="icon">
			                  <i class="fa fa-file-text"></i>
			                </div>
			                <a href="#" class="small-box-footer">
			                  Lihat Detail <i class="fa fa-arrow-circle-right"></i>
			                </a>
			              </div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-yellow">
			                <div class="inner">
			                  <h3>100</h3>
			                  <p><strong>Pelayanan KTP</strong></p>
			                </div>
			                <div class="icon">
			                  <i class="fa fa-credit-card"></i>
			                </div>
			                <a href="#" class="small-box-footer">
			                  Lihat Detail <i class="fa fa-arrow-circle-right"></i>
			                </a>
			              </div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
			                <div class="inner">
			                  <h3>150</h3>
			                  <p><strong>Pelayanan Pindah/Datang</strong></p>
			                </div>
			                <div class="icon">
			                  <i class="fa fa-envelope"></i>
			                </div>
			                <a href="#" class="small-box-footer">
			                  Lihat Detail <i class="fa fa-arrow-circle-right"></i>
			                </a>
			              </div>
					</div>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-red">
			                <div class="inner">
			                  <h3>150</h3>
			                  <p><strong>Pelayanan KK</strong></p>
			                </div>
			                <div class="icon">
			                  <i class="fa fa-database"></i>
			                </div>
			                <a href="#" class="small-box-footer">
			                  Lihat Detail <i class="fa fa-arrow-circle-right"></i>
			                </a>
			              </div>
					</div>
				<?php else: ?>
					<?php if ($this->session->userdata('u_pelayanan_id') == 2): ?>
						
					<?php endif ?>
				<?php endif ?>
			</div>	
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-xs-12">
			<div class="box box-warning box-solid">
				<div class="box-header">
					<strong>Informasi</strong>
				</div>
				<div class="box-body">
					<dl>
						<dt>SIMANDUK</dt>
						<dd>
							Simanduk adalah Sistem Informasi Manajemen Administrasi Kependudukan yang berfungsi mengadministrasi pelayanan AKTA, KTP, KK, PINDAH / DATANG di Dinas Kependudukan dan Pencatatan Sipil Kabupaten Brebes. Aplikasi ini di buat guna mempermudah dalam megelola data permohonan warga, sehingga sistem manajemen pelayanan akan lebih baik dan dapat dimonitor.   
						</dd>
					</dl>
					<dl>
						<dt>Penggunaan</dt>
						<dd>Setiap operator yang ditunjuk untuk megelola aplikasi SIMANDUK akan diberikan akun. Dan akun tersebut sesuai dengan jenis pelayanan yang ada. Hal ini digunakan agar operator dapat mengelola data permohonan warga sesuai dengan pelayanan yang diakses.</dd>
					</dl>
				</div>
			</div>			
		</div>
		<div class="col-lg-6 col-xs-12">
			<div class="box box-success box-solid">
				<div class="box-header">
					<strong>Informasi Akun</strong>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-8">
							<table class="table table-striped">
								<tr>
									<td><strong>Nama</strong></td>
									<td>:</td>
									<td><?php echo $this->session->userdata('u_fullname'); ?></td>
								</tr>
								<tr>
									<td><strong>Login Terkahir</strong></td>
									<td>:</td>
									<td><?php echo tgl_indo($this->session->userdata('u_last_login')) ?></td>
								</tr>
								<tr>
									<td><strong>Login Sebagai</strong></td>
									<td>:</td>
									<td><?php echo $u['role'] ?></td>
								</tr>
								<tr>
									<td><strong>IP Anda</strong></td>
									<td>:</td>
									<td><?php echo $_SERVER['REMOTE_ADDR'] ?></td>
								</tr>

							</table>							
						</div>
						<div class="col-md-4">
							<?php if ($this->session->userdata('u_jk') == "l"): ?>
								<img src="<?php echo assets_url ?>adminlte/dist/img/avatar5.png" class="user-image img-responsive" alt="User Image"/><br>
							<?php else: ?>
								<img src="<?php echo assets_url ?>adminlte/dist/img/avatar3.png" class="user-image img-responsive" alt="User Image"/><br>
							<?php endif ?>
							<center><a href="<?php echo site_url('edit-profil') ?>">Edit Profil</a></center>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>