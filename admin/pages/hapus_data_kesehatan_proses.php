<?php
	session_start();
	include("../config/config.php");
	
	$input_ke = $_GET['input_ke'];
	
	$konci_delete = false;
	$konci_delete = true;
	
	
	$sql = "delete from bobot_atribut where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from data_kesehatan_pegawai where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	$sql = "delete from konversi_data_kesehatan where input_ke = $input_ke";
	if($konci_delete)
		mysqli_query($konek, $sql);
	
	
	
	// Bagian Fase Ke 2
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
	
	header("location:".$url_hapus_data_kesehatan."&&pesan=Data berhasil dihapus");
	die();
	
?>