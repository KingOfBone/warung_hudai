<?php
	ob_start();
	set_include_path(get_include_path() . PATH_SEPARATOR . '../config/PHPExcel/Classes/');
	
	include '../config/PHPExcel/Classes/PHPExcel/IOFactory.php';
	include '../config/config.php';
	
	$sql = "select * from data_kesehatan_pegawai";
	$hasil = mysqli_query($konek, $sql);
	
	if(mysqli_num_rows($hasil) == 0) $input_ke = 1;
	else {
		$data = mysqli_fetch_assoc($hasil);
		$input_ke = $data['Input_Ke'] + 1;
	}
	
	die();
	
	$sql = "select now() 'waktu'";
	$hasil = mysqli_query($konek, $sql);	
	$data = mysqli_fetch_assoc($hasil);
	$waktu = $data['waktu'];
	
	
	
	$inputFileName = "". $_FILES["data_kesehatan"]["tmp_name"] ."";
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);		
	
	$objWorksheet = $objPHPExcel->setActiveSheetIndex();
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();
	$highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumn);
	
	
	$cell_baris = '';
	$cell_kolom = '';
	
	for($i_highestRow=0; $i_highestRow<=$highestRow; $i_highestRow++) {
		for($i_highestColumn=0; $i_highestColumn<$highestColumn; $i_highestColumn++) {
			if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == "ID_Kesehatan") {
				$cell_baris = $i_highestRow+1;
				$cell_kolom = $i_highestColumn;
			}
		}
	}
	
	if($cell_baris == '' || $cell_kolom == '') {
		header("location:jj?pesan=data_error");
		die();
	}
	
	
	
	$data_kosong = array();
	
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
			
			if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == '')
				$data_kosong[] = ['baris'=>$i_highestRow, 'kolom'=>$i_highestColumn];
		}
		
		$sql = "insert into data_kesehatan_pegawai values ('', $input_ke, $data_excel, '$waktu', 'Aktif')";
		//echo "$sql <br>";
		//mysqli_query($konek, $sql);		
		
	}
	
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
?>


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
						<form enctype='multipart/form-data' role="form" method='post' action='masukkan_data_kesehatan_content_proses.php'>
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
								<label>Masukkan file data kesehatan berupa excel</label>
								<input type="file" name='data_kesehatan'>
							</div>
							
							<button type="submit" class="btn btn-primary">Masukkan</button>
						</form>
					</div>
					<!-- /.col-lg-6 (nested) -->
					
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			
		</div>
		
	</div>
	
</div>









<?php
		var_dump($data_kosong);
	}
	
?>