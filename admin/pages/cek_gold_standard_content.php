




<style>
	textarea {resize:none;}
</style>


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
						<div class="form-group">
							<?php
								if(!empty($_GET['pesan_2'])) {
									if(strpos($_GET['pesan_2'], 'berhasil')) $style = "style='color:blue;'";
									else $style = "style='color:red;'";
									
									echo "<label $style>$_GET[pesan_2]</label>";
								}
								
							
							?>
						</div>
						<thead>
							<tr>
								<th>No</th>
								<th>Penyakit</th>
								<th style='width:130px'>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$nama_dkp = array();
								$sql = "select distinct(nama) 'nama' from data_kesehatan_pegawai order by nama asc";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$nama_dkp[] = strtolower($data['nama']);
								}

								
								$nama_gs = array();
								$sql = "select distinct(nama) 'nama' from gold_standard order by nama asc";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$nama_gs[] = strtolower($data['nama']);
								}
								
								
								$klausa = array();
								foreach($nama_dkp as $key=>$nd) {
									if(!in_array($nd, $nama_gs)) {
										//echo "$nd <br>";
										$klausa[] = $nd;										
									}
									else {
										unset($nama_dkp[$key]);										
									}
								}
								
								sort($klausa);
								
								
								
								
								$i=1;
								foreach($klausa as $k) {
									$sql = "select * from data_kesehatan_pegawai where nama = '$k'";
									$hasil = mysqli_query($konek, $sql);
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$k</td>										
									";
									?>
										<td>
											<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">
												Tentukan Class
											</button>
										</td>
									</tr>
									
									
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Tentukan Class untuk Pegawai : <?php echo $k; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='masukkan_tindakan_preventif_proses_content.php'>
														<label>Class</label>
														<label>:</label>
														<label>															
															<select name='class' required>
																<?php
																	for($i2=0; $i2<=4; $i2++) {
																		echo "<option value='$i2'>$i2</option>";
																	}
																?>
															</select>
															<input type='hidden' name='nama' value='<?php echo $k; ?>' >
														</label>
														<br>
														<label>Kelompok</label>
														<label>:</label>
														<label>															
															<select name='kelompok' required>
																<?php
																	$kelompok = [
																		'Sangat Baik',
																		'Baik',
																		'Biasa',
																		'Buruk',
																		'Sangat Buruk'
																	];
																	
																	foreach($kelompok as $kelompok_2) {
																		echo "<option value='$kelompok_2'>$kelompok_2</option>";
																	}
																?>
															</select>
															<input type='hidden' name='penyakit' value='<?php echo $k; ?>' >
														</label>
														<br>
														<!--
														<label class="btn btn-success">
															Tambah Tindakan Preventif
														</label>
														-->
														
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<input type="submit" class="btn btn-primary" value='Save changes'>
													</form>
												</div>
											</div>
											
										</div>
										
									</div>
									
									
									<?php									
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
