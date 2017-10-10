<?php
	include("../config/config.php");
	
	$penyakit = mysqli_real_escape_string($konek, $_POST['penyakit']);
	//$jenis_tindakan = mysqli_real_escape_string($konek, $_POST['jenis_tindakan']);
	$tindakan = trim($_POST['tindakan']);
	
	
	if(!is_numeric($tindakan) && !empty($tindakan)) {	
		$sql = "insert into tindakan_preventif values('', '$penyakit', '$tindakan', 'Sudah ada aksi')";
		mysqli_query($konek, $sql);
		
		$pesan = "Data berhasil dimasukkan";
	}
	else {
		$pesan = "Data gagal dimasukkan";
	}
	
	header("location:".$url_masukkan_tindakan_preventif."&&pesan_2=$pesan");
	die();
	
?>