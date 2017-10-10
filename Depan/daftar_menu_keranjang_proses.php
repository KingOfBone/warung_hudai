<?php
	session_start();
	$_SESSION['session_menu'] = null;
	
	include('../konek.php');
	
	$id_user = $_POST['id_user'];
	$pemesan = $_POST['pemesan'];
	$id_menu = $_POST['id_menu'];
	$no_keranjang = $_POST['no_keranjang'];
	$tanggal = $_POST['tanggal'];
	$tgl_delivery = $_POST['tgl_delivery'];
	$quantity = $_POST['quantity'];
	
	//var_dump($quantity);
	
	
	$sql = "select * from pesanan order by no_pesanan desc";
	$hasil = mysqli_query($konek, $sql);
	$no_pesanan = 1;
	
	if(mysqli_num_rows($hasil) > 0) {
		$data = mysqli_fetch_assoc($hasil);
		$explode = explode('P',$data['no_pesanan']);
		$no_pesanan += $explode[1];
		$no_pesanan = "P".$no_pesanan;
	}
	else {
		$no_pesanan = "P10001";
	}
	
	
	
	
	foreach($id_menu as $key=>$n) {
		$sql = "insert into pesanan values('', '$id_user', '$no_pesanan', '$n', '$pemesan', $quantity[$key], '$tanggal', '', 'Belum Dikirim');";
		mysqli_query($konek, $sql);
	}
	
	
	
	header("location:pesanan.php");
	die();
	
?>