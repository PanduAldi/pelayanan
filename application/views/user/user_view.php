<div class="row">
	<div class="col-lg-12">
		<div class="box box-default box-solid">
			<div class="box-header">
				<strong>Detail User <?php echo ucwords($data['user_name']) ?></strong>
			</div>
			<div class="box-body">
				<div class="back">
					<a href="<?php echo site_url('setting-user') ?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Kembali	</a> <br><br>
				</div>
				<div class="row">
					<div class="col-lg-9">
						<table class="table table-striped">
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><?php echo $data['user_nik'] ?></td>
							</tr>
							<tr>
								<td width="200">Nama Lengkap</td>
								<td width="10">:</td>
								<td><?php echo ucwords($data['user_full_name']) ?></td>
							</tr>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><?php echo ucwords($data['user_name']) ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $data['user_email'] ?></td>
							</tr>
							<tr>
								<td>Tanggal di buat</td>
								<td>:</td>
								<td><?php echo $data['user_created_date'] ?></td>
							</tr>
							<tr>
								<td>Terakhir Login</td>
								<td>:</td>
								<td><?php echo $data['user_last_login'] ?></td>
							</tr>
							<tr>
								<td>Level Akses</td>
								<td>:</td>
								<td><?php echo strtoupper($data['role']) ?></td>
							</tr>
							<tr>
								<td>Status User</td>
								<td>:</td>
								<td><?php echo $data['user_active'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-lg-3">
		                <?php if ($data['user_jk'] == "l"): ?>
		                  <img src="<?php echo assets_url ?>adminlte/dist/img/avatar5.png" class="user-image" alt="User Image"/>
		                <?php else: ?>
		                  <img src="<?php echo assets_url ?>adminlte/dist/img/avatar3.png" class="user-image" alt="User Image"/>
		                <?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>