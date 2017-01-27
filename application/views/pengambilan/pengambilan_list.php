<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $title ?></title>

	<link rel="stylesheet" href="<?php echo assets_url ?>bootstrap/css/bootstrap.min.css">

    <!-- datatables -->
    <link rel="stylesheet" href="<?php echo assets_url ?>datatables/dataTables.bootstrap.css">  

	<script src="<?php echo assets_url ?>jQuery-2.1.4.min.js"></script>
	<script src="<?php echo assets_url ?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<h4>Manajemen data pengambilan </h4>
	<hr>

	<div class="container">


	<div class="tombol">
		<a href="<?php echo site_url('pengambilan/add') ?>" class="btn btn-primary">Tambah Pemohon</a> <br><br>
	</div>
	<table class="table table-hover table-bordered" id="tabel">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama Pemohon</th>
				<th>Status Permohonan</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($data_view as $k): ?>
				<tr>

					<td><?php echo $no++ ?></td>
					<td><?php echo $k->nik ?></td>
					<td><?php echo $k->nama ?></td>
					<td>
						<select id="status_<?php echo $k->pengambilan_id ?>" class="form-control" pengambilan="<?php echo $k->pengambilan_id ?>" onchange="ubah_status(this.value, '<?php echo $k->pengambilan_id ?>')" <?php echo ($k->status == 'selesai')?"disabled":null ?>>
							<?php  
								$s = array('proses' => "Masih Proses", "selesai" => "Sudah Selesai / Bisa Diambil");

								foreach ($s as $l => $a) {
									?>
									<option value="<?php echo $l ?>" <?php echo ($k->status == $l)?"selected":null ?>><?php echo $a ?></option>
									<?php
								}
							?>
						</select>
					</td>
					<td>
						<?php  
							$t = explode('-', $k->tgl_masuk);
							echo $t[2]."-".$t[1]."-".$t[0];
						?>
					</td>
					<td class="t_k_<?php echo $k->pengambilan_id ?>">
						<?php 
							if ($k->status == "selesai") {
								echo $k->tgl_keluar;
							}
							else
							{
								echo "Belum diambil";
							}
						?>
					 </td>
					 <td><?php echo $k->keterangan ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>		
	</div>

	<div class="modal fade" id="modal-fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Tambah keterangan selesai
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_pengambilan">
					<input type="hidden" id="status_pengambilan">
					<textarea name="ket" id="ket" class="form-control" cols="30" rows="5" placeholder="Sebelum menyelesaikan proses. Untuk memudahkan anda dalam mengarsipkan data Pindah / Datang. input keteranagan letak dimana dokumen tersebut disimpan. Contoh : Stopmap kuning tanggal 28-12-2016"></textarea>
					<button id="simpan_ket" class="btn btn-primary">Simpan Keterangan</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Datatable -->
    <script src="<?php echo assets_url ?>datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo assets_url ?>datatables/dataTables.bootstrap.min.js"></script>


	<script>

    	function ubah_status(v, id)
    	{
    		$(function(){
    			$("#modal-fade").modal({
    				backdrop : "static",
    				keyboard : false
    			});

    			$("#id_pengambilan").val(id);
    			$("#status_pengambilan").val(v);

    			/*

    			*/
    		})
    	}

    	$(function(){
    		$("#simpan_ket").click(function(){
	    		var id = $("#id_pengambilan").val();
	    		var v = $("#status_pengambilan").val();
				$.ajax({
					url : "<?php  echo site_url('pengambilan/ubah_status') ?>",
					type : "POST",
					data  : { v : v, id : id, ket : $("#ket").val()},
					success : function(s){
						alert("status berhasil di ubah");
						location.href = "<?php echo site_url('pengambilan') ?>";
					},
					error : function(XMLHttpRequest){
						alert(XMLHttpRequest.responseText);
					}
				})    			
    		});
    	})
	</script>


    <script>
    	$(function(){
    		$("#tabel").dataTable();


    	})	
    </script>
</body>
</html>