<?php
	include('../konek.php');
	
	$value = $_GET['value'];
	$explode = explode(' - ', $value);
	
	$delivery = $explode[1];
	$id_pesanan = $explode[0];	
	
	
	$sql = "update pesanan set delivery = '$delivery' where id_pesanan = '$id_pesanan'";
	echo "$sql <br>";
	mysqli_query($konek, $sql);		
	
	
	header('location:konfirm_deliv.php');
	die();
?>