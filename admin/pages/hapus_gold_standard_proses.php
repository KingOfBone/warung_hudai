<?php
	session_start();
	include("../config/config.php");
	
	$id_gold_standard = $_GET['id_gold_standard'];
	
	$konci_delete = true;
	$konci_delete = false;
	
	echo $sql = "delete from gold_standard where id_gold_standard = $id_gold_standard";
	die();
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	header("location:".$url_hapus_gold_standard."&&pesan=Data berhasil dihapus");
	die();
	
?>