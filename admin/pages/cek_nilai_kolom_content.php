<?php
	ob_start();
	
	include '../config/config.php';
	
	$input_ke = $_POST['input_ke'];
	$rawat_inap = !empty($_POST['rawat_inap']) ? $_POST['rawat_inap'] : '';
	$rawat_jalan = !empty($_POST['rawat_jalan']) ? $_POST['rawat_jalan'] : '';
	
	
	
	$data_kosong = array();
	$bobot_atribut_penyakit = array();
	$data_kosong_jalan = $rawat_jalan;
	$data_kosong_inap = $rawat_inap;
	
	$sql = "select Nama_Atribut from bobot_atribut 
	where 
	tipe='penyakit' AND 
	input_ke = $input_ke AND
	level = 0";
	$hasil = mysqli_query($konek, $sql);
	while($data = mysqli_fetch_assoc($hasil)) {
		$data_kosong[] = $data['Nama_Atribut'];		
	}
	
	$sql = "select now() 'waktu'";
	$hasil = mysqli_query($konek, $sql);	
	$data = mysqli_fetch_assoc($hasil);
	$waktu = $data['waktu'];
	
	
	
?>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php				
				echo ucwords("Hasil dari cek nilai kolom");				
			?>
		</h1>
	</div>
</div>






<div class="row">
	<div class="col-lg-12">
		<?php
			if(
				empty($data_kosong) && 
				empty($data_kosong_jalan) && 
				empty($data_kosong_inap)
			) {
				echo "
					<button onClick=\"parent.location='$url_tampilkan_data_kesehatan'\" style='margin-bottom:30px;' type='button' class='btn btn-success'>Selesai</button>
				";
			}
			else {
				echo "
					<button onClick=\"parent.location='$url_tampilkan_bobot_atribut_bermasalah'\" style='margin-bottom:10px;' type='button' class='btn btn-success'>Beri Nilai</button>
				";
			}
		?>
		<h2 class="page-header">
			Kolom Penyakit
		</h2>
		<div class="panel panel-default">
			
			<?php
				if(!empty($data_kosong)) {
					echo "
					<div style='color:red; font-weight:bold;' class='panel-heading'>
						Terdapat Atribut yang belum diberi nilai !!!						
					</div>
					";
				}
				else {
					echo "
					<div style='color:#1e988f; font-weight:bold;' class='panel-heading'>
						Semua cell Penyakit telah memiliki nilai, silahkan cek data anda di menu Tampilkan Data Kesehatan :)
					</div>";
					
					
				}
			?>
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="tabel-cek-excel">
						<thead>
							<tr>
								<th>No</th>
								<th>Penyakit</th>
							</tr>
						</thead>
						<tbody>
							<?php								
								$i=1;
								foreach($data_kosong as $dk) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$dk</td>
									</tr>
									";
									
									$i++;
								}								
							?>							
						</tbody>
					</table>
				</div>
				
				
			</div>
			
		</div>
		
	</div>
	
</div>



<div class="row">
	<div class="col-lg-12">
		
		<h2 class="page-header">
			Kolom Rawat Jalan
		</h2>
		<div class="panel panel-default">
			
			<?php
				if(!empty($data_kosong_jalan)) {
					echo "
					<div style='color:red; font-weight:bold;' class='panel-heading'>
						Terdapat Atribut Rawat Jalan yang belum diberi nilai !!!						
					</div>
					";
				}
				else {
					echo "
					<div style='color:#1e988f; font-weight:bold;' class='panel-heading'>
						Semua cell Rawat Inap telah memiliki nilai, silahkan cek data anda di menu Tampilkan Data Kesehatan :)
					</div>";
				}
			?>
			
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="tabel-cek-excel-2">
						<thead>
							<tr>
								<th>No</th>
								<th>Rawat Jalan</th>
							</tr>
						</thead>
						<tbody>
							<?php								
								$i=1;
								if(count($data_kosong_jalan) > 1) {
									foreach($data_kosong_jalan as $dk) {
										echo "
										<tr class='odd gradeX'>
											<td>$i</td>
											<td>$dk</td>
										</tr>
										";
										
										$i++;
									}
								}
							?>							
						</tbody>
					</table>
				</div>
				
				
			</div>
			
		</div>
		
	</div>
	
</div>


<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">
			Kolom Rawat Inap
		</h2>

		<div class="panel panel-default">
			
			<?php
				if(!empty($data_kosong_inap)) {
					echo "
					<div style='color:red; font-weight:bold;' class='panel-heading'>
						Terdapat Atribut Rawat Inap yang belum diberi nilai !!!						
					</div>
					";
				}
				else {
					echo "
					<div style='color:#1e988f; font-weight:bold;' class='panel-heading'>
						Semua cell Rawat Inap telah memiliki nilai, silahkan cek data anda di menu Tampilkan Data Kesehatan :)
					</div>";
				}
			?>
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="tabel-cek-excel-3">
						<thead>
							<tr>
								<th>No</th>
								<th>Rawat Inap</th>
							</tr>
						</thead>
						<tbody>
							<?php								
								$i=1;
								if(count($data_kosong_inap) > 1) {
									foreach($data_kosong_inap as $dk) {
										echo "
										<tr class='odd gradeX'>
											<td>$i</td>
											<td>$dk</td>
										</tr>
										";
										
										$i++;
									}
								}
							?>							
						</tbody>
					</table>
				</div>
				
				
			</div>
			
		</div>
		
	</div>
	
</div>
			
			
 
<script src="../bower_components/jquery/dist/jquery.min.js"></script>


<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>


<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script src="../dist/js/sb-admin-2.js"></script>
		
<script>
	$(document).ready(function() {
		$('#tabel-cek-excel').DataTable({
				responsive: true
		});$('#tabel-cek-excel-2').DataTable({
				responsive: true
		});$('#tabel-cek-excel-3').DataTable({
				responsive: true
		});
	});	
</script>









<?php
		
	//}
	
?>