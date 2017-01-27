 <div class="row">
	<div class="col-lg-12">
		<div class="box box-default box-solid">
			<div class="box-header">
				<strong>Tambah User</strong>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-9">
						<table class="table table-striped">
							<form action="" method="POST">
							<tr>
								<td>NIK</td>
								<td>:</td>
								<td><input type="text" name="nik" id="" class="form-control"></td>
							</tr>
							<tr>
								<td width="200">Nama Lengkap</td>
								<td width="10">:</td>
								<td><input type="text" name="fullname" id="" class="form-control"></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>
									<select name="jk" class="form-control" id="">
										<option value="">-- Pilih Jenis Kelamin --</option>
										<?php  
											$d = array('l' => "Laki-Laki", 'p' => 'Perempuan');

											foreach ($d as $k => $v) {
												echo '<option value="'.$k.'">'.$v.'</option>';
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Username</td>
								<td>:</td>
								<td><input type="text" name="username" id="" class="form-control"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><input type="text" name="email" id="" class="form-control"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input type="password" name="password" id="" class="form-control"></td>
							</tr>
							<tr>
								<td>Level Akses</td>
								<td>:</td>
								<td>
									<select name="role" class="form-control">
										<option value="">-- Pilih Level Akses --</option>
										<?php  
											foreach ($role as $k) {
												echo '<option value="'.$k['role_id'].'">'.strtoupper($k['role']).'</option>';
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Pelayanan </td>
								<td>:</td>
								<td>
									<select name="pelayanan" class="form-control">
										<option value="">-- Pilih Akses Pelayanan --</option>
										<?php  
											foreach ($pelayanan as $k) {
												echo '<option value="'.$k['pelayanan_id'].'">'.strtoupper($k['pelayanan_name']).'</option>';
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
									<a href="<?php echo site_url('setting-user') ?>" class="btn btn-danger">Batal</a>
								</td>
								<td></td>
								<td></td>
							</tr>
							</form>
						</table>
					</div>
					<div class="col-lg-3" class="gambar">
						<div class="panel panel-success">
							<div class="panel-body">
								<dl>
									<dt>Info : </dt>
									<dd>Silahkan isi form disamping kanan untuk menambahkan user. Pastikan user sesuai dengan Level Akses & Pelayanan Akses. Form harus di isi semua / tidak boleh kosong.</dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>