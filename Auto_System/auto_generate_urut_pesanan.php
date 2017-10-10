<?php
	include('../konek.php');
	
	//$sql = "SELECT * FROM `pesanan` ORDER BY `no_pesanan`, `tanggal` DESC";
	$sql = "SELECT distinct(no_pesanan) 'no_pesanan' FROM `pesanan`";
	$hasil = mysqli_query($konek, $sql);
	
	$database = array();
	$nopes = 10001;
	wHILE($data = mysqli_fetch_assoc($hasil)) {
		$sql2 = "SELECT distinct(id_customer) 'id_customer' FROM `pesanan` where no_pesanan = '$data[no_pesanan]'";
		$hasil2 = mysqli_query($konek, $sql2);
		
		
		WHILE($data2 = mysqli_fetch_assoc($hasil2)) {
			$nopes_ = 'P'.$nopes++;
			$id_customer = $data2['id_customer'];
			
			$sql3 = "update `pesanan` set no_pesanan = '$nopes_' where no_pesanan = '$data[no_pesanan]' AND id_customer = '$id_customer'";
			mysqli_query($konek, $sql3);
			
			//echo "$sql3; <br>";
		}
		
	}
	
	
	echo'BERHASIL';
?>