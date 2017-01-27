<div class="box box-info">
	<div class="box-body">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" nama="proses" class="active">
					<a href="#home" onclick="skpwni_proses()" aria-controls="home" role="tab" data-toggle="tab">SKPWNI Dalam Proses</a>
				</li>
				<li role="presentation" nama="selesai">
					<a href="#tab" aria-controls="tab" onclick="skpwni_selesai()" role="tab" data-toggle="tab">SKPWNI Selesai</a>
				</li>
				<li role="presentation" nama="ambil">
					<a href="#ambil" aria-controls="tab" role="tab" onclick="skpwni_ambil()" data-toggle="tab">SKPWNI diAmbil</a>
				</li>
			</ul>
		
			<!-- Tab panes -->
			<div class="tab-content">
				
				<!-- Tabel SKPWNI proses -->
				<div role="tabpanel" class="tab-pane active" id="home">
					<br>
					<blockquote>
						<p>Menampilkan data permohonan warga dalam pelayanan Surat Pindah yang masih dalam proses</p>
					</blockquote>
					<div class="table-responsive">
						<table class="table table-striped table-bordered tabel" id="tabel-proses">
							<thead>
								<tr>
									<th>No</th>
									<th>Nomor Permohonan</th>
									<th>Pemohon</th>
									<th>Tanggal Permohonan</th>
									<th>Status</th>
									<?php if ($this->session->userdata('u_role_name') == "admin"): ?>
										<th>#</th>
									<?php endif ?>
								</tr>
							</thead>
							<tbody id="proses">
							</tbody>
						</table>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab">
					<br>
					<blockquote>
						<p>Menampilkan data permohonan warga dalam pelayanan Surat Pindah yang sudah selesai & belum diambil</p>
					</blockquote>
					<div class="table-responsive">
						<table class="table table-striped table-bordered tabel" id="tabel-selesai">
							<thead>
								<tr>
									<th>No</th>
									<th>Nomor Permohonan</th>
									<th>Pemohon</th>
									<th>Tanggal Selesai</th>
									<?php if ($this->session->userdata('u_role_name') == "admin"): ?>
										<th>#</th>
									<?php endif ?>
								</tr>
							</thead>
							<tbody id="selesai">
							</tbody>
						</table>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="ambil">
					<br>
					<blockquote>
						<p>Menampilkan data permohonan warga dalam pelayanan Surat Pindah yang sudah diambil</p>
					</blockquote>
					<div class="table-responsive">
						<table class="table table-striped table-bordered tabel" id="tabel-ambil">
							<thead>
								<tr>
									<th>No</th>
									<th>Nomor Permohonan</th>
									<th>Pemohon</th>
									<th>Tanggal Pengambilan</th>
									<?php if ($this->session->userdata('u_role_name') == "admin"): ?>
										<th>#</th>
									<?php endif ?>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		$('.tabel').dataTable();
	})
</script>

<script>
	function skpwni_proses()
	{
    	$(function(){
    		$("#selesai").html("");

    		$.ajax({
      			url : "<?php echo site_url('skpwni-proses') ?>",
      			success : function(msg)
      			{
      				$("#proses").html(msg);
      			}
      		});
    		
    	})

    	

	}


	function skpwni_selesai()
	{
		$(function(){
			$("#proses").html("");
			$.ajax({
      			url : "<?php echo site_url('skpwni-selesai') ?>",
      			success : function(msg)
      			{
      				$("#selesai").html(msg);
      			}
      		})
		})
	}

</script>