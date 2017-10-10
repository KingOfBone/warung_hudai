<?php
	include("../config/config.php");
	
	$id_tindakan_preventif = $_GET['id_tindakan_preventif'];
	
	
	
	$sql = "delete from tindakan_preventif 
	where id_tindakan_preventif = $id_tindakan_preventif";
	mysqli_query($konek, $sql);
	
	$pesan = "Data berhasil dihapus";

	
	header("location:".$url_hapus_tindakan_preventif."&&pesan_2=$pesan");
	die();
	
?>