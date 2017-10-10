<?php
	session_start();
	include("../config/config.php");
	
	$tombol = mysqli_real_escape_string($konek, $_POST['tombol']);
	
	if($tombol == 'Kembali') {
		header("location:$url_ubah_user");
		die();
	}
	
	
	$id = mysqli_real_escape_string($konek, $_POST['id']);
	$nama = ucwords(mysqli_real_escape_string($konek, $_POST['nama']));
	$jabatan = mysqli_real_escape_string($konek, $_POST['jabatan']);
	$telp = mysqli_real_escape_string($konek, $_POST['telp']);
	$username = mysqli_real_escape_string($konek, $_POST['username']);
	$password = md5(mysqli_real_escape_string($konek, $_POST['password']));
	
	
	$sql = "update user set nama = '$nama', jabatan = '$jabatan', telp = '$telp', username = '$username', password = '$password' where id_user = $id";
	mysqli_query($konek, $sql);
	
	header("location:".$url_ubah_user_form."&&id=$id&&pesan=Data berhasil diubah");
	die();	
?>