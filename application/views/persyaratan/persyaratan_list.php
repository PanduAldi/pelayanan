<div class="row">
	<div class="col-lg-8">
		<div class="box box-default box-solid">
			<div class="box-header">
				<strong>Data Pelayanan</strong>
			</div>
			<div class="box-body">
				<div>
					<table class="table table-bordered table-striped" id="datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Pelayanan</th>
								<th>Persyaratan</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($jenis_pelayanan as $row): ?>			
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo strtoupper($row['jenis_name']) ?></td>
								<td>
									<div class="syarat-<?php echo $row['jenis_id'] ?>">
										<?php 
										$data = $this->persyaratan_model->get(array('select' => "*", 'jenis' => $row['jenis_id']));
										if (empty($data)): ?>
											<?php echo "Belum Input Persyaratan"; ?>
										<?php else: ?>
											<ul>									
											<?php 
												foreach ($data as $d): ?>
												<li class="list-<?php echo $d['persyaratan_id'] ?>"><?php echo $d['persyaratan_name'] ?> <span>(<a href="javascript:void(0)" onclick="del_syarat(<?php echo $d['persyaratan_id'].",".$d['jenis_id'] ?>)">Hapus</a>)</span></li>
											<?php endforeach ?>
											</ul>											
										<?php endif ?>	
									</div>
									<input type="text" class="form-control" id="persyaratan_name_<?php echo $row['jenis_id'] ?>" placeholder="Input Persyaratan">
									<button type="button" id="add_syarat_<?php echo $row['jenis_id'] ?>" class="btn btn-primary">Tambah</button>
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
					<dt>Setting Persyaratan</dt>
					<dd>Digunakan untuk mengelola data jenis pelayanan</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

<script>
	//tambah persyaratan
	<?php 
		foreach($jenis_pelayanan as $row)
		{
			?>
			$(function(){
				$('#add_syarat_<?php echo $row['jenis_id'] ?>').click(function(){

					var syarat = $("#persyaratan_name_<?php echo $row['jenis_id'] ?>").val();
					var jenis_id = <?php echo $row['jenis_id'] ?>;

					if(syarat == "")
					{
						$("#persyaratan_name_<?php echo $row['jenis_id'] ?>").notify("Tidak Boleh Kosong",{ elementPosition : 'bottom center', className:'error'});
					} 
					else
					{
						$.ajax({
							url : "<?php echo site_url("add-syarat") ?>",
							type : "POST",
							data : {  
									  syarat : syarat,
									  jenis_id : jenis_id
								   },
							//dataType : 'JSON',
							success : function(msg){
					            $.notify('Tambah persyaratan Berhasil', {
					               'className' : 'success',
					               'globalPosition' : "top center"
					                
					            });
								$(".syarat-<?php echo $row['jenis_id'] ?>").html(msg);
								
								$("#persyaratan_name_<?php echo $row['jenis_id'] ?>").val("");
								$("#persyaratan_name_<?php echo $row['jenis_id'] ?>").focus();
								/** PR dirumah :p 
								var d = "<ul>";
								$.each(msg, function(index, el) {
									d = '<li>'+el.persyaratan_name+'</li>';
								});
								d = "</ul>";

								$(".syarat-<?php echo $row['jenis_id'] ?>").html(d);
								*/
							}
						})						
					}

				});
			})
			<?php
		} 
	
	?>
</script>
<script>
	function del_syarat(id, jenis)
	{
		$.ajax({
			url : "<?php echo site_url('delete-syarat') ?>",
			type : "POST",
			data : { id : id, jenis : jenis },
			success : function(msg)
			{
	            $.notify('Hapus persyaratan berhasil', {
	               'className' : 'error',
	               'globalPosition' : "top center"
	                
	            });
				$(".syarat-"+jenis).html(msg);
			}
		})
	}
</script>