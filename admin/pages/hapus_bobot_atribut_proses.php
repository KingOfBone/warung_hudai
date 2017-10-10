<?php
	session_start();
	include("../config/config.php");
	
	$input_ke = $_GET['input_ke'];
	
	$sql = "delete from data_kesehatan_pegawai where input_ke = $input_ke";
	mysqli_query($konek, $sql);
	
	$sql = "delete from bobot_atribut where input_ke = $input_ke";
	mysqli_query($konek, $sql);
	
	header("location:".$url_hapus_bobot_atribut."&&pesan=Data berhasil dihapus");
	die();
	
?>