<?php

include('konek.php');

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

$sql = "select id_customer from customer order by id_customer desc limit 1";
$hasil = mysqli_query($konek, $sql);


if(mysqli_num_rows($hasil) > 0) {
	$data = mysqli_fetch_assoc($hasil);
	$explode = explode('C', $data['id_customer']);
	$id_customer = $explode[1]+1;
	$id_customer = "C$id_customer";	
}
else {
	$id_customer = "C10001";
}


$sql = "insert into customer values('$id_customer', '$kartuid', $noid, '$nama', '$alamat', '$jns_klmn', '$tgl_lahir', $no_hp, '$email', '$username', '$password')";	

echo "$sql <br>";
mysqli_query($konek, $sql);

header("location:login_cus.php?id_customer=$id_customer");
die();

?>