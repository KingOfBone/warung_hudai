<?php 
	session_start();
	
	include('../konek.php');

	$id_customer = $_SESSION['id_customer'];
	//echo $id_customer;

	$kartuid = $_POST['kartuid'];
	$noid = $_POST['noid'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	/*$jns_klmn = $_POST['optionsRadios'];
	$tgl_lahir = $_POST['tgl_lahir'];*/
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	echo $sql = "update customer set
	
	kartu_id = '$kartuid',
	nomor_kartu = '$noid',
	nama = '$nama',
	alamat = '$alamat',
	no_hp = '$no_hp',
	email = '$email',
	username = '$username',
	password = '$password'
	
	where id_customer = '$id_customer';
	";
	mysqli_query($konek, $sql);
	
	header('location:customer.php');
	//die();
?>