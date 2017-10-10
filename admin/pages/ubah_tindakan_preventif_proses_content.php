<?php
	include("../config/config.php");
	
	$id_tindakan_preventif = mysqli_real_escape_string($konek, $_POST['id_tindakan_preventif']);
	$jenis_tindakan = mysqli_real_escape_string($konek, $_POST['jenis_tindakan']);
	$tindakan = trim($_POST['tindakan']);
	
	
	if(!is_numeric($tindakan) && !empty($tindakan)) {	
		$sql = "update tindakan_preventif set 
		tindakan_preventif = '$tindakan'
		where id_tindakan_preventif = $id_tindakan_preventif";
		mysqli_query($konek, $sql);
		
		$pesan = "Data berhasil dimasukkan";
	}
	else {
		$pesan = "Data gagal dimasukkan";
	}
	
	header("location:".$url_ubah_tindakan_preventif."&&pesan_2=$pesan");
	die();
	
?>