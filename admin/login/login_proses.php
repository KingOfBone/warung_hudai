<?php
	session_start();
	include("../config/config.php");
	
	$username = mysqli_real_escape_string($konek, $_POST['username']);
	$password = md5(mysqli_real_escape_string($konek, $_POST['password']));
	
	$sql = "select * from user where username = '$username' and password = '$password'";
	$hasil = mysqli_query($konek, $sql);
	
	
	if(mysqli_num_rows($hasil) < 1) {
		header("location:".$url_login."?pesan=username atau password salah");
		die();
	}
	else {
		$data = mysqli_fetch_assoc($hasil);
		$_SESSION['ID_User'] = $data['ID_User'];
		
		$sql = "select * from data_kesehatan_pegawai limit 1";
		$hasil = mysqli_query($konek, $sql);
		$total_baris = mysqli_num_rows($hasil);
		$konci_menu_utama = $total_baris > 0 ? true : false;
		$_SESSION['Kunci_Menu_Utama'] = $konci_menu_utama;
		
		
		header("location:".$url_pages."");
		die();
	}
?>