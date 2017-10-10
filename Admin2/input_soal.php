<?php

include('../konek.php');

$jns_kategori = $_POST['jns_kategori'];
$soal = $_POST['soal'];
$status = $_POST['status'];
$ket = $_POST['ket'];

$sql = "select id_soal from soal_fuzzy order by id_soal desc limit 1";
$hasil = mysqli_query($konek, $sql);

if(mysqli_num_rows($hasil) > 0) {
	$data = mysqli_fetch_assoc($hasil);
	$explode = explode('S', $data['id_soal']);
	$id_soal = $explode[1]+1;
	$id_soal = "S$id_soal";	
}
else {
	$id_soal = "S10001";
}


$sql = "insert into soal_fuzzy values('$id_soal', '$jns_kategori', '$soal', '$status', '$ket')";	
mysqli_query($konek, $sql);

echo "$sql <br>";

/*$sql = "select id_soal from menu order by id_soal desc limit 1";
$hasil = mysqli_query($konek, $sql);
$data = mysqli_fetch_assoc($hasil);
$id_soal = $data['id_soal'];*/

//echo 'berhasil';
header("location:list_soal_sekian.php");
die();

?>
