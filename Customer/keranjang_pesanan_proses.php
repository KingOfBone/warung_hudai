<?php
	include('../konek.php');
	
	//$id_menu = $_POST['id_menu'];
	$id_customer = $_POST['id_customer'];
	$no_keranjang = $_POST['no_keranjang'];
	$id_menu = $_POST['id_menu'];
	$id_detail_menu = $_POST['id_detail_menu'];
	$tanggal = $_POST['tanggal'];
	
	//var_dump($id_menu);
	
	foreach($id_menu as $key=>$im) {
		$sql = "insert into pesanan values('', '$id_customer', $no_keranjang, '$id_menu[$key]', '$tanggal')";
		echo "$sql <br>";
		//mysqli_query($konek, $sql);
	}
	
	die();
	header("location:keranjang_pesanan.php");
?>