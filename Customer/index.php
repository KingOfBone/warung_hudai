<!DOCTYPE>
<html>
<head>
</head>
<?php
	session_start();
	include('../konek.php');
	
	$id_customer = $_SESSION['id_customer'];
	
	$sql = "select id_keranjang_pesanan from keranjang_pesanan order by id_keranjang_pesanan desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0)
		$no_pesanan = $data['id_keranjang_pesanan'];
	else
		$no_pesanan = 1;

	
	$sql = "select distinct(no_keranjang) from keranjang_pesanan order by no_keranjang desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0)
		$no_keranjang = $data['no_keranjang']+1;		
	else
		$no_keranjang = 1;
	
		
	
	
	$sql = "select * from customer where id_customer = '$id_customer'";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$nama_customer = $data['nama'];
	
	$sql = "select now() 'sekarang'";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$tanggal = $data['sekarang'];
	
?>

<form method='post' action='input_keranjang_pesanan.php'>
	<table  style='margin-bottom:20px;'>
		<tr>
			<td>No Pesanan</td>
			<td>:</td>
			<td><input type='text' readonly name='no_keranjang' value='<?php echo $no_keranjang; ?>' /></td>
			<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>' />
			<input type='hidden' name='id_menu' value='<?php echo $id_menu; ?>' />
		</tr>
		<tr>
			<td>Nama Pesanan</td>
			<td>:</td>
			<td><input type='text' readonly name='nama_pesanan' value='<?php echo $nama_customer; ?>' /></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><input readonly type='text' name='tanggal' value='<?php echo $tanggal; ?>' /></td>
		</tr>
		
		
		
		<!--
		<tr>
			<td><input type='submit' value='Masukkan'></td>
		</tr>
		-->
	</table>
	<?php
		include('pemesanan.php');
	?>
</form> 


</body>
</html>