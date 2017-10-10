<?php
	include('../config/konek.php');
	
	//$id_menu = $_POST['id_menu'];
	$id_menu = $_POST['id_menu'];
	$id_keranjang_pesanan = $_POST['id_keranjang_pesanan'];
	
	
	//var_dump($nama_menu);
	
	$explode = explode('-', $id_menu);
	$id_menu = $explode[1];
	
	$sql = "update keranjang_pesanan set id_menu = '$id_menu' where id_keranjang_pesanan = $id_keranjang_pesanan";
	echo "$sql <br>";
	mysqli_query($konek, $sql);
	 
	
	header("location:keranjang_pesanan.php");
	die();
?>