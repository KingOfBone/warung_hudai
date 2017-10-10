<?php
	include('../konek.php');
	
	$sql = "
		SELECT * FROM pesanan 
	";
	$hasil = mysqli_query($konek, $sql);
	
	WHILE($data = mysqli_fetch_assoc($hasil)) {
		$sql2 = "update pesanan set pemesan = '".ucwords(strtolower($data['pemesan']))."' where id_pesanan = $data[id_pesanan]";
		echo "$sql2 <br>";
		mysqli_query($konek, $sql2);		
	}
	
	
	echo'BERHASIL';
?>