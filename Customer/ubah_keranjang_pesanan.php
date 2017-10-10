
<?php
	session_start();
	include('../config/konek.php');
	
	$id_customer = $_SESSION['id_customer'];
	
	$id_keranjang_pesanan = $_GET['id_keranjang_pesanan'];
	
	$sql = "
	select * from keranjang_pesanan inner join menu inner join detail_menu on keranjang_pesanan.id_menu=menu.id_menu AND menu.id_detail_menu=detail_menu.id_detail_menu where  id_keranjang_pesanan = $id_keranjang_pesanan";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
?>

<form method='post' action='ubah_keranjang_pesanan_proses.php'>
	<table  style='margin-bottom:20px;'>
		<tr>
			<td>Menu sarapan sebelumnya</td>
			<td>:</td>
			<td><input readonly type='text' name='tanggal' value='<?php echo $data['nama_menu']; ?>' /></td>
			
			<input type='hidden' name='id_keranjang_pesanan' value='<?php echo $id_keranjang_pesanan; ?>' />
		</tr>
		
		
		
		<!--
		<tr>
			<td><input type='submit' value='Masukkan'></td>
		</tr>
		-->
	</table>
	<?php
		include('ubah_keranjang_pesanan_menu.php');
	?>
</form> 