




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


<style>
	#last {
		width: 1px;
		white-space: nowrap;		
	}
</style>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Penyakit</th>
								<th>Tindakan Preventif</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from tindakan_preventif order by penyakit asc";
								$hasil = mysqli_query($konek, $sql);
								
								$i=1;
								while($data = mysqli_fetch_assoc($hasil)) {
									?>
									
									<tr class='odd gradeX'>
										<td><?php echo $i; ?></td>
										<td><?php echo $data['Penyakit']; ?></td>
										<td><?php echo $data['Tindakan_Preventif']; ?></td>
										<td id='last'>
											<a onClick="return confirm('Apakah anda yakin ingin menghapus tindakan preventif <?php echo "$data[Penyakit]"; ?> ?')" href='<?php echo $url_hapus_tindakan_preventif_proses; ?>?id_tindakan_preventif=<?php echo $data['ID_Tindakan_Preventif']; ?>'><p class='fa fa-edit'> Hapus </p></a>
										</td>
									</tr>
									
									<div class="modal fade" id="myModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Ubah Tindakan Preventif untuk Penyakit : <?php echo $data['Penyakit']; ?></h4>
												</div>
												<div class="modal-body">
													<form method='post' onSubmit="return cek_<?php echo $i; ?>()" action='ubah_tindakan_preventif_proses_content.php'>
														<label>Jenis Tindakan Preventif</label>
														<label>:</label>
														<label>
															<select name='jenis_tindakan'>
																<?php if($data['Jenis_Tindakan'] == 'Fisik') { ?>
																	<option value='Fisik' selected>Fisik</option>
																	<option value='Psikis'>Psikis</option>
																<?php } else { ?>
																	<option value='Fisik'>Fisik</option>
																	<option value='Psikis' selected >Psikis</option>
																<?php } ?>
															</select>
														</label>
														<br>
														<br>
														<label>Tindakan Preventif</label>
														<label>:</label>
														<label>
															<textarea id='textarea_<?php echo $i; ?>' rows='4' name='tindakan' required><?php echo $data['Tindakan_Preventif']; ?></textarea>
															<input type='hidden' name='id_tindakan_preventif' value='<?php echo $data['ID_Tindakan_Preventif']; ?>' >
														</label>
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