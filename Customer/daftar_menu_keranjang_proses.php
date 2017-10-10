<?php
	include('../konek.php');
	
	$id_customer = $_POST['id_customer'];
	$no_keranjang = $_POST['no_keranjang'];
	$id_menu = $_POST['id_menu'];
	$quantity = $_POST['quantity'];
	$tanggal = $_POST['tanggal'];
	$tgl_delivery = $_POST['tgl_delivery'];
	
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
		$sql = "insert into pesanan values('', '$no_pesanan', '$n', '$id_customer', $quantity[$key], '$tanggal', '','Belum Dikirim', 'Belum Dihitung');";
		echo "$sql <br>";
		mysqli_query($konek, $sql);
	}
	
	header("location:daftar_pesanan.php");
	die();
	
?>