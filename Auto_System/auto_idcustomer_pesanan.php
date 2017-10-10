<?php
	include('../konek.php');
	
	$sql = "SELECT distinct(no_pesanan) FROM pesanan";
	$hasil = mysqli_query($konek, $sql);
	
	$a=0;
	$b=1;
	$c=33001;
		
	WHILE($data = mysqli_fetch_assoc($hasil)) {
		$sql2 = "select id_customer FROM `customer` limit $a, 1";
		$hasil2 = mysqli_query($konek, $sql2);
		$data2 = mysqli_fetch_assoc($hasil2);
		$id_customer = $data2['id_customer'];
		$no_pesananc = "P$c";
		
		
		$sql3 = "update pesanan set id_pesanan = $b, id_customer = '$id_customer' where no_pesanan = '$data[no_pesanan]'";
		echo "$sql3 <br>";
		mysqli_query($konek, $sql3);
		
		$a++;
		$b++;
		$c++;
	}
	
	
	echo'BERHASIL';
?>