<?php
	session_start();
	include('../konek.php');
	
	$id_customer = $_SESSION['id_customer'];
	$menu[]=$_POST['nama_menu'];
	foreach($menu as $idmenu){
	$sql = "select * from keranjang_pesanan order by id_keranjang_pesanan desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	}
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
	
	
	$sql = "select no_keranjang from keranjang_pesanan order by no_keranjang desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$no_keranjang = $data['no_keranjang'];
	
?>

<form method='post' action='keranjang_pesanan_proses.php'>
	<table>
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
	</table>
	
	
	<table border='1'>
		<tr>
			<td>No</td>
			<td>Nama Menu</td>
			<td>Detail Menu</td>
			<td>Aksi</td>
		</tr>
		<?php
			$sql = "select * from keranjang_pesanan inner join menu inner join detail_menu on keranjang_pesanan.id_menu=menu.id_menu AND menu.id_detail_menu=detail_menu.id_detail_menu where no_keranjang = $no_keranjang";
			$hasil = mysqli_query($konek, $sql);
			
			$i=1;
			while($data = mysqli_fetch_assoc($hasil)) {
				echo "
					<tr>
						<td>$i</td>
						<td>$data[nama_menu]</td>
						<td>$data[nama_masakan]</td>
						<td>
							<a href='ubah_keranjang_pesanan.php?id_keranjang_pesanan=$data[id_keranjang_pesanan]'>Ubah</a>
							<a href='hapus_keranjang_pesanan.php?id_keranjang_pesanan=$data[id_keranjang_pesanan]'>Hapus</a>
						</td>
						
						<input type='hidden' name='id_menu[]' value='$data[id_menu]'>
						
						<input type='hidden' name='id_detail_menu[]' value='$data[id_detail_menu]'>
						
					</tr>
				";
				$i++;
			}
			
		?>
		
	</table>
	
	<input type='submit' value='Simpan' />
</form>
