




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
<div  class="row">
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
								<th>ID Kesehatan</th>
								<th>Nama</th>
								<th>Rawat Jalan</th>
								<th>Rawat Inap</th>
								<th>Tempat Berobat</th>
								<th>Penyakit</th>
								<th>Tanggal Berobat</th>
								<th>Total</th>
								<th>Tanggal Masuk</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from data_kesehatan_pegawai where input_ke = $_GET[input_ke] and status = 'Aktif' limit 10";
								$hasil = mysqli_query($konek, $sql);
								
								$i=1;
								while($data = mysqli_fetch_assoc($hasil)) {
									
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$data[Input_Ke]</td>
										<td>$data[ID_Kesehatan]</td>
										<td>$data[Nama]</td>
										<td>$data[Rawat_Jalan]</td>
										<td>$data[Rawat_Inap]</td>
										<td>$data[Tempat_Berobat]</td>
										<td>$data[Penyakit]</td>
										<td>$data[Tanggal_Berobat]</td>
										<td>$data[Total]</td>
										<td>$data[Tanggal_Input]</td>
										<td><a href='$url_ubah_data_kesehatan_detail_form&&id=$data[ID_Data_Kesehatan_Pegawai]'><p class='fa fa-edit'> Ubah </p></a></td>
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