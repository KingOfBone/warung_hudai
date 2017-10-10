<?php
	session_start();
	include("../config/config.php");
	
	$input_ke = $_GET['input_ke'];
	
	$konci_delete = false;
	$konci_delete = true;
	
	
	
	for($i=1; $i<=4; $i++) {
		$sql = "delete from hasil_clustering_c$i where input_ke = $input_ke";
		echo "$sql <br>";
		if($konci_delete)
			mysqli_query($konek, $sql);		
	}
	
	$sql = "delete from hasil_hitung_k_means where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from hasil_kesimpulan where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from hasil_purity_pegawai_yang_sama where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from hasil_hitung_purity where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from hasil_penyakit where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	header("location:".$url_hapus_hasil_clustering_pegawai."&&pesan=Data berhasil dihapus");
	die();
	
?>