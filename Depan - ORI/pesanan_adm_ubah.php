<?php
	include('../konek.php');
	
	$id_pesanan = $_POST['id_pesanan'];
	$no_pesanan = $_POST['no_pesanan'];
	$nama_paket = $_POST['nama_paket'];
	$pemesan = $_POST['pemesan'];
	$jumlah = $_POST['jumlah'];
	$tanggal = $_POST['tanggal'];
	
	$sql = "
		update pesanan 
		set 
			no_pesanan = '$no_pesanan',
			id_menu = '$nama_paket',
			pemesan = '$pemesan',
			jumlah = '$jumlah',
			tanggal = '$tanggal'
		where id_pesanan = '$id_pesanan'
	";
	
	mysqli_query($konek, $sql);
	
	header("location:http://localhost/warung_hudai/Depan/pesanan_adm.php");
	
?>