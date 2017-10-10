




<style>
	textarea {resize:none;}
</style>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php
				echo ucwords("Masukkan Tindakan Preventif");
			?>
		</h1>
	</div>
</div>


<!--
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form enctype='multipart/form-data' role="form" method='post' action='<?php echo $url_masukkan_data_kesehatan_utk_nilai_bobot_proses ?>'>
							<div class="form-group">
								<?php
									if(!empty($_GET['pesan'])) {
										if(strpos($_GET['pesan'], 'berhasil')) $style = "style='color:blue;'";
										else $style = "style='color:red;'";
										
										echo "<label $style>$_GET[pesan]</label>";
									}
									
								
								?>
							</div>
							<div class="form-group">
								<label>Masukkan file data tindakan preventif berupa excel</label>
								<input type="file" name='data_kesehatan'>
							</div>
							
							<button type="submit" class="btn btn-primary">Masukkan</button>
						</form>
					</div>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>
-->




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
								$sql = "select * from tindakan_preventif";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$database_tindakan_preventif[] = [
										'ID_Tindakan_Preventif'=>$data['ID_Tindakan_Preventif'], 
										'Tindakan_Preventif'=>$data['Tindakan_Preventif'] 
									];
								}
								
								//var_dump($database_tindakan_preventif);
								
								
								$data_kesehatan_pegawai = array();
								$sql = "select distinct(penyakit) 'penyakit' from data_kesehatan_pegawai order by penyakit asc";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$data_kesehatan_pegawai[] = $data['penyakit'];
								}
								
								$tindakan_preventif = array();
								$sql = "select penyakit from tindakan_preventif";
								$hasil = mysqli_query($konek, $sql);
								while($data = mysqli_fetch_assoc($hasil)) {
									$tindakan_preventif[] = $data['penyakit'];
								}
								
								//var_dump($tindakan_preventif);
								
								$penyakit_belum_ditindak = array();
								foreach($data_kesehatan_pegawai as $dkp) {
									if(!in_array($dkp, $tindakan_preventif)) {
										$penyakit_belum_ditindak[] = $dkp;
										//echo "$dkp <br>";
									}
								}
								
								$i=1;
								foreach($penyakit_belum_ditindak as $pbd) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$pbd</td>										
									";
									?>
										<td>
											<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">
												Tentukan Tindakan Preventif
											</button>
										</td>
									</tr>
									
									
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Tentukan Tindakan Preventif untuk Penyakit : <?php echo $pbd; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='masukkan_tindakan_preventif_proses_content.php'>
														<label>Tindakan Preventif</label>
														<label>:</label>
														<label>
															<textarea id='textarea_<?php echo $i; ?>' rows='4' name='tindakan' required></textarea>
															<input type='hidden' name='penyakit' value='<?php echo $pbd; ?>' >
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
