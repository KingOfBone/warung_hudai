<?php
	include('../konek.php');
	
	$nama_paket = $_POST['nama_paket'];
	$detail_menu = $_POST['detail_menu'];
	$jenis = $_POST['jenis'];
	$lama_buat = $_POST['lama_buat'];
	$harga = $_POST['harga'];
	$gambar = $_FILES['gambar'];
	
	
	$sql = "select id_menu from menu order by id_menu desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$id_menu = 'M'.(substr($data['id_menu'], 1, 5)+1);
	
	
	$sql = "insert into menu values('$id_menu', '$nama_paket','$detail_menu','$jenis','$lama_buat', now(), 'Senin', $harga, '$gambar[name]', 'Tayang')";
	mysqli_query($konek, $sql);
	
	$dir = getcwd();	
	move_uploaded_file($gambar['tmp_name'], "$dir\upload\ $gambar[name]");
	
	header("location:http://localhost/warung_hudai/Depan/menu.php");
	die();
	
?>