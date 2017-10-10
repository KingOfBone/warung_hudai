<?php
	include("../config/config.php");
	
	$nilai = $_POST['nilai'];
	$kolom = $_POST['kolom'];
	$nama_atribut = $_POST['nama_atribut'];
	$id_bobot_nilai_data_kesehatan = $_POST['id_bobot_nilai_data_kesehatan'];
	$id_data_kesehatan_pegawai = $_POST['id_data_kesehatan_pegawai'];
	
	$level = $nilai/10;
	
	$content = $nilai == 20 ? 'ya' : 'tidak';
	
	
	
	$sql = "
		select id_bobot_nilai_data_kesehatan from data_kesehatan_pegawai
		inner join konversi_data_kesehatan
		on
		data_kesehatan_pegawai.id_data_kesehatan_pegawai=konversi_data_kesehatan.id_data_kesehatan_pegawai
		where $kolom='$nama_atribut'
	";
	
	//echo "$sql <br><br>";
	
	$hasil = mysqli_query($konek, $sql);
	
	$id_bobot_nilai_data_kesehatan = array();
	while($data = mysqli_fetch_assoc($hasil)) {
		$id_bobot_nilai_data_kesehatan[] = $data['id_bobot_nilai_data_kesehatan'];
	}
	
	$sql = "
		update data_kesehatan_pegawai		
		set $kolom='$content'
		where $kolom='$nama_atribut'
	";
	
	//echo "$sql <br>";
	
	mysqli_query($konek, $sql);
	
	
	foreach($id_bobot_nilai_data_kesehatan as $id) {
		$sql = "
			update konversi_data_kesehatan		
			set Bobot_$kolom=$nilai
			where id_bobot_nilai_data_kesehatan=$id
		";
		
		mysqli_query($konek, $sql);
		
		//echo "$sql <br>";
	}
	
	$pesan = "Data berhasil dimasukkan";
	
	header("location:".$url_tampilkan_bobot_atribut_bermasalah."&&pesan_2=$pesan");
	die();
	
?>