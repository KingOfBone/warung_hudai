<?php 
	
	include('../konek.php');

	$id_soal = $_POST['id_soal'];
	

	$jns_soal = $_POST['jns_soal'];
	$soal = $_POST['soal'];
	$status = $_POST['status'];
	$ket = $_POST['ket'];

	echo $sql = "update soal_fuzzy set
	jenis_soal = '$jns_soal',
	pertanyaan = '$soal',
	status = '$status',
	ket = '$ket'
	
	where id_soal = '$id_soal';
	";
	mysqli_query($konek, $sql);
	header('location:list_soal_sekian.php');
?>