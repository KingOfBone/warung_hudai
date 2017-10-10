<?php

include('../konek.php');

$nama_paket = $_POST['nama_paket'];
$detail_menu = $_POST['detail_menu'];
$jns_menu = $_POST['jns_menu'];
$hari = $_POST['hari'];
$harga = $_POST['harga'];
$ket = $_POST['ket'];

$sql = "select id_menu from menu order by id_menu desc limit 1";
$hasil = mysqli_query($konek, $sql);

if(mysqli_num_rows($hasil) > 0) {
	$data = mysqli_fetch_assoc($hasil);
	$explode = explode('M', $data['id_menu']);
	$id_menu = $explode[1]+1;
	$id_menu = "C$id_menu";	
}
else {
	$id_menu = "M10001";
}


$sql = "insert into menu values('$id_menu', '$nama_paket', '$detail_menu', '$jns_menu', '$hari', '$harga', '$ket','')";	

echo "$sql <br>";
mysqli_query($konek, $sql);


$sql = "select id_menu from menu order by id_menu desc limit 1";
$hasil = mysqli_query($konek, $sql);
$data = mysqli_fetch_assoc($hasil);
$id_menu = $data['id_menu'];

//echo 'berhasil';
header("location:lihat_menu.php");
die();

?>
