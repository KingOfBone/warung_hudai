<?php
	include('../konek.php');
	
	$id_menu = $_POST['id_menu'];
	$nama_paket = $_POST['nama_paket'];
	$detail_menu = $_POST['detail_menu'];
	$jenis = $_POST['jenis'];
	$lama_buat = $_POST['lama_buat'];
	
	$sql = "
		update menu 
		set 
			nama_paket = '$nama_paket',
			detail_menu = '$detail_menu',
			jenis = '$jenis',
			lama_buat = '$lama_buat'
		where id_menu = '$id_menu'
	";
	mysqli_query($konek, $sql);
	
	header("location:http://localhost/warung_hudai/Depan/menu.php");
	
?>