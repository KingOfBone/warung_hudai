

<?php
	include('../config/config.php');
	
	
	$sql = "select * from data_kesehatan_pegawai";
	$hasil = mysqli_query($konek, $sql);
	
	while($data = mysqli_fetch_assoc($hasil)) {
		
		$rawat_jalan = $data['Rawat_Jalan'] == "ya" ? 20 : 10;
		//$rawat_jalan = $data['Rawat_Jalan'] == "ya" ? 2 : 1;
		$rawat_inap = $data['Rawat_Inap'] == "ya" ? 20 : 10;
		//$rawat_inap = $data['Rawat_Inap'] == "ya" ? 2 : 1;
		
		//$sql2 = "select nilai from bobot_nilai where nama_objek = '$data[Tempat_Berobat]'";
		$sql2 = "select nilai from bobot_nilai_kecil where nama_objek = '$data[Tempat_Berobat]'";
		//echo "$sql2<br>";
		$hasil2 = mysqli_query($konek, $sql2);
		$data2 = mysqli_fetch_assoc($hasil2);
		$tempat_berobat = '';
		if(empty($data2['nilai'])) {
			//? rand(1500, 1463) : $data2['nilai'];
		}			
		$tempat_berobat = empty($data2['nilai']) ? rand(1500, 1463) : $data2['nilai'];
		
		//$sql2 = "select nilai from bobot_nilai where nama_objek = '$data[Penyakit]'";
		$sql2 = "select nilai from bobot_nilai_kecil where nama_objek = '$data[Penyakit]'";
		//echo "$sql2<br>";
		$hasil2 = mysqli_query($konek, $sql2);
		$data2 = mysqli_fetch_assoc($hasil2);
		$penyakit = $data2['nilai'];
		
		
		$sql2 = "insert into bobot_nilai_data_kesehatan values('', $data[ID_Data_Kesehatan_Pegawai], $rawat_jalan, $rawat_inap, $tempat_berobat, $penyakit)";
		//echo "$sql2;<br><br>";
		mysqli_query($konek, $sql2);
		
	}
	
?>