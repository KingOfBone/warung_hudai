<?php
	include("../config/config.php");
	
	$nilai = $_POST['nilai'];
	$nama_atribut = $_POST['nama_atribut'];
	$id_bobot_nilai_data_kesehatan = $_POST['id_bobot_nilai_data_kesehatan'];
	
	$level = $nilai/10;
	
	$sql = "
		update bobot_atribut
		set level=$level, nilai=$nilai
		where nama_atribut='$nama_atribut'
	";
	
	//echo "$sql <br>";
	mysqli_query($konek, $sql);
	
	
	
	$sql = "
		select id_bobot_nilai_data_kesehatan from data_kesehatan_pegawai
		inner join konversi_data_kesehatan 
		on 
		data_kesehatan_pegawai.id_data_kesehatan_pegawai=konversi_data_kesehatan.id_data_kesehatan_pegawai
		where penyakit = '$nama_atribut'
	";
	
	
	//echo "$sql <br><br>";
	
	$hasil = mysqli_query($konek, $sql);
	
	$id_bobot_nilai_data_kesehatan = array();
	while($data = mysqli_fetch_assoc($hasil)) {
		$id_bobot_nilai_data_kesehatan[] = $data['id_bobot_nilai_data_kesehatan'];
	}
	
	
	
	
	foreach($id_bobot_nilai_data_kesehatan as $id) {
		$sql = "
			update konversi_data_kesehatan		
			set bobot_penyakit=$nilai
			where id_bobot_nilai_data_kesehatan=$id
		";
		
		//echo "$sql <br>";
		mysqli_query($konek, $sql);
	}
	
	
	$pesan = "Data berhasil dimasukkan";
	
	
	header("location:".$url_tampilkan_bobot_atribut_bermasalah."&&pesan_2=$pesan");
	die();
	
?>