<?php
	session_start();
	include("../config/config.php");
	
	$id = $_GET['id'];
	
	$sql = "delete from user where id_user = $id";
	mysqli_query($konek, $sql);
	
	header("location:".$url_hapus_user."&&pesan=Data berhasil dihapus");
	die();
	
?>