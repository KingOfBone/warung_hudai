<?php
	include('../config/konek.php');
	
	//$id_menu = $_POST['id_menu'];
	$id_customer = $_POST['id_customer'];
	$no_keranjang = $_POST['no_keranjang'];
	$nama_menu = $_POST['nama_menu'];
	$tanggal = $_POST['tanggal'];
	
	//var_dump($nama_menu);
	
	foreach($nama_menu as $n) {
		$explode = explode('-', $n);
		$id_menu = $explode[1];
		
		$sql = "insert into keranjang_pesanan values('', '$id_customer', $no_keranjang, '$id_menu', '$tanggal')";
		echo "$sql <br>";
		mysqli_query($konek, $sql);
	}
	
	header("location:keranjang_pesanan.php");
	die();
?>