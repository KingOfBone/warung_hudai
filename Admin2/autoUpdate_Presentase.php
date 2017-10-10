
<?php 
	include('../konek.php');

	$sql = "select * from hitung_fuzzy_";
	$hasil = mysqli_query($konek, $sql);
	
	while($data = mysqli_fetch_assoc($hasil)) {
		$z = $data['hasil'];
		
		
	}
?>