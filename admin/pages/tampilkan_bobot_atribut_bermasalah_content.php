




<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php
				if(!empty($_GET['submenu'])) {
					echo ucwords("tampilkan Bobot atribut bermasalah");
				}
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



<!-- /.row -->
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
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
								<th>Nama Atribut</th>
								<th style='width:130px'>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "
									select id_bobot_nilai_data_kesehatan, Nama_Atribut 
									from bobot_atribut 
									inner join data_kesehatan_pegawai on 
										bobot_atribut.input_ke=bobot_atribut.input_ke AND
										bobot_atribut.nama_atribut=data_kesehatan_pegawai.penyakit
									inner join konversi_data_kesehatan on 
										data_kesehatan_pegawai.id_data_kesehatan_pegawai=konversi_data_kesehatan.id_data_kesehatan_pegawai
									where 
										bobot_atribut.level = 0 or 
										bobot_penyakit = 0
									group by nama_atribut
								";
								$hasil = mysqli_query($konek, $sql);
								$i=1;
								while($data = mysqli_fetch_assoc($hasil)) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$data[Nama_Atribut]</td>										
									";
									?>
										<td>
											<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">
												Tentukan Nilai Bobot Atribut
											</button>
										</td>
									</tr>
									
									<!-- Modal -->
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Tentukan Nilai untuk Penyakit : <?php echo $data['Nama_Atribut']; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='masukkan_nilai_bobot_atribut_bermasalah_proses_content.php'>
														<label>Nilai</label>
														<label>:</label>
														<label>
															<input type='hidden' name='nama_atribut' value='<?php echo $data['Nama_Atribut']; ?>' >
															<input type='hidden' name='id_bobot_nilai_data_kesehatan' value='<?php echo $data['id_bobot_nilai_data_kesehatan']; ?>' >
															<select name='nilai'>
																<option value='10'>10</option>
																<option value='20'>20</option>
																<option value='30'>30</option>
															</select>
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
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									
									
									<?php									
									$i++;
								}
								
								
								
								
								$sql = "
									select id_bobot_nilai_data_kesehatan, 
									data_kesehatan_pegawai.id_data_kesehatan_pegawai,
									if(
										rawat_jalan != 'ya' AND 
										rawat_jalan != 'tidak', 
										rawat_jalan, 
										''
									) as 'rawat_jalan',
									if(
										rawat_inap != 'ya' AND 
										rawat_inap != 'tidak', 
										rawat_inap, 
										''
									) as 'rawat_inap'
									from data_kesehatan_pegawai inner join konversi_data_kesehatan on 
										data_kesehatan_pegawai.id_data_kesehatan_pegawai=konversi_data_kesehatan.id_data_kesehatan_pegawai									
									where 
									rawat_jalan != 'ya' AND 
									rawat_jalan != 'tidak' OR
									rawat_inap != 'ya' AND 
									rawat_inap != 'tidak'
									group by rawat_jalan, rawat_inap
								";
								
								$hasil = mysqli_query($konek, $sql);
								
								$data_kosong_jalan = array();
								$data_kosong_inap = array();
								
								while($data = mysqli_fetch_assoc($hasil)) {
									if($data['rawat_jalan'] != '') {
										$data_kosong_jalan[] = [
											$data['id_data_kesehatan_pegawai'], 
											$data['id_bobot_nilai_data_kesehatan'], 
											$data['rawat_jalan'] 
										];
									}
									
									if($data['rawat_inap'] != '') {
										$data_kosong_inap[] = [
											$data['id_data_kesehatan_pegawai'], 
											$data['id_bobot_nilai_data_kesehatan'], 
											$data['rawat_inap']
										];
									}
								}
								
								
								foreach($data_kosong_jalan as $value) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$value[2]</td>										
									";
									?>
										<td>
											<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">
												Tentukan Nilai Bobot Atribut
											</button>
										</td>
									</tr>
									
									<!-- Modal -->
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Tentukan Nilai untuk Atribut : <?php echo $value[2]; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='masukkan_nilai_jalan_inap_bermasalah_proses_content.php'>
														<label>Nilai</label>
														<label>:</label>
														<label>
															<input type='hidden' name='kolom' value='Rawat_Jalan' >
															<input type='hidden' name='nama_atribut' value='<?php echo $value[2]; ?>' >
															<input type='hidden' name='id_data_kesehatan_pegawai' value='<?php echo $value[0]; ?>' >
															<input type='hidden' name='id_bobot_nilai_data_kesehatan' value='<?php echo $value[1]; ?>' >
															<select name='nilai'>
																<option value='10'>10</option>
																<option value='20'>20</option>
															</select>
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
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									
									
									<?php									
									$i++;
								}
								
								
								foreach($data_kosong_inap as $value) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$value[2]</td>										
									";
									?>
										<td>
											<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">
												Tentukan Nilai Bobot Atribut
											</button>
										</td>
									</tr>
									
									<!-- Modal -->
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Tentukan Nilai untuk Penyakit : <?php echo $value[2]; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='masukkan_nilai_jalan_inap_bermasalah_proses_content.php'>
														<label>Nilai</label>
														<label>:</label>
														<label>
															<input type='hidden' name='kolom' value='Rawat_Inap' >
															<input type='hidden' name='nama_atribut' value='<?php echo $value[2]; ?>' >
															<input type='hidden' name='id_data_kesehatan_pegawai' value='<?php echo $value[0]; ?>' >
															<input type='hidden' name='id_bobot_nilai_data_kesehatan' value='<?php echo $value[1]; ?>' >
															<select name='nilai'>
																<option value='10'>10</option>
																<option value='20'>20</option>
															</select>
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
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									
									
									<?php									
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
