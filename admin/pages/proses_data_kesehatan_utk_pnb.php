<?php
	session_start();
	
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
	
	
	
	$sql = "select now() 'waktu'";
	$hasil = mysqli_query($konek, $sql);	
	$data = mysqli_fetch_assoc($hasil);
	$waktu = $data['waktu'];
	
	
	
	$inputFileName = "". $_SESSION['File_Name'] ."";
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);		
	die();
	
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
			
			if($objWorksheet->getCellByColumnAndRow($i_highestColumn, $i_highestRow)->getValue() == '') {
				$nama_kolom = $objWorksheet->getCellByColumnAndRow($i_highestColumn, $cell_baris-1)->getValue();
				
				if($nama_kolom != 'Tanggal_Berobat' && $nama_kolom != 'Total')
					$data_kosong[] = ['baris'=>$i_highestRow, 'kolom'=>"$nama_kolom"];
			}
		}
		
		$sql = "insert into data_kesehatan_pegawai values ('', $input_ke, $data_excel, '$waktu', 'Aktif')";
		//echo "$sql <br>";
		//mysqli_query($konek, $sql);		
		
	}
?>