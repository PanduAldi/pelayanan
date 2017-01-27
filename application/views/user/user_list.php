<div class="row">
	<div class="col-lg-9">
		<div class="box box-default box-solid">
			<div class="box-header">
				<strong>Data User</strong>
			</div>
			<div class="box-body">
				<div>
					<a href="<?php echo site_url('add-user') ?>" id="add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
				</div><br>
				<div>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama User</th>
								<th>Role</th>
								<th>User Created</th>
								<th>Last Login</th>
								<th>aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($user as $row): ?>
								<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo strtoupper($row['user_full_name']) ?></td>
											<td><?php echo $row['role'] ?></td>
											<td><?php echo $row['user_created_date'] ?></td>
											<td>
												<?php 
													if ($row['user_last_login'] == $row['user_created_date']) 
													{
														echo "Belum pernah login";
													}
													else
													{
														echo $row['user_last_login'];
													}
												?>
											</td>
											<td>
												<a title="Edit User" href="<?php echo site_url('edit-user/'.$row['user_id']) ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
												<a title="Hapus User" href="javascript:void(0)" class="btn btn-danger" onclick="hapus(<?php echo $row['user_id'] ?>)"><i class="fa fa-trash"></i></a>
												<a href="<?php echo site_url('view-user/'.$row['user_id']) ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a>
											</td>
										</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="box box-info box-solid">
			<div class="box-header">
				<strong>Informasi</strong>
			</div>
			<div class="box-body">
				<dl>
					<dt>Setting Pelayanan</dt>
					<dd>Digunakan untuk mengelola data pelayanan, data ini berpengaruh pada jenis pelayanan dan user operator. Silahkan klik tombol "Tambah Pelayanan" untuk menambah data pelayanan. Modul in hanya dikelola oleh administrator.</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

<!-- Hapus -->
<div class="modal fade" id="hapus_data">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Hapus Pelayanan </strong>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('delete-user') ?>" method="POST">
					<input type="hidden" name="id">
					<p>Apakah anda yakin ingin menghapus data ini?</p>
					<button type="submit" name="simpan" class="btn btn-success">Ya</button>
					<a href="<?php echo site_url('setting-user') ?>" class="btn btn-danger">Tidak</a>
				</form>
			</div>
		</div>
	</div>	
</div>

