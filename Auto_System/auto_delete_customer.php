<?php
	include('../konek.php');
	
	//$sql = "SELECT * FROM `pesanan` ORDER BY `no_pesanan`, `tanggal` DESC";
	$sql = "SELECT id_customer FROM customer limit 1771, 1800";
	$sql = "SELECT id_customer FROM customer";
	$hasil = mysqli_query($konek, $sql);
	
	$database = array();
	$batas = 1791;
	wHILE($data = mysqli_fetch_assoc($hasil)) {
		if($batas >= 0) {
			$sql2 = "delete FROM `pesanan` where id_customer = '$data[id_customer]'";
			mysqli_query($konek, $sql2);			
		}
		
		$batas--;
	}
	
	
	echo'BERHASIL';
?>