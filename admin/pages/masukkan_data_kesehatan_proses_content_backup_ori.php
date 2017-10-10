<?php
	ob_start();
	set_include_path(get_include_path() . PATH_SEPARATOR . '../config/PHPExcel/Classes/');
	
	include '../config/PHPExcel/Classes/PHPExcel/IOFactory.php';
	include '../config/config.php';
	
	$sql = "select * from data_kesehatan_pegawai";
	$hasil = mysqli_query($konek, $sql);
	
	if(mysqli_num_rows($hasil) == 0) $input_ke_data_kesehatan_pegawai = 1;
	else {
		$data = mysqli_fetch_assoc($hasil);
		$input_ke_data_kesehatan_pegawai = $data['Input_Ke'] + 1;
	}
	
	
	
	
	$sql = "select * from bobot_atribut";
	$hasil = mysqli_query($konek, $sql);
	
	if(mysqli_num_rows($hasil) == 0) $input_ke_bobot_atribut = 1;
	else {
		$data = mysqli_fetch_assoc($hasil);
		$input_ke_bobot_atribut = $data['Input_Ke'] + 1;
	}
	
	
	$sql = "select * from konversi_data_kesehatan";
	$hasil = mysqli_query($konek, $sql);
	
	if(mysqli_num_rows($hasil) == 0) $input_ke_konversi_data_kesehatan = 1;
	else {
		$data = mysqli_fetch_assoc($hasil);
		$input_ke_konversi_data_kesehatan = $data['Input_Ke'] + 1;
	}
	
	
	
	$sql = "select now() 'waktu'";
	$hasil = mysqli_query($konek, $sql);	
	$data = mysqli_fetch_assoc($hasil);
	$waktu = $data['waktu'];
	
	
	
	$inputFileName = "". $_FILES["data_kesehatan"]["tmp_name"] ."";
	$inputFileName2 = "". $_FILES["data_kesehatan"]["name"] ."";
	$_SESSION['File_Name'] = $inputFileName2;
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);		
	
	$objWorksheet = $objPHPExcel->setActiveSheetIndex();
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();
	$highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumn);
	
	
	$cell_baris = '';
	$cell_kolom = '';
	$cell_tempat_berobat = array();
	$cell_penyakit = array();
	
	
	
	for($i_highestRow=0; $i_highestRow<=$highestRow; $i_highestRow++) {
		for($i_highestColumn=0; $i_highestColumn<$highestColumn; $i_highestColumn++) {
			if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == "ID_Kesehatan") {
				$cell_baris = $i_highestRow+1;
				$cell_kolom = $i_highestColumn;
				//die();
			}
			
			if(!empty($cell_baris)) {
				if($cell_baris-1 == $i_highestRow) {
					if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == "Tempat_Berobat") {
						$cell_tempat_berobat = [0=>($i_highestRow+1), 1=>$i_highestColumn];
					}
					
					if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == "Penyakit") {
						$cell_penyakit = [0=>($i_highestRow+1), 1=>$i_highestColumn];
					}
				}
			}
		}
	}
	
	if($cell_baris == '' || $cell_kolom == '') {
		//header("location:jj?pesan=data_error");
		//die();
	}
	
	
	
	$data_kosong = array();
	
	$konci_insert = true;
	$konci_insert = false;
	
	$konci_tampil_sql = false;
	$konci_tampil_sql = true;
	
	for($i_highestRow=$cell_baris; $i_highestRow<=$highestRow; $i_highestRow++) {
		$data_excel = '';
		for($i_highestColumn=$cell_kolom; $i_highestColumn<$highestColumn; $i_highestColumn++) {
			
			if($i_highestColumn == $cell_kolom+6) {
				$baca_tanggal = $objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue();
				$data_excel .= "'".date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($baca_tanggal))."'"; 
				//$data_excel .= "'".PHPExcel_Style_NumberFormat::toFormattedString($baca_tanggal, 'YYYY-MM-DD')."'";
			}
			else
				$data_excel .= "'".$objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue()."'";
			
			if($i_highestColumn<$highestColumn-1) 
				$data_excel .= ", ";
			
			if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == '') {
				$nama_kolom = $objWorksheet->getCellByColumnAndRow($i_highestColumn, $cell_baris-1)->getValue();
				
				if($nama_kolom != 'Tanggal_Berobat' && $nama_kolom != 'Total')
					$data_kosong[] = ['baris'=>$i_highestRow, 'kolom'=>"$nama_kolom"];
			}
		}
		
		$sql_array[] = "insert into data_kesehatan_pegawai values ('', $input_ke_data_kesehatan_pegawai, $data_excel, '$waktu')";
		//echo "$sql <br>";
	}
	
	
	
	/*
	if(empty($data_kosong)) {
		if($_GET['menu'] == 'clustering_pegawai') {
			header("location:$url_tampilkan_data_kesehatan");
			die();
		}
		else {
			header("location:$url_pnb_tampilkan_data_kesehatan");
			die();
		}
	}
	else {
	*/
?>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php				
				echo ucwords("Hasil dari pemeriksaan cell yang kosong pada file excel");				
			?>
		</h1>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<?php
			if(empty($data_kosong)) {
				for($i_highestRow=$cell_penyakit[0]; $i_highestRow<=$highestRow; $i_highestRow++) {
					$penyakit_database[] = $objWorksheet->getCellByColumnAndRow($cell_penyakit[1], $i_highestRow)->getValue();				
				}
				
				$penyakit_database = array_unique($penyakit_database);
				$penyakit_database = array_values($penyakit_database);
				//var_dump($penyakit_database);
				
				echo "
					<form method='post' action='$url_cek_nilai_kolom'>
						<input type='submit' style='margin-bottom:30px;' type='button' class='btn btn-success' value='Lanjutkan ke Cek Nilai Kolom' />
				";
				
				foreach($penyakit_database as $pd) {
					echo "
						<input type='hidden' name='penyakit[]' value='$pd'>
					";
				}
				
				
				echo "
					</form>
				";
			}
		?>
		<div class="panel panel-default">
			
			<?php
				if(!empty($data_kosong)) {
					echo "
					<div style='color:red; font-weight:bold;' class='panel-heading'>
						Terdapat data yang kosong, Tidak bisa melanjutkan ke tahap berikutnya !!!
					</div>";
				}
				else {
					echo "
					<div style='color:#1e988f; font-weight:bold;' class='panel-heading'>
						Semua cell terisi, silahkan anda lanjutkan ke Cek Nilai Kolom
					</div>";
					
					/*
					$urutan_tempat_berobat = [
						2=>"medical cent",
						3=>"dr",
						4=>[0=>"apotik", 1=>"apotek"],
						5=>[0=>"rs", 1=>"rumah sakit"]
					];
					*/
					
					$urutan_tempat_berobat = [
						0=>['nama'=>"rs", 'level'=>5],
						1=>['nama'=>"rs.", 'level'=>5],
						2=>['nama'=>"rumah sakit", 'level'=>5],
						3=>['nama'=>"hospital", 'level'=>5],
						4=>['nama'=>"apotik", 'level'=>4],
						5=>['nama'=>"apotek", 'level'=>4],
						6=>['nama'=>"dr", 'level'=>3],
						7=>['nama'=>"medical cent", 'level'=>2],
						8=>['nama'=>"medical centre", 'level'=>2]
					];
					
					
					
					$sql_cek_bobot = "select * from bobot_atribut";
					$hasil_cek_bobot = mysqli_query($konek, $sql_cek_bobot);
					
					$urutan_penyakit = array();
					$urutan_penyakit_nama = array();
					
					if(mysqli_num_rows($hasil_cek_bobot) > 0) {
						for($i=3; $i>=1; $i--) {
							$urutan_penyakit_2 = array();
							
							$sql_cek_bobot2 = "select * from bobot_atribut where tipe = 'Penyakit' and level = $i";
							$hasil_cek_bobot2 = mysqli_query($konek, $sql_cek_bobot2);
							
							while($data2 = mysqli_fetch_assoc($hasil_cek_bobot2)) {
								//echo "$i - $sql_cek_bobot2 <br>";\
								$nama_atribut = strtolower($data2['Nama_Atribut']);
								$urutan_penyakit_2[] = ["nama"=>"$nama_atribut", "level"=>$data2['Level']];
								$urutan_penyakit_nama[] = "$nama_atribut";
							}
							
							$urutan_penyakit[] = $urutan_penyakit_2;
						}
					}
					if(mysqli_num_rows($hasil_cek_bobot) < 1) {
						$urutan_penyakit = [
							0=>[
								0=>['nama'=>"ACUTE OTITIS EXTERNA", 'level'=>3],
								1=>['nama'=>"KISTA", 'level'=>3],
								2=>['nama'=>"KRISIS HIPERTENSI", 'level'=>3],
								3=>['nama'=>"SYARAF", 'level'=>3],
								4=>['nama'=>"VERTIGO", 'level'=>3]
							],
							1=>[
								0=>['nama'=>"ANEMIA", 'level'=>2],
								1=>['nama'=>"ASAM URAT", 'level'=>2],
								2=>['nama'=>"BRONCHITIS", 'level'=>2],
								3=>['nama'=>"CAMPAK", 'level'=>2],
								4=>['nama'=>"CIKUNGUNYA", 'level'=>2],
								5=>['nama'=>"DEMAM BERDARAH", 'level'=>2],
								6=>['nama'=>"DEMAM,MUAL DAN MUNTAH", 'level'=>2],
								7=>['nama'=>"DESENTRI", 'level'=>2],
								8=>['nama'=>"DIABETES MELITUS", 'level'=>2],
								9=>['nama'=>"DIARE", 'level'=>2],
								10=>['nama'=>"DYSMENORRHOEA", 'level'=>2],
								11=>['nama'=>"FLEK", 'level'=>2],
								12=>['nama'=>"GEJALA KENCING BATU", 'level'=>2],
								13=>['nama'=>"HEPATITIS B", 'level'=>2],
								14=>['nama'=>"HIPERTENSI", 'level'=>2],
								15=>['nama'=>"INFEKSI TELINGA", 'level'=>2],
								16=>['nama'=>"ISK", 'level'=>2],
								17=>['nama'=>"ISPA", 'level'=>2],
								18=>['nama'=>"KATARAK", 'level'=>2],
								19=>['nama'=>"KOLESTEROL", 'level'=>2],
								20=>['nama'=>"PENYAKIT KULIT DAN KELAMIN", 'level'=>2],
								21=>['nama'=>"PERIKSA MATA", 'level'=>2],
								22=>['nama'=>"POLIO", 'level'=>2],
								23=>['nama'=>"RHINITIS", 'level'=>2],
								24=>['nama'=>"TBC", 'level'=>2],
								25=>['nama'=>"TELINGA", 'level'=>2],
								26=>['nama'=>"THT", 'level'=>2],
								27=>['nama'=>"TYPUS", 'level'=>2],
								28=>['nama'=>"RHINOPHARINGITIS", 'level'=>2]
							]
						];
						
						
						
						foreach($urutan_penyakit as $key1=>$up) {
							foreach($up as $key2=>$up_value) {
								$nama = strtolower($up_value['nama']);
								$urutan_penyakit[$key1][$key2]['nama'] = $nama;
								
								/*
								if($nama == strtolower('DYSMENORRHOEA')) {
									echo "| urutan_penyakit[$key1][$key2]['nama'] |";
								}
								*/
							}
						}
					}
					
					/*
					echo "<br><br>urutan_penyakit=";
					var_dump($urutan_penyakit);
					echo "<br><br>urutan_penyakit[0]=";
					var_dump($urutan_penyakit[0]);
					echo "<br><br>urutan_penyakit[1]=";
					var_dump($urutan_penyakit[1]);
					
					
					
					//var_dump(array_keys($urutan_penyakit)); die();
					//var_dump($urutan_penyakit); die();
					
					
					//echo 'strpos = '.strpos(strtolower("RS.AISYIYAH"), "rs");die();
					//echo 'strpos = '.strpos('rs.aisyiyah', 'rs');die();
					*/
					
					
					$sql_cek_bobot2 = "select Nama_Atribut, Level from bobot_atribut where tipe = 'Tempat Berobat' AND Input_Ke = $input_ke_bobot_atribut";
					$hasil_cek_bobot2 = mysqli_query($konek, $sql_cek_bobot2);
					
					$urutan_tempat_berobat_nama = array();
					while($data2 = mysqli_fetch_assoc($hasil_cek_bobot2)) {
						//echo "$i - $sql_cek_bobot2 <br>";\
						$nama_atribut = strtolower($data2['Nama_Atribut']);
						$urutan_tempat_berobat_nama[] = "$nama_atribut";
					}
					
					
					$tempat_berobat_array = array();
					//for($i_highestRow=$cell_tempat_berobat[0]; $i_highestRow<=$highestRow; $i_highestRow++) {
					for($i_highestRow=$cell_tempat_berobat[0]; $i_highestRow<=$highestRow; $i_highestRow++) {
						$nama_atribut = $objWorksheet->getCellByColumnAndRow($cell_tempat_berobat[1], $i_highestRow)->getValue();
						
						$level = '';
						foreach($urutan_tempat_berobat as $utb) {
							$strpos = strpos(strtolower($nama_atribut), strtolower($utb['nama']));
							
							if(!is_numeric($strpos) && !in_array(strtolower($nama_atribut), $urutan_tempat_berobat_nama)) {
								$level = $utb['level'];								
								break;
							}
						}
						echo "nama_atribut=$nama_atribut, level=$level<br>";
						
						
						if($level != '') {
							$tipe = "Tempat Berobat";
							$nilai = $level * 10;
							
							$tempat_berobat_array[] = [
								'nama_atribut'=>"$nama_atribut",
								'tipe'=>"$tipe",
								'level'=>"$level",
								'nilai'=>"$nilai"
							];
						}
					}
					
					
					
					
					
					
					//$tempat_berobat_array = array_unique($tempat_berobat_array);
					$tempat_berobat_array = array_map("unserialize", array_unique(array_map("serialize", $tempat_berobat_array)));
					//$tempat_berobat_array = array_unique($tempat_berobat_array, SORT_REGULAR);
					//var_dump($tempat_berobat_array);
					//die();
					
					$i=1;
					foreach($tempat_berobat_array as $tba) {
						$sql = "insert into bobot_atribut values ('', $input_ke_bobot_atribut, '$tba[nama_atribut]', '$tba[tipe]', '$tba[level]', '$tba[nilai]')";
						
						if($konci_insert)
							mysqli_query($konek, $sql);
						if($konci_tampil_sql)
							echo "coba $i - $sql <br><br>";
						$i++;
					}
					
					
					$penyakit_array = array();
					
					/*
					echo "<br><br>urutan_penyakit=";
					var_dump($urutan_penyakit);
					echo "<br><br>urutan_penyakit[0]=";
					var_dump($urutan_penyakit[0]);
					echo "<br><br>urutan_penyakit[1]=";
					var_dump($urutan_penyakit[1]);
					//var_dumP($urutan_penyakit);
					//var_dumP($urutan_penyakit_nama);
					*/
					
					
					for($i_highestRow=$cell_penyakit[0]; $i_highestRow<=$highestRow; $i_highestRow++) {
						$nama_atribut = $objWorksheet->getCellByColumnAndRow($cell_penyakit[1], $i_highestRow)->getValue();
						
						
						$level = '';
						foreach($urutan_penyakit as $up) {
							$kunci_break = false;
							
							foreach($up as $up_value) {
								$strpos = strpos(strtolower($nama_atribut), strtolower($up_value['nama']));
								
								/*
								echo "\$up_value['nama'] = $up_value[nama] <br>";
								echo "$nama_atribut = if(!is_numeric($strpos) && !".in_array(strtolower($nama_atribut), $urutan_penyakit_nama).") { <br><br>";
								//die();
								
								if(!is_numeric("")) {
									echo "masuk kosong <br>";
								}
								if(in_array(strtolower('tht'), $urutan_penyakit_nama)) {
									echo "masuk kosong <br>";
								}
								*/
								
								
								if(!is_numeric($strpos) && !in_array(strtolower($nama_atribut), $urutan_penyakit_nama)) {
									//echo "strpos = $strpos, strpos(strtolower($nama_atribut), strtolower(".$up_value['nama']."))<br>";
									//die();
									//echo "nama_atribut = $nama_atribut <br>";
									$level = $up_value['level'];
									
									if($nama_atribut == 'DYSMENORRHOEA') {
										
										//echo "if(!is_numeric($strpos) && !in_array(strtolower($nama_atribut), \$urutan_penyakit_nama)) {";
										//var_dump($up);
										//echo "$nama_atribut, level $level, nilai = $nilai <br><br><br>";
									}
									$kunci_break = true;
									break;									
								}
							}
							
							if($kunci_break == true) break;
						}
						
						
						if($level != '') {
							$tipe = "Penyakit";
							$nilai = $level * 10;
							
							
							
							$penyakit_array[] = [
								'nama_atribut'=>"$nama_atribut",
								'tipe'=>"$tipe",
								'level'=>"$level",
								'nilai'=>"$nilai"
							];
						}						
					}
					
					//var_dump($penyakit_array);
					//die();
					
					$penyakit_array = array_map("unserialize", array_unique(array_map("serialize", $penyakit_array)));
					
					echo "<br><br>";
					$i=1;
					foreach($penyakit_array as $pa) {
						$sql = "insert into bobot_atribut values ('', $input_ke_bobot_atribut, '$pa[nama_atribut]', '$pa[tipe]', '$pa[level]', '$pa[nilai]')";
						
						if($konci_insert)
							mysqli_query($konek, $sql);	
						if($konci_tampil_sql)
							echo "coba $i - $sql <br><br>";
						
						$i++;
					}
					
					
					
					foreach($sql_array as $sa) {
						$sql = $sa;
						
						if($konci_insert)
							mysqli_query($konek, $sql);
						if($konci_tampil_sql)
							echo "$sql <br>";
						//echo "coba - $sql <br><br>";
					}
					
					unset($tempat_berobat_array);
					unset($penyakit_array);
					unset($sql_array);
					
					$sql = "select * from data_kesehatan_pegawai where input_ke = $input_ke_data_kesehatan_pegawai";
					$hasil = mysqli_query($konek, $sql);
					
					while($data = mysqli_fetch_assoc($hasil)) {
						$rawat_jalan = $data['Rawat_Jalan'] == 'ya' ? 20 : 10;
						$rawat_inap = $data['Rawat_Inap'] == 'ya' ? 20 : 10;
						
						$sql2 = "select nilai from bobot_atribut where nama_atribut = '$data[Tempat_Berobat]' and Tipe = 'Tempat Berobat'";
						//echo "$sql2 <br>";
						$hasil2 = mysqli_query($konek, $sql2);
						$data2 = mysqli_fetch_assoc($hasil2);
						$tempat_berobat = $data2['nilai'];
						
						$sql2 = "select nilai from bobot_atribut where nama_atribut = '$data[Penyakit]' and Tipe = 'Penyakit'";
						//echo "$sql2 <br>";
						$hasil2 = mysqli_query($konek, $sql2);
						$data2 = mysqli_fetch_assoc($hasil2);
						$penyakit = $data2['nilai'];
						
						$sql2 = "insert into konversi_data_kesehatan values('',
						$input_ke_konversi_data_kesehatan, 
						$data[ID_Data_Kesehatan_Pegawai], 
						'$data[Nama]', 
						$rawat_jalan,
						$rawat_inap, 
						$tempat_berobat, 
						$penyakit)";
						
						if($konci_insert)
							mysqli_query($konek, $sql2);
						if($konci_tampil_sql)
							echo "$sql2 <br>";
						//die();
						
					}
					
					
					
					
					
					
				}
			?>
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="tabel-cek-excel">
						<thead>
							<tr>
								<th>No</th>
								<th>Baris Ke</th>
								<th>Nama Kolom</th>
							</tr>
						</thead>
						<tbody>
							<?php
								
								$i=1;
								foreach($data_kosong as $dk) {
									echo "
									<tr class='odd gradeX'>
										<td>$i</td>
										<td>$dk[baris]</td>
										<td>$dk[kolom]</td>
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
		$('#tabel-cek-excel').DataTable({
				responsive: true
		});
	});	
</script>









<?php
		
	//}
	
?>