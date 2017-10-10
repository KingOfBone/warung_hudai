




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
								<th>Jumlah Tempat Berobat</th>
								<th>Jumlah Penyakit</th>								
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from bobot_atribut order by tipe asc";
								$hasil = mysqli_query($konek, $sql);
								
								$i=1;
								while($data = mysqli_fetch_assoc($hasil)) {
									$sql2 = "select count(tipe) 'tempat_berobat' from bobot_atribut where tipe = 'tempat berobat'";
									$hasil2 = mysqli_query($konek, $sql2);
									$data2 = mysqli_fetch_assoc($hasil2);
									$jumlah_tempat_berobat = $data2['tempat_berobat'];
									
									$sql2 = "select count(tipe) 'penyakit' from bobot_atribut where tipe = 'penyakit'";
									$hasil2 = mysqli_query($konek, $sql2);
									$data2 = mysqli_fetch_assoc($hasil2);
									$jumlah_penyakit = $data2['penyakit'];
									
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$data[Nama_Atribut]</td>
										<td>$data[Nilai]</td>
										<td>$data[Tipe]</td>
										<td><a onClick=\"return confirm('Apakah anda yakin ingin menghapus $data[Nama_Atribut] ?')\" href='$url_hapus_bobot_atribut_proses?nama_atribut=$data[Nama_Atribut]'><p class='fa fa-edit'> Hapus </p></a></td>
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