




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
					<?php
						if(!empty($_GET['pesan'])) {
							if(strpos($_GET['pesan'], 'berhasil')) $style = "style='color:blue;'";
							else $style = "style='color:red;'";
							
							echo "<label $style>$_GET[pesan]</label>";
						}
					?>
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Telp</th>
								<th>Tindakan</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from user where hak_akses != 'Admin'";
								$hasil = mysqli_query($konek, $sql);
								
								$i=1;
								while($data = mysqli_fetch_assoc($hasil)) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$data[Nama]</td>
										<td>$data[Jabatan]</td>
										<td>$data[Telp]</td>
										<td><a href='$url_ubah_user_form&&id=$data[ID_User]'><p class='fa fa-edit'> Ubah </p></a></td>
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