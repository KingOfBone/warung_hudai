




<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php
				$sql = "select now() 'waktu_awal'";
				$hasil = mysqli_query($konek, $sql);
				$data = mysqli_fetch_assoc($hasil);
				$waktu_awal = $data['waktu_awal'];
				//echo "Waktu Awal : $waktu_awal <br><br>";
				
				
				if(!empty($_GET['submenu'])) {
					$explode = explode('_', $_GET['submenu']);
					
					$judul = '';
					for($i_explode=0; $i_explode<count($explode); $i_explode++) {
						$judul .= $explode[$i_explode];
						
						if($i_explode < count($explode)-1) $judul .= ' ';
					}
					
					echo ucwords($judul);
				}
			?>
		</h1>
	</div>
</div>





<script src="../bower_components/jquery/dist/jquery.min.js"></script>


<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>


<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script src="../dist/js/sb-admin-2.js"></script>





<?php
	//include('../config/config.php');
	
	
	//die();;
	
	
	/*
	$sql = "select * from bobot_nilai_2 order by rand() limit 1";
	$hasil = mysqli_query($konek, $sql);
	$centroid_1 = mysqli_fetch_assoc($hasil);
	*/
	
	
	
	/*
	$sql_ = "select nama from bobot_nilai_2 group by ID_Kesehatan asc limit 10";
	$hasil_ = mysqli_query($konek, $sql_);
	
	$jumlah_baris=0;
	$id_kesehatan_="where ";
	$itung = 1;
	while($data_ = mysqli_fetch_assoc($hasil_)) {
		$sql = "select ID_Kesehatan from bobot_nilai_2 where nama = '$data_[nama]'";
		$hasil = mysqli_query($konek, $sql);
		$data = mysqli_fetch_assoc($hasil);
		
		$id_kesehatan_ .= "ID_Kesehatan = '$data[ID_Kesehatan]' ";
		if($itung <mysqli_num_rows($hasil_))
			$id_kesehatan_ .= " or ";
		
		$itung++;
	}
	*/
	
	//echo $id_kesehatan_; die();
	
	
	// include('insert_bobot_nilai_data_kesehatan.php');
	
	/*
	$sql = "truncate hasil_clustering_c1";
	mysqli_query($konek, $sql);
	$sql = "truncate hasil_clustering_c2";
	mysqli_query($konek, $sql);
	$sql = "truncate hasil_clustering_c3";
	mysqli_query($konek, $sql);
	$sql = "truncate hasil_clustering_c4";
	mysqli_query($konek, $sql);
	
	$sql = "truncate hasil_hitung_k_means";
	mysqli_query($konek, $sql);
	
	$sql = "truncate hasil_kesimpulan";
	mysqli_query($konek, $sql);
	*/
	
	
	$konci_insert_awal = false;
	$konci_insert_awal = true;
	
	$konci_insert = false;
	$konci_insert = true;
	
	
	
	$input_ke = $_GET['input_ke'];
	$jumlah_baris=0;
	//$sql = "select * from bobot_nilai_2 ".$id_kesehatan_.' order by ID_Kesehatan asc';
	
	$limit = "limit 500";
	$limit = "";
	
	// SQL Orinya nih
	$sql = "
		select 
			konversi_data_kesehatan.ID_Data_Kesehatan_Pegawai, 
			data_kesehatan_pegawai.ID_Kesehatan, 
			data_kesehatan_pegawai.Nama, Bobot_Rawat_Jalan,  
			Bobot_Rawat_Inap, Bobot_Tempat_Berobat, Bobot_Penyakit
		from konversi_data_kesehatan 
		inner join data_kesehatan_pegawai 
		on
		konversi_data_kesehatan.id_data_kesehatan_pegawai = data_kesehatan_pegawai.id_data_kesehatan_pegawai 
		where konversi_data_kesehatan.input_ke = $input_ke 
		$limit
	";
	
	
	
	$hasil = mysqli_query($konek, $sql);
	while($data = mysqli_fetch_assoc($hasil)) {		
		$attribut_array[] = [$data['Bobot_Rawat_Jalan'], $data['Bobot_Rawat_Inap'], $data['Bobot_Tempat_Berobat'], $data['Bobot_Penyakit']];
		
		$database[] = ['baris_ke'=>$jumlah_baris, "ID_Kesehatan"=>$data['ID_Kesehatan'], "Nama"=>"$data[Nama]",
		"Bobot_Rawat_Jalan"=>"$data[Bobot_Rawat_Jalan]", "Bobot_Rawat_Inap"=>"$data[Bobot_Rawat_Inap]",
		"Bobot_Tempat_Berobat"=>"$data[Bobot_Tempat_Berobat]", "Bobot_Penyakit"=>"$data[Bobot_Penyakit]"];
		
		$database_backup[] = ['baris_ke'=>$jumlah_baris, "ID_Data_Kesehatan_Pegawai"=>$data['ID_Data_Kesehatan_Pegawai'], "ID_Kesehatan"=>$data['ID_Kesehatan'], "Nama"=>"$data[Nama]",
		"Bobot_Rawat_Jalan"=>"$data[Bobot_Rawat_Jalan]", "Bobot_Rawat_Inap"=>"$data[Bobot_Rawat_Inap]",
		"Bobot_Tempat_Berobat"=>"$data[Bobot_Tempat_Berobat]", "Bobot_Penyakit"=>"$data[Bobot_Penyakit]"];
		
		$jumlah_baris++;
	}
	
	$hitung_baris_database = count($database);
	
	$i_baris_constraint = 0;
	foreach($database as $d) {
		$i_kesalahan = 1;
		$konci_database = true;
		
		foreach($database as $d2) {
			if($d['Nama'] == $d2['Nama'] && $d['ID_Kesehatan'] != $d2['ID_Kesehatan']) {
				/*
				echo "if($d[Nama] == $d2[Nama] && $d[ID_Kesehatan] != $d2[ID_Kesehatan]) { masuk <br>";
				echo "if($i_kesalahan == $hitung_baris_database) { <br>";
				echo "i_baris_constraint = $i_baris_constraint <br>";
				*/
				
				if(!empty($ml_constraint[$i_baris_constraint])) unset($ml_constraint[$i_baris_constraint]);
				
				$ml_constraint[$i_baris_constraint] = [0=>['ID_Kesehatan'=>"$d[ID_Kesehatan]", 'Nama'=>"$d[Nama]", 'baris_ke'=>$d['baris_ke']], 1=>['ID_Kesehatan'=>"$d2[ID_Kesehatan]", 'Nama'=>"$d2[Nama]", 'baris_ke'=>$d2['baris_ke']]];
				$cl_constraint[$i_baris_constraint] = [];
				
				$konci_database = false;
				
				
				/*
				var_dump($ml_constraint);
				echo "<br><br>";
				$array_keys = array_keys($ml_constraint);
				var_dump($array_keys);
				echo "<br><br>";
				var_dump($ml_constraint[0]);
				echo "<br><br>";
				var_dump($ml_constraint[8]);
				echo "<br><br>";
				echo "<br>";
				*/
				
				//if($i_baris_constraint == 8) die();
			}
			else {
				$i_kesalahan++;
			}
			
			if($i_kesalahan > $hitung_baris_database && $konci_database) {
				/*
				echo "i_baris_constraint = $i_baris_constraint keluar <br>";
				echo "if($i_kesalahan == $hitung_baris_database) { keluar <br><br>";
				*/
				$ml_constraint[$i_baris_constraint] = [];
				$cl_constraint[$i_baris_constraint] = [];
				break;
			}
		}
		
		$i_baris_constraint++;
	}
	
	/*
	var_dump($cl_constraint);
	echo "<br><br>";
	
	for($i_ml_constraint=0; $i_ml_constraint<count($cl_constraint); $i_ml_constraint++) {
		var_dump($cl_constraint[$i_ml_constraint]);
		echo "<br>";
	}
	echo "<br><br>";
	*/
	
	//var_dump($attribut_array);
	//die();
	$jumlah_kelas = 5;
	$centroid_awal = 11;	
	$nilai_acak = [0.1, 0.4, 0.8, 0.01];
	
	$database_key = array_keys($database[0]);
	unset($database_key[0]);
	unset($database_key[1]);
	unset($database_key[2]);
	$database_key = array_values($database_key);
	//var_dump($database_key);
	
	
	
	
	for($i_centroid_awal=0; $i_centroid_awal<count($database); $i_centroid_awal++) {
		//echo "if($centroid_awal == ".$database[$i_centroid_awal]['ID_Kesehatan'].") { <br>";
		if($centroid_awal == $database[$i_centroid_awal]['ID_Kesehatan']) {
			for($i_centroid_awal2=0; $i_centroid_awal2<count($database_key); $i_centroid_awal2++) {
				$centroid_awal_nilai[] = $database[$i_centroid_awal]["".$database_key[$i_centroid_awal2].""];
				
			}
			
			break;
		}
	}
	
	//echo "centroid_awal = $centroid_awal"; die();	
	///var_dump($centroid_awal_nilai);
	
	$centroid_berikutnya[0] = ['index'=>$centroid_awal, 'nilai'=>$centroid_awal_nilai];
	
	
	
	for($i_jml_kelas=0; $i_jml_kelas<$jumlah_kelas-1; $i_jml_kelas++) {
		if($i_jml_kelas>1) {
			/*
			var_dump($cumulative);
			echo " = cumulative <br><br>";
			var_dump($sigma_euclidean);
			echo " = sigma_euclidean <br><br>";
			var_dump($euclidean);
			echo " = euclidean <br><br>";
			var_dump($result_sd);
			echo " = result_sd <br><br>";
			var_dump($euclidean_k_means);
			echo " = euclidean_k_means <br><br>";
			var_dump($attribut_array);
			echo " = attribut_array <br><br>";
			var_dump($euclidean_kecil_array);
			echo " = euclidean_kecil_array <br><br>";
			var_dump($centroid);
			echo " = centroid <br><br>";
			var_dump($minimum);
			echo " = minimum <br><br>";
			var_dump($maximum);
			echo " = maximum <br><br>";
			
			
			unset($result_sd);
			unset($euclidean_k_means);
			//unset($attribut_array);
			unset($euclidean_kecil_array);	
			unset($centroid);
			unset($minimum);
			unset($maximum);
			*/
		}
		
		/*
		$sum = 0;
		$sd = 0;
		$jumlah_kolom = 4;
		for($i=0; $i<$jumlah_kolom; $i++) {
			for($j=0; $j<$jumlah_baris; $j++) {
				//echo "$j $i <br>";
				$sum += $attribut_array[$j][$i];
				$sum = substr($sum, 0, 10);
				//echo "baris $j kolom $i  : sum = $sum <br>";
			}
			
			
			$mean = substr($sum / $jumlah_baris, 0, 10);
			//echo "<br> mean => $sum / $jumlah_baris = $mean <br>";
			$hitung = 0;
			for($j=0; $j<$jumlah_baris; $j++) {
				//$hitung = !empty($hitung) ? $hitung : 1;
				echo $attribut_array[$j][$i]." - $mean;<br>";
				$hitung += $attribut_array[$j][$i] - $mean;
				//$hitung = substr($hitung, 0, 10);
				//echo "baris $j kolom $i  : hitung => $hitung + (".$attribut_array[$j][$i]." - $mean) = ".substr(($hitung + ($attribut_array[$j][$i] - $mean)), 0, 10)." <br>";
				echo "$hitung <br>";
			}
			
			$max = 0;
			$min = 0;
			$sd = substr($hitung / $jumlah_baris, 0, 10);
			echo "substr($hitung / $jumlah_baris, 0, 10);";
			die();
			//echo "<br> sd => $hitung / $jumlah_baris = $sd <br>";
			for($j=0; $j<$jumlah_baris; $j++) {
				$result_sd[$j][$i] = ($attribut_array[$j][$i] - $mean) / $sd;
				$result_sd[$j][$i] = substr($result_sd[$j][$i], 0, 10);
				
				//$max = $result_sd[$j][$i] > $max ? $result_sd[$j][$i] : $max;
				//$min = $result_sd[$j][$i] < $min ? $result_sd[$j][$i] : $min;
				
				//echo "baris $j kolom $i  : result_sd[$j][$i] => (".$attribut_array[$j][$i]." - $mean) / $sd = ".substr((($attribut_array[$j][$i] - $mean) / $sd), 0, 10)."<br>";
			}
			
			//$maximum[] = $max;
			//$minimum[] = $min;
			
			//echo "MAX  : $max and MIN  : $min <br>";
			
			//echo "<br><br><br>";
		}
	
		//die();
		//var_dump($attribut_array);
		//echo "<br>";
		//var_dump($minimum);
		*/
		
		$id_kesehatan = $i_jml_kelas == 0 ? $centroid_awal : $centroid_berikutnya[$i_jml_kelas]['index'];
		
		$sql = "
			select Bobot_Rawat_Jalan, Bobot_Rawat_Inap, Bobot_Tempat_Berobat, Bobot_Penyakit 
			from konversi_data_kesehatan 
			inner join data_kesehatan_pegawai 
			on 
			konversi_data_kesehatan.id_data_kesehatan_pegawai=data_kesehatan_pegawai.id_data_kesehatan_pegawai 
			where ID_Kesehatan = $id_kesehatan AND
			data_kesehatan_pegawai.input_ke = $input_ke
		";
		
		$hasil = mysqli_query($konek, $sql);
		$centroid[] = mysqli_fetch_assoc($hasil);
		
		//var_dump($sql);
		//var_dump($centroid);
		
		
		// Hitung Centroid berikutnya
		$i_rentang=0;
		for($i=0; $i<$jumlah_baris; $i++) {
			$hitung=0;
			
			$hitung += pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2);
			//echo "hitung=$hitung, pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2)." maka hitung : $hitung <br>";
			
			$hitung += pow(($attribut_array[$i][1] - $centroid[$i_jml_kelas]['Bobot_Rawat_Inap']), 2);
			//echo "hitung=$hitung, pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Bobot_Rawat_Inap']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2)." maka hitung : $hitung <br>";
			
			$hitung += pow(($attribut_array[$i][2] - $centroid[$i_jml_kelas]['Bobot_Tempat_Berobat']), 2);
			//echo "hitung=$hitung, pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Bobot_Tempat_Berobat']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2)." maka hitung : $hitung <br>";
			
			$hitung += pow(($attribut_array[$i][3] - $centroid[$i_jml_kelas]['Bobot_Penyakit']), 2);
			//echo "hitung=$hitung, pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Bobot_Penyakit']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2)." maka hitung : $hitung <br>";
			
			
			/*
			die();
			if($i_jml_kelas == 0) {
				if($i<12) {
					echo "pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Rawat_Jalan']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Rawat_Jalan']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][1] ."-". $centroid[$i_jml_kelas]['Rawat_Inap']."), 2) = ".pow(($attribut_array[$i][1] - $centroid[$i_jml_kelas]['Rawat_Inap']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][2] ."-". $centroid[$i_jml_kelas]['Tempat_Berobat']."), 2) = ".pow(($attribut_array[$i][2] - $centroid[$i_jml_kelas]['Tempat_Berobat']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][3] ."-". $centroid[$i_jml_kelas]['Penyakit']."), 2) = ".pow(($attribut_array[$i][3] - $centroid[$i_jml_kelas]['Penyakit']), 2)." maka hitung : $hitung <br>";
				}
			}
			if($i_jml_kelas > 0) {
				$konci = $i_rentang < 10 ? true : false;
				$rentang = $konci == true ? $centroid_berikutnya[$i_jml_kelas-1]['index'] - 1 : 0;
				
				
				if($i<=$rentang && $i>=$rentang) {
					echo "i_rentang : $i_rentang  centroid_berikutnya[$i_jml_kelas-1]['index'] : ".$centroid_berikutnya[$i_jml_kelas-1]['index']." rentang : $rentang || ";
					
					echo "pow((".$attribut_array[$i][0] ."-". $centroid[$i_jml_kelas]['Rawat_Jalan']."), 2) = ".pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Rawat_Jalan']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][1] ."-". $centroid[$i_jml_kelas]['Rawat_Inap']."), 2) = ".pow(($attribut_array[$i][1] - $centroid[$i_jml_kelas]['Rawat_Inap']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][2] ."-". $centroid[$i_jml_kelas]['Tempat_Berobat']."), 2) = ".pow(($attribut_array[$i][2] - $centroid[$i_jml_kelas]['Tempat_Berobat']), 2)." maka hitung : $hitung ";
					echo "pow((".$attribut_array[$i][3] ."-". $centroid[$i_jml_kelas]['Penyakit']."), 2) = ".pow(($attribut_array[$i][3] - $centroid[$i_jml_kelas]['Penyakit']), 2)." maka hitung : $hitung <br>";
					
					$i_rentang++;
				}
			}
			*/
			
			
			// Menghitung euclidean D(x)^2 = sqrt((Xn - Yn)^2)
			$euclidean[$i_jml_kelas][$i] = sqrt($hitung);
			
		}
		
		
		
		//var_dump($euclidean);
		//die();
		
		
		
		// Hitung D(x)^2 terkecil dari yang sudah ada		
		$euclidean_kecil_array = array();
		$jumlah_euclidean=0;
		for($i=0; $i<$jumlah_baris; $i++) {
			if($i_jml_kelas == 0) {
				$euclidean_kecil_array[] = $euclidean[$i_jml_kelas][$i];
			}
			else if($i_jml_kelas > 0) {
				$euclidean_kecil = $i_jml_kelas == 0 ? $euclidean[0][$i] : $euclidean[0][$i];
				//echo "<td>".$euclidean_kecil."</td> | ";
				for($i_euclidean=1; $i_euclidean<count($euclidean); $i_euclidean++) {
					///echo "baris : $i  if(".$euclidean_kecil." < ".$euclidean[$i_euclidean][$i] .")<br>";
					$euclidean_kecil = $euclidean_kecil < $euclidean[$i_euclidean][$i] ? $euclidean_kecil : $euclidean[$i_euclidean][$i];
					
					if($i_euclidean == count($euclidean)-1) {
						$euclidean_kecil_array[] = $euclidean_kecil;
					}
					//$euclidean_kecil_array[] = $i_euclidean == count($euclidean)-1 ? $euclidean[$i_euclidean][$i] : $euclidean_kecil;
					//if($euclidean[$i_euclidean][$i] < $euclidean_kecil) {
					//$euclidean_kecil = $euclidean[$i_euclidean][$i];
					//echo " euclidean_kecil $euclidean_kecil <br>";
					//}
				}
			}
			
			// Menghitung jumlaha dari euclidean
			//echo "euclidean_kecil_array[$i] = $euclidean_kecil_array[$i] <br>";
			$jumlah_euclidean += $euclidean_kecil_array[$i];
		}
		
		
		//echo "jumlah_euclidean = $jumlah_euclidean <br>";
		//var_dump($euclidean_kecil_array);
		$i=0;
		$cumulative = array();
		$sigma_euclidean = array();
		foreach($euclidean_kecil_array as $e) {
			// Menghitung probabilitas D(x)^2/Sigma D(x)^2
			//echo "$e / $jumlah_euclidean = ".$e / $jumlah_euclidean." <br>";
			$sigma_euclidean[] = $e / $jumlah_euclidean;
			
			// Nilai cumulative dari nilai probabilitas
			//if($i > 0) echo "baris $i - ".$cumulative[($i-1)] ."+". $sigma_euclidean[$i] ." = ". ($cumulative[($i-1)] + $sigma_euclidean[$i])."<br>";
			$cumulative[] = $i == 0 ? $sigma_euclidean[0] : $cumulative[($i-1)] + $sigma_euclidean[$i];
			
			$i++;
		}
		
		//var_dump($cumulative);
		//$random_value = rand(1, 100)/1000;
		//$random_value = rand(1, 100)/100;
		//echo "$i_jml_kelas";
		$random_value = count($nilai_acak) > $i_jml_kelas ? $nilai_acak[$i_jml_kelas] : $random_value;
		$i=0;
		foreach($cumulative as $c) {
			if($c > $random_value) {
				//var_dump($attribut_array[($i-1)]);
				//echo "$c > $random_value<br>";
				//var_dump($database[$i]['ID_Kesehatan']);
				//echo "<br>";
				$centroid_berikutnya[($i_jml_kelas+1)] = ['index'=>$database[$i]['ID_Kesehatan'], 'nilai'=>$attribut_array[$i]];
				
				break;
			}
			$i++;
		}
		
		
		
	
		//var_dump($euclidean);
		//echo $database[0]['ID_Kesehatan'];
		//die();		
		//echo count($euclidean); die();
		
		$centroid_tabel = $i_jml_kelas == 0 ? $centroid_awal : $centroid_berikutnya[$i_jml_kelas]['index'];
		//$nilai_centroid = $i_jml_kelas == 0 ? $centroid : $centroid_berikutnya[($i_jml_kelas-1)]['nilai'];
		//if($i_jml_kelas == 2) die();
		
		
		// Hitung K-Means biasa
		for($i=0; $i<$jumlah_baris; $i++) {
			$hitung_k_means=0;
			
			if($i_jml_kelas == 0) {
				$hitung_k_means += pow(($attribut_array[$i][0] - $centroid[$i_jml_kelas]['Bobot_Rawat_Jalan']), 2);
				$hitung_k_means += pow(($attribut_array[$i][1] - $centroid[$i_jml_kelas]['Bobot_Rawat_Inap']), 2);
				$hitung_k_means += pow(($attribut_array[$i][2] - $centroid[$i_jml_kelas]['Bobot_Tempat_Berobat']), 2);
				$hitung_k_means += pow(($attribut_array[$i][3] - $centroid[$i_jml_kelas]['Bobot_Penyakit']), 2);
			}
			else if($i_jml_kelas > 0) {
				$hitung_k_means += pow(($attribut_array[$i][0] - $centroid_berikutnya[$i_jml_kelas]['nilai'][0]), 2);
				$hitung_k_means += pow(($attribut_array[$i][1] - $centroid_berikutnya[$i_jml_kelas]['nilai'][1]), 2);
				$hitung_k_means += pow(($attribut_array[$i][2] - $centroid_berikutnya[$i_jml_kelas]['nilai'][2]), 2);
				$hitung_k_means += pow(($attribut_array[$i][3] - $centroid_berikutnya[$i_jml_kelas]['nilai'][3]), 2);
			}
			
			// Menghitung euclidean D(x)^2 = sqrt((Xn - Yn)^2)
			$euclidean_k_means[$i_jml_kelas][$i] = sqrt($hitung_k_means);
			
		}
		
		
		//die();		
		//var_dump($centroid_berikutnya);
		
?>


	
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="">
					<?php //echo "i_jml_kelas : tabel-centroid-$i_jml_kelas"; ?>
					<table class="table table-striped table-bordered table-hover" id="tabel-centroid-<?php echo $i_jml_kelas; ?>">
							<tr>
								<td colspan='20' style='text-align:left'>
									Centroid <?php echo "".($i_jml_kelas+1)." : $centroid_tabel"; ?> || 
									Jumlah Euclidean : <?php echo $jumlah_euclidean;?> || 
									<?php
										if(count($nilai_acak) > $i_jml_kelas) {
									?>				
									Random Value : <?php echo $random_value;?> || 
									Index Centroid Berikutnya : <?php echo $centroid_berikutnya[($i_jml_kelas+1)]['index'];?> || 
									Nilai Centroid Berikutnya : <?php echo $centroid_berikutnya[($i_jml_kelas+1)]['nilai'][0]." - ".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][1]." - ".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][2]." - ".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][3]; ?> || 
									<?php
										}
									?>
								</td>
							</tr>
							<tr>
								<th>No</th>
								<th>ID Kesehatan</th>
								<th>Nama</th>
								<th>Rawat Jalan</th>
								<th>Rawat Inap</th>
								<th>Tempat Berobat</th>
								<th>Penyakit</th>
								<?php
									
										for($i=1; $i<count($centroid_berikutnya); $i++) {						
											echo"<th>D".$centroid_berikutnya[$i]['index']."</th>";						
										}
									
								?>
								<th>MIN</th>
								<th>D(x)^2/Sigma D(x)^2</th>
								<th>Cumulative</th>
							</tr>
							
							<?php
								for($i=0; $i<$jumlah_baris; $i++) {
									echo "
										<tr>
											<td>".($i+1)."</td>
											<td>".$database[$i]['ID_Kesehatan']."</td>
											<td>".$database[$i]['Nama']."</td>
											<td>".$database[$i]['Bobot_Rawat_Jalan']."</td>
											<td>".$database[$i]['Bobot_Rawat_Inap']."</td>
											<td>".$database[$i]['Bobot_Tempat_Berobat']."</td>
											<td>".$database[$i]['Bobot_Penyakit']."</td>
											
											
									";
									
									
									$euclidean_array_untuk_database_0 = '';
									$euclidean_array_untuk_database_1 = '';
									$euclidean_array_untuk_database_2 = '';
									$euclidean_array_untuk_database_3 = '';
									$euclidean_array_untuk_database_4 = '';
									
									
									if($i_jml_kelas==0) {
										echo"<td>".$euclidean[($i_jml_kelas)][$i]."</td>";
										$euclidean_array_untuk_database_0 .= $euclidean[($i_jml_kelas)][$i].", ";
									}				
									else if($i_jml_kelas > 0) {
										for($i_euclidean=0; $i_euclidean<count($euclidean)-1; $i_euclidean++) {
											if($i_euclidean==0) {
												echo"<td>".$euclidean[0][$i]."</td>";
												$euclidean_array_untuk_database_0 .= $euclidean[0][$i].", ";
											}
											
											for($i_jml_kelas2=1; $i_jml_kelas2<=$i_jml_kelas; $i_jml_kelas2++) {							
												echo "<td>".$euclidean[$i_jml_kelas2][$i]."</td>";
												
												if($i_jml_kelas == 1)
													$euclidean_array_untuk_database_1 .= "".$euclidean[$i_jml_kelas2][$i].", ";
												if($i_jml_kelas == 2)
													$euclidean_array_untuk_database_2 .= "".$euclidean[$i_jml_kelas2][$i].", ";
												if($i_jml_kelas == 3)
													$euclidean_array_untuk_database_3 .= "".$euclidean[$i_jml_kelas2][$i].", ";
												if($i_jml_kelas == 4)
													$euclidean_array_untuk_database_4 .= "".$euclidean[$i_jml_kelas2][$i].", ";
											}
											
											break;
										}
										
									}
									
									
									
									echo "<td>".$euclidean_kecil_array[$i]."</td>";
									
									
									echo "
											<td>$sigma_euclidean[$i]</td>
											<td>".$cumulative[($i)]."</td>
										</tr>
									";
									
									
									$sql_centroid = "insert into hasil_clustering_c".($i_jml_kelas+1)." values (
										'',
										$input_ke,
										$centroid_tabel,
										$jumlah_euclidean,
										$random_value,
										".$centroid_berikutnya[($i_jml_kelas+1)]['index'].",
										".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][0].",
										".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][1].",
										".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][2].",
										".$centroid_berikutnya[($i_jml_kelas+1)]['nilai'][3].",
										".$database[$i]['ID_Kesehatan'].",
										'".$database[$i]['Nama']."',
										".$database[$i]['Bobot_Rawat_Jalan'].",
										".$database[$i]['Bobot_Rawat_Inap'].",
										".$database[$i]['Bobot_Tempat_Berobat'].",
										".$database[$i]['Bobot_Penyakit'].",
										".$euclidean_array_untuk_database_0."
										".$euclidean_array_untuk_database_1."
										".$euclidean_array_untuk_database_2."
										".$euclidean_array_untuk_database_3."
										".$euclidean_array_untuk_database_4."
										".$euclidean_kecil_array[$i].",
										".$sigma_euclidean[$i].",
										".$cumulative[($i)]."											
									);";										
									
									//echo "$sql_centroid <br>";
									if($konci_insert_awal)
										mysqli_query($konek, $sql_centroid);
									
								}
							?>
							
						</tbody>
					</table>
				</div>
				
				
			</div>
			
		</div>
		
	</div>
	
</div>
	
	<br><br>
	
	
	
	
	

<?php
		//if($i_jml_kelas == 0) die();
	
	}
	
	//echo "i_jml_kelas : $i_jml_kelas<br>";
	
	unset($cumulative);
	unset($sigma_euclidean);
	unset($euclidean);
	unset($result_sd);
	unset($euclidean_k_means);
	//unset($attribut_array);
	unset($euclidean_kecil_array);	
	unset($centroid);
	unset($minimum);
	unset($maximum);
	//die();
?>

<div style='margin-bottom:150px'></div>




<h2>Hitung K-Means</h2>

<?php
	$centroid_berikutnya[0] = ["index"=>$centroid_awal, "nilai"=>array($centroid_awal_nilai[0], $centroid_awal_nilai[1], $centroid_awal_nilai[2], $centroid_awal_nilai[3])];
	
	unset($centroid_berikutnya[5]);
	
	/*
	for($i=0; $i<count($centroid_berikutnya); $i++) {
		echo "Centroid ".($i+1)." : ".$centroid_berikutnya[$i]['index']." {";
		for($i2=0; $i2<count($centroid_berikutnya[$i]['nilai']); $i2++) {
			echo "".$centroid_berikutnya[$i]['nilai'][$i2]."";
			if($i2<count($centroid_berikutnya[$i]['nilai'])-1) echo ", ";
		}
		echo "}<br>";
	}
	*/
	
	
	
	// Hitung K-Means
	$kluster = array();
	$per_kluster = array();
	$pola = array();
	//for($i_iterasi=0; $i_iterasi<$jumlah_baris^2; $i_iterasi++) {
	for($i_iterasi=0; $i_iterasi<10; $i_iterasi++) {
		if($i_iterasi>1) {
			//var_dump($kluster);
			//echo "<br><br>";
			
			unset($kluster[($i_iterasi-2)]);
			unset($kluster_ori[($i_iterasi-2)]);
			unset($per_kluster[($i_iterasi-2)]);
			unset($per_kluster_ori[($i_iterasi-2)]);			
			unset($nk_backup[($i_iterasi-2)]);
			unset($next_cluster[($i_iterasi-2)]);

			//var_dump($kluster);
			//echo "<br><br>";
		}
		
		$euclidean_k_means = array();
		$euclidean_kecil_urutan_array = array();
		$euclidean_kecil_array = array();
		
		for($i=0; $i<$jumlah_baris; $i++) {
			for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
				$hitung_k_means=0;
				//echo "Baris ke-$i_jml_kelas <br>";;
				
				if($i_iterasi == 0) {
					//echo "C $i_jml_kelas <br>";
					$hitung_k_means += pow(($attribut_array[$i][0] - $centroid_berikutnya[$i_jml_kelas]['nilai'][0]), 2);
					//echo "pow((".$attribut_array[$i][0]." - ".$centroid_berikutnya[$i_jml_kelas]['nilai'][0]."), 2) <br>";
					$hitung_k_means += pow(($attribut_array[$i][1] - $centroid_berikutnya[$i_jml_kelas]['nilai'][1]), 2);
					//echo "pow((".$attribut_array[$i][1]." - ".$centroid_berikutnya[$i_jml_kelas]['nilai'][1]."), 2) <br>";
					$hitung_k_means += pow(($attribut_array[$i][2] - $centroid_berikutnya[$i_jml_kelas]['nilai'][2]), 2);
					//echo "pow((".$attribut_array[$i][2]." - ".$centroid_berikutnya[$i_jml_kelas]['nilai'][2]."), 2) <br>";
					$hitung_k_means += pow(($attribut_array[$i][3] - $centroid_berikutnya[$i_jml_kelas]['nilai'][3]), 2);
					//echo "pow((".$attribut_array[$i][3]." - ".$centroid_berikutnya[$i_jml_kelas]['nilai'][3]."), 2) <br>";
					
					
					// Menghitung euclidean D(x)^2 = sqrt((Xn - Yn)^2)
					$euclidean_k_means[$i][$i_jml_kelas] = sqrt($hitung_k_means);
					$euclidean_kecil_urutan_array[$i][$i_jml_kelas] = sqrt($hitung_k_means);
					//echo "euclidean_k_means[$i][$i_jml_kelas] : ". $euclidean_k_means[$i][$i_jml_kelas] ."<br>";
				}
				else {
					//echo "C $i_jml_kelas <br>";
					$hitung_k_means += pow(($attribut_array[$i][0] - $next_cluster[($i_iterasi-1)][$i_jml_kelas][0]), 2);
					$hitung_k_means += pow(($attribut_array[$i][1] - $next_cluster[($i_iterasi-1)][$i_jml_kelas][1]), 2);
					$hitung_k_means += pow(($attribut_array[$i][2] - $next_cluster[($i_iterasi-1)][$i_jml_kelas][2]), 2);
					$hitung_k_means += pow(($attribut_array[$i][3] - $next_cluster[($i_iterasi-1)][$i_jml_kelas][3]), 2);
					
					/*
					if($i_jml_kelas == 4) {
						var_dump($next_cluster); echo "<br>";
						echo "pow((".$attribut_array[$i][0]." - ".$next_cluster[($i_iterasi-1)][$i_jml_kelas][0]."), 2) <br>";
						echo "pow((".$attribut_array[$i][1]." - ".$next_cluster[($i_iterasi-1)][$i_jml_kelas][1]."), 2) <br>";
						echo "pow((".$attribut_array[$i][2]." - ".$next_cluster[($i_iterasi-1)][$i_jml_kelas][2]."), 2) <br>";
						echo "pow((".$attribut_array[$i][3]." - ".$next_cluster[($i_iterasi-1)][$i_jml_kelas][3]."), 2) <br><br>";
					}
					*/
					
					// Menghitung euclidean D(x)^2 = sqrt((Xn - Yn)^2)
					$euclidean_k_means[$i][$i_jml_kelas] = sqrt($hitung_k_means);
					$euclidean_kecil_urutan_array[$i][$i_jml_kelas] = sqrt($hitung_k_means);
					//echo "euclidean_k_means[$i][$i_jml_kelas] : ". $euclidean_k_means[$i][$i_jml_kelas] ."<br>";
				}
			}
			
			
			
			
			
			
			// Hitung D(x)^2 terkecil dari yang sudah ada		
			//$euclidean_kecil_array = array();
			$jumlah_euclidean=0;
			$euclidean_kecil = $euclidean_k_means[$i][0];	
			
			for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
				$euclidean_kecil = $euclidean_kecil < $euclidean_k_means[$i][$i_jml_kelas] ? $euclidean_kecil : $euclidean_k_means[$i][$i_jml_kelas];
				
				if($i_jml_kelas == count($centroid_berikutnya)-1) {
					$euclidean_kecil_array[] = $euclidean_kecil;					
				}
			}
			
			
			
			
			
			// Assign member to cluster with usual K-Means
			$konci_assign_member = 'true';
			for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
				$assign_member = $euclidean_kecil_array[$i] == $euclidean_k_means[$i][$i_jml_kelas] ? 'true' : 'false';
				$assign_member2 = $euclidean_kecil_array[$i] == $euclidean_k_means[$i][$i_jml_kelas] ? 'true' : 'false';
				
				
				if($i_jml_kelas == 3) {
					//echo "assign_member2 = $assign_member2 - ".$euclidean_kecil_array[$i]." = ".$euclidean_k_means[$i][$i_jml_kelas]."<br>";
					//echo $assign_member2." == true && $konci_assign_member == true,  $i_jml_kelas==".(count($centroid_berikutnya)-2) ."<br>";					
				}
				
				if($assign_member == 'true' && $konci_assign_member == 'true') {
					/*
					if($i_jml_kelas == 4) {
						echo "assign_members = $assign_member - ".$euclidean_kecil_array[$i]." = ".$euclidean_k_means[$i][$i_jml_kelas]."<br>";
					}
					*/
					// echo $euclidean_kecil_array[$i]." == ".$euclidean_k_means[$i][$i_jml_kelas]."<br>";
					$kluster[$i_iterasi][] = ["cluster"=>$i_jml_kelas, "ID_Kesehatan"=>$database_backup[$i]['ID_Kesehatan'], "nilai_min"=>$euclidean_k_means[$i][$i_jml_kelas], "baris_ke"=>$i];
					$kluster_ori[$i_iterasi][] = ["cluster"=>$i_jml_kelas, "ID_Kesehatan"=>$database_backup[$i]['ID_Kesehatan'], "nilai_min"=>$euclidean_k_means[$i][$i_jml_kelas], "baris_ke"=>$i];
					$per_kluster[$i_iterasi][$i_jml_kelas][] = !empty($database_backup[$i]['ID_Kesehatan']) ? $database_backup[$i]['ID_Kesehatan'] : '';
					$per_kluster_ori[$i_iterasi][$i_jml_kelas][] = !empty($database_backup[$i]['ID_Kesehatan']) ? $database_backup[$i]['ID_Kesehatan'] : '';
					//$per_kluster_ori[$i_iterasi][$i_jml_kelas][] = $database_backup[$i]['ID_Kesehatan'];
					
					$konci_assign_member = 'false';
				}
				
				
				if($i_jml_kelas==count($centroid_berikutnya)-1 && empty($per_kluster[$i_iterasi][$i_jml_kelas]) && $i_jml_kelas == 3) {
					echo "if($i_jml_kelas==".(count($centroid_berikutnya)-1)." && empty(".$per_kluster[$i_iterasi][3].")) { <br>";
				}
				
				/*
				//echo "$i_jml_kelas==".(count($centroid_berikutnya)-1)."<br>";
				if($i_jml_kelas==count($centroid_berikutnya)-1 && empty($per_kluster[$i_iterasi][$i_jml_kelas])) {
					$per_kluster[$i_iterasi][$i_jml_kelas][0] = 0;
					$per_kluster_ori[$i_iterasi][$i_jml_kelas][0] = 0;
				}
				
				if(!empty($per_kluster[$i_iterasi][3])) {
					var_dump($per_kluster[$i_iterasi][3]);
					echo "<br>";
				}
				
				
				if($assign_member == 'false' && $konci_assign_member == 'false' && $i_jml_kelas==count($centroid_berikutnya)-2) {
					//echo "masuk ke assign_member false <br>";
					$per_kluster[$i_iterasi][$i_jml_kelas][0] = '';
					$per_kluster_ori[$i_iterasi][$i_jml_kelas][0] = '';
					
					$konci_assign_member = 'true';
				}
				*/
			}
			
			
			//echo "<br>";
		}
		
		$key_per_kluster = array_keys($per_kluster[$i_iterasi]);
		
		for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
			//echo "i_jml_kelas=$i_jml_kelas".var_dump($key_per_kluster)."<br><br>";
			if(in_array($i_jml_kelas, $key_per_kluster) == false) {
				$per_kluster[$i_iterasi][$i_jml_kelas][] = 0;
				$per_kluster_ori[$i_iterasi][$i_jml_kelas][] = 0;
			}
		}
		
		//echo var_dump($euclidean_k_means). "= euclidean_k_means <br><br>";
		//echo var_dump($per_kluster_ori). "= per_kluster_ori <br><br>";
		
		
		
		// Urut euclidean dari kecil ke besar di setiap instance
		for($i_euclidean_kecil_urutan_array=0; $i_euclidean_kecil_urutan_array<count($euclidean_kecil_urutan_array); $i_euclidean_kecil_urutan_array++) {
			sort($euclidean_kecil_urutan_array[$i_euclidean_kecil_urutan_array]);			
		}
		
		/*
		echo var_dump($kluster[$i_iterasi]). " = kluster ke $i_iterasi";
		echo "<br><br>";
		echo var_dump($database_backup). " = database_backup";
		echo "<br><br>";
		echo var_dump($per_kluster[$i_iterasi]). " = per_kluster ke $i_iterasi";
		echo "<br><br>";
		echo var_dump($per_kluster). " = per_kluster";
		echo "<br><br>";
		echo var_dump($kluster). " = kluster";
		echo "<br><br>";
		
		if($i_iterasi == 1) {
			echo var_dump($per_kluster[1]). " = per_kluster[1]";
			echo "<br><br>";			
		}
		echo "array_search = ".var_dump(array_search(11, $per_kluster[0][0]));
		die();
		echo var_dump($ml_constraint). " = ml_constraint";
		echo "<br><br>";
		echo var_dump($euclidean_kecil_urutan_array). " = euclidean_kecil_urutan_array";
		echo "<br><br>";
		echo var_dump($euclidean_k_means). " = euclidean_k_means";
		echo "<br><br>";
		
		echo var_dump($per_kluster[0][3]);
		echo "<br><br>";
		var_dump($ml_constraint);
		//var_dump($centroid_berikutnya);
		echo "<br><br><br>";
		*/
		
		
		
		
		// Assign member to cluster with COP-KMeans
		for($i_jumlah_baris=0; $i_jumlah_baris<$jumlah_baris; $i_jumlah_baris++) {
			$konci_ml_constraint = true;
			$konci_cl_constraint = true;
			
			if(count($ml_constraint[$i_jumlah_baris]) > 0) {
				for($i_ml_constraint=0; $i_ml_constraint<count($ml_constraint); $i_ml_constraint++) {
					if($konci_ml_constraint == false) {
						//echo "keluar <br><br>";
						break;
					}
					
					$ml_c = $ml_constraint[$i_jumlah_baris];
					//var_dump($ml_constraint[$i_jumlah_baris]);
					
					$used_nilai_min = array();
					$konci_assign_cop = true;
					$kluster_yang_dicari = '';
					
					//echo "if(".$kluster[$i_iterasi][$ml_c[0]['baris_ke']]['cluster']." == ".$kluster[$i_iterasi][$ml_c[1]['baris_ke']]['cluster'].") { <br>";
					for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
						if($konci_assign_cop == false) {
							$konci_ml_constraint = false;
							//echo "keluar <br><br>";
							break;
						}
						
						$kluster_1 = $kluster[$i_iterasi][$ml_c[0]['baris_ke']]['cluster'];
						$ID_Kesehatan_database_backup = $database_backup[$ml_c[1]['baris_ke']]['ID_Kesehatan'];
						$kluster_yang_dicari = !isset($kluster_yang_dicari) ? $per_kluster[$i_iterasi][$kluster_yang_dicari] : $per_kluster[$i_iterasi][$kluster_1];
						
						/*
						echo "ID_Kesehatan_database_backup = $ID_Kesehatan_database_backup <br>";
						var_dump($per_kluster[$i_iterasi][$kluster_1]);
						echo "<br>";
						echo "kluster_1 = $kluster_1 <br>";
						echo "kluster_yang_dicari = $kluster_yang_dicari <br>";
						*/
						if(!in_array($ID_Kesehatan_database_backup, $kluster_yang_dicari) == true) {
							//echo "masuk in_array <br>";
							//if($kluster_1 != $kluster_2 && $kluster_2 == $kluster_yang_dicari) {
							$used_nilai_min[] = $kluster[$i_iterasi][$ml_c[0]['baris_ke']]['nilai_min'];
							$hitung_nilai_min = count($used_nilai_min);
						
							
							for($i_euclidean_kecil_urutan_array=0; $i_euclidean_kecil_urutan_array<count($euclidean_kecil_urutan_array[0]); $i_euclidean_kecil_urutan_array++) {
								$konci_used_nilai_min = false;
								$ml_1 = $euclidean_kecil_urutan_array[$ml_c[0]['baris_ke']][$i_euclidean_kecil_urutan_array];
								
								
								
								if(in_array($ml_1, $used_nilai_min) == false) {
									//echo "$ml_1 <br>";
									//if(in_array($ml_1, $euclidean_k_means[$ml_c[0]['baris_ke']]) == true) {
										$kluster_yang_dicari_ = array_search($ml_1, $euclidean_k_means[$ml_c[0]['baris_ke']]);
										/*
										echo "kluster yang dicari =  \$per_kluster[$i_iterasi][$kluster_yang_dicari] <br>";
										var_dump($kluster_yang_dicari);
										echo "<br>";
										
										echo "kluster yang dicari = $kluster_yang_dicari_ <br>";
										*/
										$kluster_yang_dicari = $per_kluster[$i_iterasi][$kluster_yang_dicari_];
										if(!in_array($ID_Kesehatan_database_backup, $kluster_yang_dicari) == false) {
											$kluster[$i_iterasi][$ml_c[0]['baris_ke']]['cluster'] = $kluster_yang_dicari_;
											$kluster[$i_iterasi][$ml_c[0]['baris_ke']]['nilai_min'] = $ml_1;
											
											for($i_per_kluster=0; $i_per_kluster<count($per_kluster[$i_iterasi]); $i_per_kluster++) {
												$cari_key_diarray = array_search($kluster[$i_iterasi][$ml_c[0]['baris_ke']]['ID_Kesehatan'], $per_kluster[$i_iterasi][$i_per_kluster]);
												//echo "cari_key_diarray = |$cari_key_diarray| <br>";
												if(isset($cari_key_diarray)) {
													//echo "masuk ke unset <br>";
													unset($per_kluster[$i_iterasi][$i_per_kluster][$cari_key_diarray]);
													$per_kluster[$i_iterasi][$kluster_yang_dicari_][] = $kluster[$i_iterasi][$ml_c[0]['baris_ke']]['ID_Kesehatan'];
													break;
												}
											}
											
											/*	
											echo "i_jumlah_baris = $i_jumlah_baris <br>";
											echo var_dump($kluster). " = kluster";
											echo "<br><br>";
											echo var_dump($per_kluster). " = per_kluster";
											echo "<br><br>";
											*/
											
											$konci_used_nilai_min = true;
											$konci_assign_cop = false;
										}
										else {
											$used_nilai_min[] = $ml_1;
											/*
											var_dump($used_nilai_min); 								
											echo "<br>";
											*/
										}
										
										
										//echo "masuk ke kluster_yang_dicari<br>";
									//}
								}
								
								if($konci_used_nilai_min == true) {
									//echo "keluar konci_used_nilai_min <br>";
									break;
								}
							}
						}
						else {
							$konci_assign_cop = false;					
						}				
					}
				}
			}
			else {
				false;
			}
			
			
			if(count($cl_constraint[$i_jumlah_baris]) > 0) {
				// CL
			}
			else {
				false;
			}
		}
		
		
		// Next cluster for k-means
		for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
			$nk[$i_jml_kelas] = 0;
			$nk_backup[$i_iterasi][$i_jml_kelas] = 0;
			
			// Hitung nk (jumlah anggota)
			for($i=0; $i<$jumlah_baris; $i++) {				
				if($kluster[$i_iterasi][$i]['cluster'] == $i_jml_kelas) {
					$nk[$i_jml_kelas]++;
					$nk_backup[$i_iterasi][$i_jml_kelas]++;
				}
			}
		}
		
		
		
		// echo var_dump($nk). "= nk";
		//echo "<br>";
		// print_r($attribut_array);
		
		
		for($i_centroid_berikutnya=0; $i_centroid_berikutnya<count($centroid_berikutnya); $i_centroid_berikutnya++) {
			for($i_kolom_attribut=0; $i_kolom_attribut<count($attribut_array[0]); $i_kolom_attribut++) {
				$hitung_anggota = 0;
				for($i=0; $i<$jumlah_baris; $i++) {
				
					if($kluster[$i_iterasi][$i]['cluster'] == $i_centroid_berikutnya) {
						//for($i_kolom_attribut2=0; $i_kolom_attribut2<count($attribut_array[0]); $i_kolom_attribut2++) {
							$hitung_anggota += $attribut_array[$i][$i_kolom_attribut];
							//echo "kluster[$i_iterasi][$i]['cluster']:".$kluster[$i_iterasi][$i]['cluster']."  ||  i:$i || i_kolom_attribut:$i_kolom_attribut =  ".$attribut_array[$i][$i_kolom_attribut]." => $hitung_anggota<br>";
							//die();
						//}
						
						//echo "<br><br>";
					}
				}
				
				if($nk[$i_centroid_berikutnya] != 0)
					$next_cluster[$i_iterasi][$i_centroid_berikutnya][] = $hitung_anggota * 1/$nk[$i_centroid_berikutnya];
				else
					$next_cluster[$i_iterasi][$i_centroid_berikutnya][] = '';
				//echo "$hitung_anggota * 1/$nk[$i_centroid_berikutnya] = ". $hitung_anggota * 1/$nk[$i_centroid_berikutnya] ." <br><br>";
			}
			
			//echo "<hr>";
		}
		
		
		//var_dump($kluster);
		
		
		
		// Cek Convergence
		$status = 0;
		/*
		if($i_iterasi>0) {
			echo "Pola ".($i_iterasi)." <br>";
			echo "Iterasi ".($i_iterasi)." <br>";
			var_dump($nk_backup[($i_iterasi-1)]); echo "<br>";
			echo "Iterasi ".($i_iterasi+1)." <br>";
			var_dump($nk_backup[$i_iterasi]); echo "<br>";
			
			for($i_nk1=0; $i_nk1<count($nk_backup[($i_iterasi-1)]); $i_nk1++) {
				if($nk_backup[($i_iterasi-1)][$i_nk1] == $nk_backup[($i_iterasi)][$i_nk1]) {
					$status++;
					//echo "true <br>";
				}
			}
			
			for($i_nk1=0; $i_nk1<count($nk_backup[($i_iterasi-1)]); $i_nk1++) {
				$pola[($i_iterasi-1)] = [0=>$nk_backup[($i_iterasi-1)], 1=>$nk_backup[$i_iterasi]];
			}
			
			echo "status=$status ".count($nk_backup[($i_iterasi-1)])."<br><br>";
			if($status<count($nk_backup[($i_iterasi-1)]) && $i_iterasi>1) {
				$array_diff = array_diff($pola[($i_iterasi-2)][0], $pola[($i_iterasi-1)][1]);
				
				$status = empty($array_diff) ? count($nk_backup[($i_iterasi-1)]) : 0;
				//var_dump($array_diff);
				//die();
			}
		}
		*/
		
		$status = 0;
		if($i_iterasi > 0) {
			//echo "Pola ".($i_iterasi)." <br>";
			
			
			for($i_jumlah_baris=0; $i_jumlah_baris<$jumlah_baris; $i_jumlah_baris++) {
				/*
				echo "Iterasi ".($i_iterasi)." <br>";
				var_dump($kluster[($i_iterasi-1)][$i_jumlah_baris]); echo "<br>";
				echo "Iterasi ".($i_iterasi+1)." <br>";
				var_dump($kluster[($i_iterasi)][$i_jumlah_baris]); echo "<br>";
				*/
				
				//echo "i_iterasi:$i_iterasi || i_jumlah_baris:$i_jumlah_baris || ".$kluster[($i_iterasi-1)][$i_jumlah_baris]['cluster']." == ".$kluster[$i_iterasi][$i_jumlah_baris]['cluster']."<br>";
				if($kluster[($i_iterasi-1)][$i_jumlah_baris]['cluster'] == $kluster[$i_iterasi][$i_jumlah_baris]['cluster']) {
					$status++;
					//echo "true <br>";
				}
			}
			//echo "status = $status <br>";
			//die();
		}
		
		/*
		if($i_iterasi > 3) {
			die();
		}
		*/
		
		
		
		
	
		//var_dump($kluster[($i_iterasi-1)]);
		//var_dump($kluster);
		//echo "<br><br>";
		//var_dump($euclidean_kecil_array); 
		
		
		
		
		if($status == $jumlah_baris) {
			$string_centroid_1 = '';
			$string_centroid_2 = '';
			$string_centroid_3 = '';
			$string_centroid_4 = '';
			$string_centroid_5 = '';
			
			echo "<div style='margin-bottom:10px'></div>";
	
			echo "<h3>Iterasi ke-".($i_iterasi+1) ."</h3>";
		
			if($i_iterasi == 0) {
				for($i=0; $i<count($centroid_berikutnya); $i++) {
					echo "Centroid ".($i+1)." : ".$centroid_berikutnya[$i]['index']." {";
					for($i2=0; $i2<count($centroid_berikutnya[$i]['nilai']); $i2++) {
						echo "".$centroid_berikutnya[$i]['nilai'][$i2]."";
						if($i2<count($centroid_berikutnya[$i]['nilai'])-1) echo ", ";
					}
					echo "}<br>";
				}
			}
			else {
				$i_iterasi2 = $i_iterasi - 1;
				for($i=0; $i<count($next_cluster[$i_iterasi2]); $i++) {
					//echo count($next_cluster[$i_iterasi2][0])." Centroid ".($i+1)." : {";
					echo " Centroid ".($i+1)." : {";
					for($i2=0; $i2<count($next_cluster[$i_iterasi2][0]); $i2++) {
						echo "".$next_cluster[$i_iterasi2][$i][$i2]."";
						$koma = '';
						if($i2<count($next_cluster[$i_iterasi2][0])-1) echo $koma = ", ";					
						
						if($i == 0)
							$string_centroid_1 .= "".$next_cluster[$i_iterasi2][$i][$i2]."$koma";
						if($i == 1)
							$string_centroid_2 .= "".$next_cluster[$i_iterasi2][$i][$i2]."$koma";
						if($i == 2)
							$string_centroid_3 .= "".$next_cluster[$i_iterasi2][$i][$i2]."$koma";
						if($i == 3)
							$string_centroid_4 .= "".$next_cluster[$i_iterasi2][$i][$i2]."$koma";
						if($i == 4)
							$string_centroid_5 .= "".$next_cluster[$i_iterasi2][$i][$i2]."$koma";
						
					}
					echo "}<br>";
				}
			}
		}
		
		echo "<div style='margin-bottom:10px'></div>";
		$konci_iterasi = $i_iterasi>0 ? count($per_kluster[($i_iterasi-1)]) : count($per_kluster[$i_iterasi]);
		//echo "konci_iterasi = $konci_iterasi <br>";
		//if($status >= $konci_iterasi) {
		if($status == $jumlah_baris) {
			//die();
?>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div class="">
					<table class="table table-striped table-bordered table-hover" id="tabel-hitung-k-means">
						<thead>
							<tr id='top'>
								<th rowspan='2'>No</th>
								<th rowspan='2'>ID Kesehatan</th>
								<th rowspan='2'>Nama</th>
								<th rowspan='2'>Rawat Jalan</th>
								<th rowspan='2'>Rawat Inap</th>
								<th rowspan='2'>Tempat Berobat</th>
								<th rowspan='2'>Penyakit</th>
								<th rowspan='2'>C1</th>
								<th rowspan='2'>C2</th>
								<th rowspan='2'>C3</th>
								<th rowspan='2'>C4</th>
								<th rowspan='2'>C5</th>
								<th rowspan='2'>MIN</th>
								<th colspan='5'>Assign with usual K-Means</th>			
								<th colspan='5'>Assign with COP-KMeans</th>
								<th colspan='5'>Gold Standard</th>
							</tr>
							<tr>			
								<th>C1</th>
								<th>C2</th>
								<th>C3</th>
								<th>C4</th>
								<th>C5</th>
								<th>C1</th>
								<th>C2</th>
								<th>C3</th>
								<th>C4</th>
								<th>C5</th>
								<th>C1</th>
								<th>C2</th>
								<th>C3</th>
								<th>C4</th>
								<th>C5</th>
							</tr>
						</thead>
						
						<tbody>
		
							<?php
								
								$nama_yang_sama = array();
								$hasil_assign_k_means = array();
								
								for($i=0; $i<$jumlah_baris; $i++) {
									
									$nama_yang_sama[] = $database[$i]['Nama'];
									echo "
										<tr>
											<td>".($i+1)."</td>
											<td>".$database[$i]['ID_Kesehatan']."</td>
											<td>".$database[$i]['Nama']."</td>
											<td>".$database[$i]['Bobot_Rawat_Jalan']."</td>
											<td>".$database[$i]['Bobot_Rawat_Inap']."</td>
											<td>".$database[$i]['Bobot_Tempat_Berobat']."</td>
											<td>".$database[$i]['Bobot_Penyakit']."</td>
									";
									for($i_jml_kelas=0; $i_jml_kelas<count($centroid_berikutnya); $i_jml_kelas++) {
										echo"<td>".$euclidean_k_means[$i][$i_jml_kelas]."</td>";
									}
									
									echo "<td>".$euclidean_kecil_array[$i]."</td>";
									
									for($i_cluster_member=0; $i_cluster_member<count($centroid_berikutnya); $i_cluster_member++) {
										$cluster_member = $kluster_ori[$i_iterasi][$i]['cluster'] == $i_cluster_member ? "OK" : "-";
										$cluster_member_k_means[] = $kluster_ori[$i_iterasi][$i]['cluster'] == $i_cluster_member ? "OK" : "-";
										
										echo "<td>".$cluster_member."</td>";
									}
									for($i_cluster_member=0; $i_cluster_member<count($centroid_berikutnya); $i_cluster_member++) {
										$cluster_member = $kluster[$i_iterasi][$i]['cluster'] == $i_cluster_member ? "OK" : "-";
										$cluster_member_cop_k_means[] = $kluster[$i_iterasi][$i]['cluster'] == $i_cluster_member ? "OK" : "-";
										
										$konci_cop_k_means = $cluster_member == "OK" ? $i_cluster_member : null;
										
										if($cluster_member == "OK") {
											$hasil_assign_k_means[] = [
												'Nama'=>$database[$i]['Nama'],
												'Cluster'=>$i_cluster_member
											];
										}
										
										echo "<td>".$cluster_member."</td>";
									}
									
									$sql_gold_standard = "
										select * from gold_standard 
										where nama = '".$database[$i]['Nama']."'
									";
									//echo "$sql_gold_standard <br><br>";
									$hasil_gold_standard = mysqli_query($konek, $sql_gold_standard);
									$data_gold_standard = mysqli_fetch_assoc($hasil_gold_standard);
									$database_gold_standard = $data_gold_standard['Class'];
									
									
									
									
									for($i_class=0; $i_class<5; $i_class++) {
										$cluster_member = $database_gold_standard == $i_class ? "OK" : "-";
										
										$angka = $i_class + 1;
										
										if($cluster_member == "OK" && $konci_cop_k_means == $i_class) {
											$color = "style='color:blue;'";
										}
										else if($cluster_member == "OK" && $konci_cop_k_means != $i_class)
											$color = "style='color:red;'";
										else
											$color = "style='color:black;'";
										
										echo "<td $color>".$cluster_member." </td>";
									}
									
									
									
									
									echo "
											
										</tr>
									";
									
									
									
									
									
									
									$sql_insert_hasil_hitung_k_means = "insert into hasil_hitung_k_means values (
										'',
										$input_ke,
										".($i_iterasi+1).",
										'$string_centroid_1',
										'$string_centroid_2',
										'$string_centroid_3',
										'$string_centroid_4',
										'$string_centroid_5',
										".$database[$i]['ID_Kesehatan'].",
										'".$database[$i]['Nama']."',
										".$database[$i]['Bobot_Rawat_Jalan'].",
										".$database[$i]['Bobot_Rawat_Inap'].",
										".$database[$i]['Bobot_Tempat_Berobat'].",
										".$database[$i]['Bobot_Penyakit'].",
										".$euclidean_k_means[$i][0].",
										".$euclidean_k_means[$i][1].",
										".$euclidean_k_means[$i][2].",
										".$euclidean_k_means[$i][3].",
										".$euclidean_k_means[$i][4].",
										".$euclidean_kecil_array[$i].",
										'".$cluster_member_k_means[0]."',
										'".$cluster_member_k_means[1]."',
										'".$cluster_member_k_means[2]."',
										'".$cluster_member_k_means[3]."',
										'".$cluster_member_k_means[4]."',
										'".$cluster_member_cop_k_means[0]."',
										'".$cluster_member_cop_k_means[1]."',
										'".$cluster_member_cop_k_means[2]."',
										'".$cluster_member_cop_k_means[3]."',
										'".$cluster_member_cop_k_means[4]."'
									);";
									
									if($konci_insert_awal)
										mysqli_query($konek ,$sql_insert_hasil_hitung_k_means);
									
									//echo "$sql_insert_hasil_hitung_k_means <br>";
									
									unset($cluster_member_k_means);
									unset($cluster_member_cop_k_means);
								}
								
								
								
							?>
		
						</tbody>
					</table>
				</div>
				
				
			</div>
			
		</div>
		
	</div>
	
</div>
	
	
	<div style='margin-bottom:100px'></div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Kesimpulan				
			</h1>
		</div>
	</div>
	
	<?php
		/*
		echo var_dump($database_backup). " = kluster ke $i_iterasi";
		echo "<br><br>";
		echo $kluster[1][0]['cluster'];
		$array_search = array_search(11, $database_backup[0]);
		var_dump($array_search);
		die();
		*/
		
		$jumlah_pegawai_yang_dihitung = 0;
		
		$kualitas_kerja = [
			0=>['string'=>'Sangat Baik', 'numeric'=>0],
			1=>['string'=>'Baik', 'numeric'=>1],
			2=>['string'=>'Biasa', 'numeric'=>2],
			3=>['string'=>'Buruk', 'numeric'=>3],
			4=>['string'=>'Sangat Buruk', 'numeric'=>4]
		];
		
		
		$complete_nilai_tabel_kesimpulan = array();
		for($i_kualitas_kerja=0; $i_kualitas_kerja<count($kualitas_kerja); $i_kualitas_kerja++) {
			$nilai_tabel_kesimpulan = array();
			$tidak_boleh_muncul_lagi = array();
			for($i_kluster=0; $i_kluster<count($kluster[$i_iterasi]); $i_kluster++) {
				
				$konci_tidak_boleh_muncul_lagi = true;
				for($i_tidak_boleh_muncul_lagi=0; $i_tidak_boleh_muncul_lagi<count($tidak_boleh_muncul_lagi); $i_tidak_boleh_muncul_lagi++) {
					if($tidak_boleh_muncul_lagi[$i_tidak_boleh_muncul_lagi] == $database_backup[$i_kluster]['Nama']) {
						$konci_tidak_boleh_muncul_lagi = false;
					}
				}
				
				if($konci_tidak_boleh_muncul_lagi) {
					if($kluster[$i_iterasi][$i_kluster]['cluster'] == $kualitas_kerja[$i_kualitas_kerja]['numeric']) {
						$nilai_tabel_kesimpulan[] = [
							0=>"".$kualitas_kerja[$i_kualitas_kerja]['string']."", 
							1=>"".$database_backup[$i_kluster]['Nama']."",
							2=>"".$database_backup[$i_kluster]['ID_Data_Kesehatan_Pegawai'].""
						];
						
						$tidak_boleh_muncul_lagi[] = $database_backup[$i_kluster]['Nama'];						
					}
					
					//if($i_jml_kelas == 5) die();
				}
				
				//if($i_kluster == 1) die();
			}
			
			//var_dump($nilai_tabel_kesimpulan);
	?>
	
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Kelompok <?php echo $kualitas_kerja[$i_kualitas_kerja]['string']; echo " (".count($nilai_tabel_kesimpulan)." Pegawai)"; ?>
				<?php $jumlah_pegawai_yang_dihitung += count($nilai_tabel_kesimpulan); ?>
			</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div style='width:940px;' class="panel panel-default">
				
				<div style='width:900px;' class="panel-body">
					<div class="">
						<table style='width:900px;' class="table table-striped table-bordered table-hover" id="tabel-kesimpulan-<?php echo $i_kualitas_kerja; ?>">
							<thead>
								<tr id='top'>
									<td>No</td>
									<td>Nama</td>			
								</tr>
							</thead>
							
							<tbody>
								<?php
									$i=1;
									
									for($i_nilai_tabel_kesimpulan=0; $i_nilai_tabel_kesimpulan<count($nilai_tabel_kesimpulan); $i_nilai_tabel_kesimpulan++) {
										$sql_hasil_kesimpulan = "insert into hasil_kesimpulan values (
											'',
											$input_ke,
											'".$nilai_tabel_kesimpulan[$i_nilai_tabel_kesimpulan][0]."',
											$i_kualitas_kerja,
											".count($nilai_tabel_kesimpulan).",
											".$nilai_tabel_kesimpulan[$i_nilai_tabel_kesimpulan][2]."
										)";
										
										if($konci_insert)
											mysqli_query($konek, $sql_hasil_kesimpulan);										
										//echo "$sql_hasil_kesimpulan <br>";
										
										
										echo "
											<tr>
												<td>".$i."</td>
												<td>".$nilai_tabel_kesimpulan[$i_nilai_tabel_kesimpulan][1]."</td>
											</tr>
										";
										
										
										
										
										$i++;
									}
									
								?>
			
							</tbody>
						</table>
					</div>
					
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<?php
		//echo "i_jml_kelas : $i_jml_kelas <br>";
	?>
	
	<script>
		$(document).ready(function() {
			/*
			
			<?php for($i_js=0; $i_js<$i_jml_kelas-2; $i_js++) { ?>
			$('#tabel-centroid-<?php echo $i_js; ?>').DataTable({
					responsive: true
			});
			<?php } ?>
			
			
			$('#tabel-centroid-<?php echo 5; ?>').DataTable({
					responsive: true
			});
			
			$('#tabel-kesimpulan-<?php echo $i_kualitas_kerja; ?>').DataTable({
					responsive: true
			});
			
			<?php
				if($i_kualitas_kerja == 0 ) {
			?>
				$('#tabel-hitung-k-means').DataTable({
						responsive: true
				});
			<?php
				}
			?>
			*/
		});	
	</script>

<?php
				$complete_nilai_tabel_kesimpulan[] = $nilai_tabel_kesimpulan;
			}
		}
		echo "<div style='margin-bottom:70px'></div>";
		
		if($i_iterasi == 0) {
?>
	
			
	
		
<?php
		}
		
			
		if($i_iterasi > 0) {
			//if($status == (count($per_kluster[($i_iterasi-1)]))) {
			if($status == $jumlah_baris) {
				//echo "status = $status <br>";
				//$i_iterasi = $i_jumlah_baris + $i_jumlah_baris;
				
				//var_dump($complete_nilai_tabel_kesimpulan);
				
				$klausa = 'where ';
				foreach($complete_nilai_tabel_kesimpulan as $array_kelompok) {
					if(!empty($array_kelompok)) {
						foreach($array_kelompok as $array_nilai_kelompok) {
							$klausa .= "nama = '".$array_nilai_kelompok[1]."' or ";
						}
					}
				}
				
				//echo "$klausa| <br>";
				$jumlah_huruf = strlen($klausa) - 3;
				$klausa = substr($klausa, 0, $jumlah_huruf);
				//echo "$klausa| <br>";
				
				
				$sql = "select * from gold_standard $klausa $limit";
				//echo "$sql <br><br>";
				$hasil = mysqli_query($konek, $sql);
				while($data = mysqli_fetch_assoc($hasil)) {
					$gold_standard[] = [
						'Class'=>$data['Class'], 
						'Kelompok'=>$data['Kelompok'], 
						'Nama'=>$data['Nama']
					];
				}
				
				
				
				/*
				echo "<br><br> hasil_assign_k_means = ";
				var_dump($hasil_assign_k_means);
				var_dump($gold_standard);
				echo "<br><br>";
				*/
				
				//Menghilangkan data yang Redundan
				foreach($hasil_assign_k_means as $key=>$h) {
					$i_hasil_assign_k_means = 0;
					
					foreach($hasil_assign_k_means as $key2=>$h2) {
						if($h['Nama'] == $h2['Nama'] && $h['Cluster'] == $h2['Cluster']) {
							$i_hasil_assign_k_means++;
							
							if($i_hasil_assign_k_means > 1)
								unset($hasil_assign_k_means[$key]);
						}
					}
				}
				
				
				
				//Hitung Purity
				$hasil_sigma = [
					0=>0,
					1=>0,
					2=>0,
					3=>0,
					4=>0
				];
				
				$array_class = [
					0=>0,
					1=>1,
					2=>2,
					3=>3,
					4=>4
				];
				
				foreach($array_class as $ac) {
					$array_cluster = [
						0=>0,
						1=>0,
						2=>0,
						3=>0,
						4=>0
					];
					
					$i_hasil_assign_k_means = 0;
					
					foreach($hasil_assign_k_means as $hakm) {
						if($hakm['Cluster'] == $ac) {
							foreach($gold_standard as $gs) {				
								//var_dump($hakm);
								//echo "<br>";
								if($hakm['Cluster'] == $gs['Class'] && $hakm['Nama'] == $gs['Nama']) {
									//echo "if(".$hakm['Cluster']." == ".$gs['Class']." && ".$hakm['Nama']." == ".$gs['Nama'].") { <br>";
									//echo "i_hasil_assign_k_means = $i_hasil_assign_k_means <br>";
									//echo "if(".$hakm['Cluster']." == $ac ) { <br>";
									//echo "if(".$hakm['Cluster']." == ".$gs['Class']." && ".$hakm['Nama']." == ".$gs['Nama'].") { <br><br>";
									$array_cluster[$ac]++;							
									
									$sql_sigma = "insert into hasil_purity_pegawai_yang_sama values ('', $input_ke, $ac, $hakm[Cluster], '$gs[Nama]')";
									//echo "$sql_sigma <br>";
									if($konci_insert)
										mysqli_query($konek, $sql_sigma);
									
									$i_hasil_assign_k_means++;
									break;
									//die();				
								}
							}
						}
					}
					
					rsort($array_cluster);
					
					/*
					echo "<br> array_cluster = ";
					var_dump($array_cluster);
					echo "<br><br>";
					*/
					
					$hasil_sigma[$ac] = $array_cluster[0];
				}
				
				//echo "<br><br>";
				//var_dump($hasil_sigma);				
				//echo "<br><br>";
				
				$sigma = '';
				$sigma_max = '';
				foreach($hasil_sigma as $hs) {
					$sigma .= " $hs + ";
					$sigma_max = $hs+$sigma_max;
				}
				$sigma = substr($sigma, 0, -2);
				//echo "sigma = $sigma <br><br>";
				//$limit = empty($limit) ?  $hitung_baris_database : substr($limit, 6);
				
				echo "
					<div class='row'>
						<div class='col-lg-12'>
							<h1 class='page-header'>
								Hitung Akurasi				
							</h1>
						</div>
					</div>
				";
				echo "Purity = 1/$jumlah_pegawai_yang_dihitung X ($sigma) <br><br>";
				echo "Purity = 1/$jumlah_pegawai_yang_dihitung X ( $sigma_max ) <br><br>";
				echo "Purity = $sigma_max/$jumlah_pegawai_yang_dihitung <br><br>";
				$purity = $sigma_max/$jumlah_pegawai_yang_dihitung;
				echo "Purity = $purity <br><br>";
				$keputusan = $purity >= 0.5 ? "<label style='color:blue'>Tepat</label>" : "<label style='color:blue'>Tidak Tepat</label>";
				
				echo "
					<h3>Berdasarkan perhitungan Purity dengan nilai <label style='font-style:bold'>$purity</label>, <br>
					maka perhitungan yang telah dilakukan dianggap $keputusan</>
					</h3>
				<br><br><hr>";
				
				
				
				$sql = "insert into hasil_hitung_purity values(
					'',
					$input_ke,
					$jumlah_pegawai_yang_dihitung,
					$hasil_sigma[0],
					$hasil_sigma[1],
					$hasil_sigma[2],
					$hasil_sigma[3],
					$hasil_sigma[4],
					$purity
				)";
				
				if($konci_insert)
					mysqli_query($konek, $sql);
				
				$penyakit = array();
				$i=1;
				foreach($kualitas_kerja as $kk) {
					$seluruh = array();
					
					echo $sql = "select Nama from hasil_kesimpulan
					inner join data_kesehatan_pegawai
					on hasil_kesimpulan.id_data_kesehatan_pegawai=data_kesehatan_pegawai.id_data_kesehatan_pegawai
					where kelompok = '$kk[string]' AND hasil_kesimpulan.input_ke = $input_ke";
					//where kelompok = '$kk[string]' AND hasil_kesimpulan.input_ke = $input_ke";
					//echo "$sql <br>"; 
					//die();
					$hasil = mysqli_query($konek, $sql);
					

					while($data = mysqli_fetch_assoc($hasil)) {
						$sql2 = "select Nama, Penyakit from data_kesehatan_pegawai where nama = '$data[Nama]' AND input_ke = 1";
						//echo "sql2 = $sql2 <br>";
						$hasil2 = mysqli_query($konek, $sql2);
						
						while($data2 = mysqli_fetch_assoc($hasil2)) {
							$penyakit[] = $data2['Penyakit'];
							
							/*
							$seluruh[] = [
								'Nama'=>"$data2[Nama]",
								'Penyakit'=>"$data2[Penyakit]",
							];
							*/
						}
					}
					
					//echo "i = $i"; die();
					
					
					$penyakit2 = array_count_values($penyakit);
					//unset($penyakit);
					//var_dump($penyakit);
					/*
					if($kk['string'] == 'Baik') {
						echo "<br><hr><br> Kelompok $kk[string] => ";
						var_dump($seluruh);			
						echo "<br><hr><br> Kelompok $kk[string] - penyakit => ";
						var_dump($penyakit2);
					}
					*/
					
					
					
					foreach($penyakit2 as $key=>$jumlah) {
						$sql3 = "insert into hasil_penyakit values(
							'',
							$input_ke,
							'$kk[string]',
							'$key',
							$jumlah
						);";
						//echo "$i - $sql3 <br>";
						if($konci_insert)
							mysqli_query($konek, $sql3);
						
						
						$i++;
					}
					
					//if($kk['string'] == 'Baik') die();
				}
				
				
				
				foreach($kualitas_kerja as $kk) {
					
				?>
				
				
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Kelompok <?php echo $kk['string']; ?>							
						</h1>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div style='width:940px;' class="panel panel-default">
							
							<div style='width:900px;' class="panel-body">
								<div class="">
									<table style='width:900px;' class="table table-striped table-bordered table-hover" id="tabel-kesimpulan-<?php echo $i_kualitas_kerja; ?>">
										<thead>
											<tr id='top'>
												<td>No</td>
												<td>Kelompok</td>
												<td>Penyakit</td>
												<td>Jumlah</td>
												<td>Tindakan Preventif</td>
											</tr>
										</thead>
										
										<tbody>
											<?php
												$i=1;
												$penyakit = array();
												
												
												$sql = "select * from hasil_penyakit where kelompok = '$kk[string]' AND input_ke = $input_ke order by jumlah desc limit 5";
												echo "$sql <br><br>";
												$hasil = mysqli_query($konek, $sql);
												
												while($data = mysqli_fetch_assoc($hasil)) {
													$sql2 = "select Tindakan_Preventif from tindakan_preventif where penyakit = '$data[Penyakit]'";
													$hasil2 = mysqli_query($konek, $sql2);													
													$data2 = mysqli_fetch_assoc($hasil2);
													
													echo "
														<tr>
															<td>".$i."</td>
															<td>".$data['Kelompok']."</td>
															<td>".$data['Penyakit']."</td>
															<td>".$data['Jumlah']."</td>
															<td>".$data2['Tindakan_Preventif']."</td>
														</tr>
													";
													
													$i++;
												}
											?>
						
										</tbody>
									</table>
								</div>
								
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				
				<?php
						}
				
				
				
				echo "<hr>";
				
				$sql = "select now() 'waktu_akhir'";
				$hasil = mysqli_query($konek, $sql);
				$data = mysqli_fetch_assoc($hasil);
				$waktu_akhir = $data['waktu_akhir'];
				echo "Waktu Akhir : $waktu_awal - $waktu_akhir <br><br>";
				
				
				$sql = "select timediff('$waktu_awal', '$waktu_akhir') 'selisih_waktu'";
				$hasil = mysqli_query($konek, $sql);
				$data = mysqli_fetch_assoc($hasil);
				$selisih_waktu = $data['selisih_waktu'];
				echo "selisih_waktu : $selisih_waktu <br><br>";
				
				die();
			}
		}
	}
	
	
	
	
?>



			
 