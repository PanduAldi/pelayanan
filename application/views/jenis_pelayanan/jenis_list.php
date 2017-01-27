<div class="row">
	<div class="col-lg-8">
		<div class="box box-default box-solid">
			<div class="box-header">
				<strong>Data Pelayanan</strong>
			</div>
			<div class="box-body">
				<div>
					<a href="javascript:void(0)" id="add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Jenis Pelayanan</a>
				</div><br>
				<div>
					<table class="table table-bordered table-striped" id="datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Pelayanan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($data as $row): ?>			
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo strtoupper($row['jenis_name']) ?></td>
								<td>
									<a title="Edit Data" onclick="edit(<?php echo $row['jenis_id'].",'".$row['jenis_name']."'" ?>)" class="btn btn-success"><i class="fa fa-edit"></i></a>
								
									<a href="javascript:void(0)" title="Hapus Data" onclick="hapus(<?php echo $row['jenis_id'] ?>)" class="btn btn-danger hapus_data"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="box box-info box-solid">
			<div class="box-header">
				<strong>Informasi</strong>
			</div>
			<div class="box-body">
				<dl>
					<dt>Setting Jenis Pelayanan</dt>
					<dd>Digunakan untuk mengelola data jenis pelayanan</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

<!-- Simpan Data  -->
<div class="modal fade" id="form_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Tambah Jenis Pelayanan </strong>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('add-jenis') ?>" method="POST">
					<label for="">Pelayanan</label>
					<select name="pelayanan" class="form-control" required></select><br>
					<label for="" class="control-label">Nama Jenis Pelayanan : </label>
					<input type="text" class="form-control" name="nama" required><br>
					<label for="" class="control-label">URL Modul: </label>
					<input type="text" class="form-control" name="link" placeholder="Buat link tanpa spasi" required><br>
					<button type="submit" name="simpan" class="btn btn-success">Simpan Data</button>
					<a href="javascript:void(0)" data-dismiss='modal' class="btn btn-danger">Batal</a>
				</form>
			</div>
		</div>
	</div>	
</div>

<!-- Edit Data  -->
<div class="modal fade" id="form_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<strong>Edit Pelayanan </strong>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('edit-jenis') ?>" method="POST">
					<input type="hidden" name="id">
					<label for="" class="control-label">Nama Jenis Pelayanan : </label>
					<input type="text" class="form-control" name="nama" required><br>
					<label for="" class="control-label">URL Modul: </label>
					<input type="text" class="form-control" name="link" placeholder="Buat link tanpa spasi" required><br>
					<button type="submit" name="simpan" class="btn btn-warning">Edit Data</button>
					<a href="<?php echo site_url('setting-jenis_pelayanan') ?>" class="btn btn-danger">Batal</a>
				</form>
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
				<form action="<?php echo site_url('delete-jenis') ?>" method="POST">
					<input type="hidden" name="id">
					<p>Apakah anda yakin ingin menghapus data ini?</p>
					<button type="submit" name="simpan" class="btn btn-success">Ya</button>
					<a href="<?php echo site_url('setting-jenis_pelayanan') ?>" class="btn btn-danger">Tidak</a>
				</form>
			</div>
		</div>
	</div>	
</div>

<script>
	$(function(){
		$("#add").click(function(){
			$('#form_tambah').modal({
				'backdrop' : false,
				'keyboard' : false
			});

			$.ajax({
				url : "<?php echo site_url('load-pelayanan') ?>",
				success : function(c){
					$("select[name=pelayanan]").html(c);
				}
			})
		});
	})
</script>

<script>
function edit(id, nama){
	$(function(){
			$("input[name=id]").val(id);
			$("input[name=nama]").val(nama);

			$("#form_edit").modal({
				'backdrop' : false,
				'keyboard' : false
			});
	})
}
</script>