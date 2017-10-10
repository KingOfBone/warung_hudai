<?php
	include('../konek.php');
	
	$waktu = $_POST['waktu'];
	
	$sql = "insert into pesanan_waktu values('', '$waktu')";
	mysqli_query($konek, $sql);
	
	header("location:jeda_survey.php");
	die();
?>