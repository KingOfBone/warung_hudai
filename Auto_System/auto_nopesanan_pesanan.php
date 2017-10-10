<?php
	include('../konek.php');
	
	$sql = "SELECT * FROM pesanan";
	$hasil = mysqli_query($konek, $sql);
	
	$c=33001;
	
	WHILE($data = mysqli_fetch_assoc($hasil)) {
		$no_pesananc = "P$c";
		$sql3 = "update pesanan set no_pesanan = '$no_pesananc' where id_pesanan = '$data[id_pesanan]'";
		//echo "$sql3 <br>";
		mysqli_query($konek, $sql3);
		
		$c++;
	}
	
	
	echo'BERHASIL';
?>