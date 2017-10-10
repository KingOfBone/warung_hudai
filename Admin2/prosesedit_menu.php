<?php 
	
	include('../konek.php');

	$id_menu = $_POST['id_menu'];
	
	
	$nama_paket = $_POST['nama_paket'];
	$detail_menu = $_POST['detail_menu'];
	$jns_menu = $_POST['jns_menu'];
	$tanggal = $_POST['tanggal'];
	$tanggal = explode(' - ',$tanggal);
	$date = strtotime($tanggal[0]);
	$time = strtotime($tanggal[1]);
	$tanggal = date("Y-m-d", $date);
	$tanggal .= ' '.date("h:i:s", $time);
	
	$harga = $_POST['harga'];
	$ket = $_POST['ket'];

	$sql = "update menu set
	nama_paket = '$nama_paket',
	detail_menu = '$detail_menu',
	Jenis = '$jns_menu',
	tanggal = '$tanggal',
	harga = '$harga',
	ket = '$ket'	
	where id_menu = '$id_menu';
	";
	mysqli_query($konek, $sql);
	header('location:lihat_menu.php');
	die();
?>