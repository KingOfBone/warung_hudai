<?php
	include('../konek.php');
	
	$nama_paket = $_POST['nama_paket'];
	$detail_menu = $_POST['detail_menu'];
	$jenis = $_POST['jenis'];
	$lama_buat = $_POST['lama_buat'];
	
	$sql = "insert into menu values('', '$nama_paket','$detail_menu','$jenis','$lama_buat')";
	mysqli_query($konek, $sql);
	
	
	header("location:http://localhost/warung_hudai/Depan/menu.php");
	
?>