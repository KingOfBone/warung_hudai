




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

<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Input Ke</th>
								<th>Jumlah Atribut</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$input_ke_dkp = array();
								$sql = "select distinct(input_ke) 'input_ke' from data_kesehatan_pegawai";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$input_ke_dkp[] = $data['input_ke'];
								}

								
								$input_ke_ba = array();
								$sql = "select distinct(input_ke) 'input_ke' from bobot_atribut";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$input_ke_ba[] = $data['input_ke'];
								}
								
								
								$klausa = array();
								foreach($input_ke_dkp as $key=>$ikd) {
									if(!in_array($ikd, $input_ke_ba)) {
										unset($input_ke_dkp[$key]);										
									}
									else {
										$klausa[] = $ikd;										
									}
								}
								
								sort($klausa);
								
								$i=1;
								foreach($klausa as $input_ke_k) {
									$sql2 = "select distinct(Tanggal_Input) 'Tanggal_Input' from data_kesehatan_pegawai where input_ke = $input_ke_k";
									$hasil2 = mysqli_query($konek, $sql2);
									$data2 = mysqli_fetch_assoc($hasil2);
									
									$sql3 = "select max(Tanggal_Berobat) 'max', min(Tanggal_Berobat) 'min' from data_kesehatan_pegawai where input_ke = $input_ke_k";
									$hasil3 = mysqli_query($konek, $sql3);
									$data3 = mysqli_fetch_assoc($hasil3);
									
									$sql4 = "select count(*) 'jumlah' from bobot_atribut where input_ke = $input_ke_k";
									$hasil4 = mysqli_query($konek, $sql4);
									$data4 = mysqli_fetch_assoc($hasil4);
									$jumlah = $data4['jumlah'];
									
									
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$input_ke_k</td>
										<td>$jumlah</td>
										<td>
											<a href='$url_tampilkan_bobot_atribut_detail&&input_ke=$input_ke_k'><p class='fa fa-expand '> Tampilkan secara detail </p></a>
										</td>
									</tr>
									";
									
									$i++;
								}
							?>							
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
				
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
			
			
 <!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
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