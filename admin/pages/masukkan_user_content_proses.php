<?php
	session_start();
	include("../config/config.php");
	
	$nama = ucwords(mysqli_real_escape_string($konek, $_POST['nama']));
	$jabatan = mysqli_real_escape_string($konek, $_POST['jabatan']);
	$telp = mysqli_real_escape_string($konek, $_POST['telp']);
	$username = mysqli_real_escape_string($konek, $_POST['username']);
	$password = md5(mysqli_real_escape_string($konek, $_POST['password']));
	
	$sql = "select * from user where username = '$username' and password = '$password'";
	$hasil = mysqli_query($konek, $sql);
	
	
	if(mysqli_num_rows($hasil) > 0) {
		header("location:".$url_masukkan_user."&&pesan=username atau password sudah ada");
		die();
	}
	else {
		$sql = "insert into user values('', '$username', '$password', '$nama', '$jabatan', 'User', $telp)";
		mysqli_query($konek, $sql);
		
		header("location:".$url_masukkan_user."&&pesan=Data berhasil masuk");
		die();
	}
?>