<?php
	session_start();
	
	include('konek.php');
	
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	
	$sql = "select * from user where username = '$username' and password = '$password' AND status = 'owner' OR status = 'admin'";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil)) {
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['status'] = $data['status'];
		
		
		header("location:Depan");
		die();
	}
	else {			
		header("location:login.php?$username&$password");
		die();
	}
?>