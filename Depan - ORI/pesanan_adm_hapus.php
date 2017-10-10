<?php
	include('../konek.php');
	
	$id_pesanan = $_POST['id_pesanan'];
	
	$sql = "delete from pesanan where id_pesanan = '$id_pesanan'";
	mysqli_query($konek, $sql);
	
	
	header("location:http://localhost/warung_hudai/Depan/pesanan_adm.php");
	
?>