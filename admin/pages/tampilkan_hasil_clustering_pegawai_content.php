




<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php
				if(!empty($_GET['submenu'])) {
					$explode = explode('_', $_GET['submenu']);
					
					$judul = '';
					for($i_explode=0; $i_explode<count($explode); $i_explode++) {
						$judul .= $explode[$i_explode];
						
						if($i_explode < count($explode)-1) $judul .= ' ';
					}
					
					echo ucwords($judul);
				}
			?>
		</h1>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Input Ke</th>
								<th>Rentang Waktu Pada Data</th>
								<th>Tanggal Masuk</th>
								<th>Jumlah Baris</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$input_ke_dkp = array();
								$sql = "select distinct(data_kesehatan_pegawai.input_ke) 'input_ke' from data_kesehatan_pegawai";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$input_ke_dkp[] = $data['input_ke'];
								}
								
								$input_ke_hc = array();
								$sql = "select distinct(input_ke) 'input_ke' from hasil_clustering_c1";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$input_ke_hc[] = $data['input_ke'];
								}
								
								
								$klausa = array();
								foreach($input_ke_dkp as $key=>$ikd) {
									if(!in_array($ikd, $input_ke_hc)) {
										unset($input_ke_dkp[$key]);										
									}
									else {
										$klausa[] = $ikd;										
									}
								}
								
								sort($klausa);
								
								if(count($klausa) > 0) {
									$i=1;
									foreach($klausa as $k) {
										$sql2 = "select distinct(Tanggal_Input) 'Tanggal_Input' from data_kesehatan_pegawai where input_ke = $k";
										$hasil2 = mysqli_query($konek, $sql2);
										$data2 = mysqli_fetch_assoc($hasil2);
										
										$sql3 = "select max(Tanggal_Berobat) 'max', min(Tanggal_Berobat) 'min' from data_kesehatan_pegawai where input_ke = $k";
										$hasil3 = mysqli_query($konek, $sql3);
										$data3 = mysqli_fetch_assoc($hasil3);
										
										$sql4 = "select count(*) 'jumlah_baris' from data_kesehatan_pegawai where input_ke = $k";
										$hasil4 = mysqli_query($konek, $sql4);
										$data4 = mysqli_fetch_assoc($hasil4);									
										$jumlah_baris = $data4['jumlah_baris'];
										
										echo "
										<tr class='odd gradeX'>
											<td>$i</td>
											<td>$k</td>
											<td>$data3[min] sampai $data3[max]</td>
											<td>$data2[Tanggal_Input]</td>
											<td>$jumlah_baris</td>
											<td><a href='$url_tampilkan_hasil_clustering_pegawai_detail&&input_ke=$k'><p class='fa fa-expand '> Tampilkan secara detail </p></a></td>
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
		$('#dataTables-example').DataTable({
				responsive: true
		});
	});	
</script>