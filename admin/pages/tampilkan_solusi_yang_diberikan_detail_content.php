




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


<?php
	$input_ke = $_GET['input_ke'];
	$kualitas_kerja = [
		0=>['string'=>'Sangat Baik', 'numeric'=>0],
		1=>['string'=>'Baik', 'numeric'=>1],
		2=>['string'=>'Biasa', 'numeric'=>2],
		3=>['string'=>'Buruk', 'numeric'=>3],
		4=>['string'=>'Sangat Buruk', 'numeric'=>4]
	];
	
	$i4=0;
	foreach($kualitas_kerja as $i_kualitas_kerja=>$kk) {
	
	?>
	
	
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">
				Kelompok Kualitas Kerja <?php echo $kk['string']; ?>							
			</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div style='width:940px;' class="panel panel-default">
				
				<div style='width:900px;' class="panel-body">
					<div class="">
						<table style='width:900px;' class="table table-striped table-bordered table-hover" id="tabel-kesimpulan-<?php echo $i_kualitas_kerja; ?>">
							<thead>
								<tr id='top'>
									<td>No</td>
									<td>Kelompok</td>
									<td>Penyakit</td>
									<td>Jumlah</td>
									<td>Program Kesehatan</td>
								</tr>
							</thead>
							
							<tbody>
								<?php
									$i=1;
									$penyakit = array();
									
									
									$sql = "
										select Kelompok, hasil_penyakit.Penyakit, Jumlah from hasil_penyakit 
										inner join Tindakan_Preventif on hasil_penyakit.penyakit=Tindakan_Preventif.penyakit
										where kelompok = '$kk[string]' AND 
										input_ke = $input_ke 
										group by hasil_penyakit.Penyakit desc 										
									";
									echo "$sql <br><br>";
									$hasil = mysqli_query($konek, $sql);
									
									$jumlah = 0;
									while($data = mysqli_fetch_assoc($hasil)) {
										$jumlah += $data['Jumlah'];
										
										echo "
											<tr>
												<td>".$i."</td>
												<td>".$data['Kelompok']."</td>
												<td>".$data['Penyakit']."</td>
												<td>".$data['Jumlah']."</td>
										";
								?>
								
												<td>
													<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i4; ?>">
														Lihat Program Kesehatan <?php echo $data['Penyakit']; ?>
													</button>
												</td>
												<!-- <td>".$data['Tindakan_Preventif']."</td> -->
											</tr>
											
											
											<div class="modal fade" id="myModal_<?php echo $i4; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">Record Tindakan Preventif <?php echo $data['Penyakit']; ?></h4>
														</div>
														<div class="modal-body">
															<?php
																$sql_modal = "
																	select tindakan_preventif from tindakan_preventif
																	where penyakit = '$data[Penyakit]'
																";
																
																$hasil_modal = mysqli_query($konek, $sql_modal);
																
																$i3=1;
																
																while($data_modal = mysqli_fetch_assoc($hasil_modal)) {
																	echo "
																		<div>
																			<span>$i3</span>
																			<span>$data_modal[tindakan_preventif]</span>
																		</div>
																		<hr>
																	";
																	
																	$i3++;
																}
															?>															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>												
														</div>
													</div>
													
												</div>
												
											</div>
											
											
											
										
								<?php
										$i++;
										$i4++;
									}
								?>
			
							</tbody>
						</table>
					</div>
					
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	
	<?php
		}
	?>

	
	
 
<script src="../bower_components/jquery/dist/jquery.min.js"></script>


<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>


<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script src="../dist/js/sb-admin-2.js"></script>
		
<script>
	$(document).ready(function() {
		<?php for($i=0; $i<=$i_kualitas_kerja; $i++) { ?>
		$('#tabel-kesimpulan-<?php echo $i; ?>').DataTable({
				responsive: true
		});
		<?php } ?>
	});	
</script>


<!-- Page-Level Demo Scripts - Notifications - Use for reference -->
<script>
// tooltip demo
$('.tooltip-demo').tooltip({
	selector: "[data-toggle=tooltip]",
	container: "body"
})

// popover demo
$("[data-toggle=popover]")
	.popover()
</script>