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
	<h4>Input data pengambilan / proses pindah datang  </h4>
	<hr>

	<div class="container">
		<div class="col-md-4">
			<form action="" method="post">
				<label for="">NIK</label>
				<input type="text" maxlength="16" class="form-control" name="nik" required=""><br>
				<label for="" class="control-label">Nama</label>
				<input type="text" class="form-control" name="nama" required><br>
				<label for="" class="control-label">Status Permohonan</label>
				<select name="status" class="form-control" id="" required> 
					<option value="">-- Pilih Status Permohonan --</option>
					<option value="proses">Sedang di Proses</option>
					<option value="selesai">Sudah selesai</option>
				</select><br>
				<label for="" class="control-label">Tanggal Masuk</label>
				<input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control" data-inputmask="'alias' : 'dd-mm-yyyy'" required><br>
				<label for="" class="control-label">Keterangan</label>
				<textarea name="ket" id="" cols="30" class="form-control" rows="5" placeholder="Berikan Keterangan untuk memudahkan anda mencari data Pindah Datang pada Stopmap"></textarea><br>
				<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
				<a href="<?php echo site_url('pengambilan') ?>" class="btn btn-primary">Kembali / Batal</a>
			</form>			
		</div>
	</div>

    <!-- Datatable -->
    <script src="<?php echo assets_url ?>datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo assets_url ?>datatables/dataTables.bootstrap.min.js"></script>  

	<!-- InputMask -->
    <script src="<?php echo assets_url ?>adminlte/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo assets_url ?>adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo assets_url ?>adminlte/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

    <script>
    	$(function(){
    		$("#tabel").dataTable();
    		
    		$("input[name=nik]").focus();
    	})	
    </script>

	<script>
		$(function(){
			$("#tgl_masuk").inputmask("dd-mm-yyyy", {"placeholder" : "dd-mm-yyyy"});	
		})
	</script>

</body>
</html>