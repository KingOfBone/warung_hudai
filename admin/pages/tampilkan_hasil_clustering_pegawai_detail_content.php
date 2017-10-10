




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
	
	
	/*
	$sql = "select distinct(Kelompok) from hasil_kesimpulan order by level_prioritas asc";
	$hasil = mysqli_query($konek, $sql);
	while($data = mysqli_fetch_assoc($hasil)) {
		$kelompok[] = $data['Kelompok'];
	}
	*/
	
	
	$kelompok = [
		'Sangat Baik',
		'Baik',
		'Biasa',
		'Buruk',
		'Sangat Buruk'
	];
	
	$i_kualitas_kerja=1;
	$database_hasil_kesimpulan = array();
	
	foreach($kelompok as $k) {
		$sql = "
			select data_kesehatan_pegawai.Nama, data_kesehatan_pegawai.Penyakit, Kelompok, Jumlah_Pegawai_Dalam_Kelompok  from hasil_kesimpulan 
			inner join data_kesehatan_pegawai
				on 
				hasil_kesimpulan.id_data_kesehatan_pegawai=data_kesehatan_pegawai.id_data_kesehatan_pegawai
			where hasil_kesimpulan.input_ke = $input_ke AND 
			kelompok = '$k' 
			order by hasil_kesimpulan.id_hasil_kesimpulan asc;
		";
		//echo "$sql <br><br>";
		$hasil = mysqli_query($konek, $sql);
		
		if(mysqli_num_rows($hasil) > 0) {
			while($data = mysqli_fetch_assoc($hasil)) {
				$database_hasil_kesimpulan[$k][] = [
					0=>$data['Nama'],
					1=>$data['Jumlah_Pegawai_Dalam_Kelompok'],
					2=>$data['Penyakit']
				];
			}
		}
		else {
			$database_hasil_kesimpulan[$k][] = [
				0=>'',
				1=>'',
				2=>''
			];
		}
	
	
	
		
		$i4=0;
		foreach($database_hasil_kesimpulan as $key=>$dhk) {
			$i=1;
			
			if($i==1) {
		?>
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">
						Kelompok Kualitas Kerja <?php echo $key; echo " (".$dhk[0][1]." Pegawai)"; ?>
					</h3>
				</div>
			</div>	
		<?php 
			}
		?>
		
		<div class="row">
			<div class="col-lg-12">
				<div style='width:940px;' class="panel panel-default">
					
					<div style='width:900px;' class="panel-body">
						<div class="">
							<table style='width:900px;' class="table table-striped table-bordered table-hover" id="tabel-kesimpulan-<?php echo $i_kualitas_kerja; ?>">
								<thead>
									<tr id='top'>
										<td>No</td>
										<!-- <td>Pegawai-ke</td> -->
										<td>Nama</td>
										<td>Penyakit</td>
									</tr>
								</thead>
								
								<tbody>
									<?php
										$nama_sebelumnya = '';
										$i=1;
										$i2=1;
										
										
										foreach($dhk as $dhk_value) {									
											if($dhk_value[0] != '') {
												$i4++;
												$strip = $nama_sebelumnya != $dhk_value[0] ? $dhk_value[0] : '----------------------------------';
												if($nama_sebelumnya != $dhk_value[0]) {
													$i2++;											
												}
												$nama_sebelumnya = $dhk_value[0];
												
												
												echo "
													<tr>
														<td>".$i."</td>
														<!-- <td>".($i2-1)."</td> -->
														<td>".$strip."</td>
												";
									?>
									
														<td>
															<button class="btn" data-toggle="modal" data-target="#myModal_<?php echo $i4; ?>">
																Lihat Semua Penyakit
															</button>
														</td>
														
														
														<!-- <td><a id='myModal_$i'>".$dhk_value[2]."</a></td> -->
													</tr>
											
											
											
									
									
										
										<div class="modal fade" id="myModal_<?php echo $i4; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Record Penyakit <?php echo $strip; ?></h4>
													</div>
													<div class="modal-body">
														<?php
															$sql = "
																select penyakit from data_kesehatan_pegawai
																where 
																nama = '$strip' AND
																input_ke = $input_ke
															";
															
															$hasil = mysqli_query($konek, $sql);
															
															$i3=1;
															while($data = mysqli_fetch_assoc($hasil)) {
																echo "
																	<div>
																		<span>$i3</span>
																		<span>$data[penyakit]</span>
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
	<?php		
			$i_kualitas_kerja++;
		}
		
		unset($database_hasil_kesimpulan);
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
		<?php for($i=1; $i<=$i_kualitas_kerja; $i++) { ?>
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