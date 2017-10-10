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
				<div class="row">
					<div class="col-lg-6">
						<form role="form" method='post' action='ubah_user_form_content_proses.php'>
							<div class="form-group">
								<?php
									if(!empty($_GET['pesan'])) {
										if(strpos($_GET['pesan'], 'berhasil')) $style = "style='color:blue;'";
										else $style = "style='color:red;'";
										
										echo "<label $style>$_GET[pesan]</label>";
									}
									
									$sql = "select * from data_kesehatan_pegawai where id_data_kesehatan_pegawai = $_GET[id]";
									$hasil = mysqli_query($konek, $sql);
									
									
									if(mysqli_num_rows($hasil) == 0) {
										
										header("location:$url_ubah_data_kesehatan_detail&&pesan=ID User tidak ada");
										die();
										/*
										echo "
											<script>
												location.href='$url_ubah_user&&pesan=ID User tidak ada'
											</script>
										";
										*/
									}
									
									$data = mysqli_fetch_assoc($hasil);
								?>
								
								
								
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input name='nama' class="form-control" placeholder="Masukkan Nama " value='<?php echo $data['Nama']; ?>'>
							</div>
							<div class="form-group">
								<label>Rawat Jalan</label>
								<?php
									$checked_rawat_jalan_1 = $data['Rawat_Jalan'] == "ya" ? "checked" : '';
									$checked_rawat_jalan_2 = $data['Rawat_Jalan'] == "tidak" ? "checked" : '';
								?>
								<div class="radio">
									<label>
										<input type="radio" name="rawat_jalan" id="optionsRadios1" value="ya" <?php echo $checked_rawat_jalan_1; ?> >ya
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="rawat_jalan" id="optionsRadios1" value="tidak" <?php echo $checked_rawat_jalan_2; ?> >tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Rawat Inap</label>
								<?php
									$checked_rawat_inap_1 = $data['Rawat_Inap'] == "ya" ? "checked" : '';
									$checked_rawat_inap_2 = $data['Rawat_Inap'] == "tidak" ? "checked" : '';
								?>
								<div class="radio">
									<label>
										<input type="radio" name="rawat_inap" id="optionsRadios1" value="ya" <?php echo $checked_rawat_inap_1; ?> >ya
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="rawat_inap" id="optionsRadios1" value="tidak" <?php echo $checked_rawat_inap_2; ?> >tidak
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Tempat Berobat</label>
								<input name='tempat_berobat' class="form-control" placeholder="Masukkan Tempat Berobat " value='<?php echo $data['Tempat_Berobat']; ?>'>
							</div>
							<div class="form-group">
								<label>Penyakit</label>
								<input name='penyakit' class="form-control" placeholder="Masukkan Penyakit " value='<?php echo $data['Penyakit']; ?>'>
							</div>
							<div class="form-group">
								<label>Tanggal Berobat</label>
								<input name='tanggal_berobat' class="form-control" placeholder="Masukkan Tanggal Berobat " value='<?php echo $data['Tanggal_Berobat']; ?>'>
							</div>
							<div class="form-group">
								<label>Total</label>
								<input name='total' class="form-control" placeholder="Masukkan Total " value='<?php echo $data['Total']; ?>'>
							</div>
							
							
							<input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'>
							<button name='tombol' value='Ubah' type="submit" class="btn btn-primary">Ubah</button>
							<button name='tombol' value='Kembali' class="btn btn-danger">Kembali</button>
						</form>
					</div>
					<!-- /.col-lg-6 (nested) -->
					
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
    
	
