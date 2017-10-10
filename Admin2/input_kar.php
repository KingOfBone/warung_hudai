<?php

include('../konek.php');

$kartuid = $_POST['kartuid'];
$noid = $_POST['noid'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jns_klmn = $_POST['optionsRadios'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select id_karyawan from karyawan order by id_karyawan desc limit 1";
$hasil = mysqli_query($konek, $sql);

if(mysqli_num_rows($hasil) > 0) {
	$data = mysqli_fetch_assoc($hasil);
	$explode = explode('K', $data['id_karyawan']);
	$id_karyawan = $explode[1]+1;
	$id_karyawan = "K$id_karyawan";	
}
else {
	$id_karyawan = "K10001";	
}

//tanggal lahir belum
$sql = "insert into karyawan values('$id_karyawan', '$kartuid', $noid, '$nama', '$alamat', '$jns_klmn','$tgl_lahir', $no_hp, '$email', '$username', '$password')";	

echo "$sql <br>";
mysqli_query($konek, $sql);


$sql = "select id_karyawan from karyawan order by id_karyawan desc limit 1";
$hasil = mysqli_query($konek, $sql);
$data = mysqli_fetch_assoc($hasil);
$id_karyawan = $data['id_karyawan'];

header("location:lihat_karyawan.php");
die();

?>