<?php 
	session_start();
	ob_start();
	include('../konek.php');

	$id_pesanan = $_POST['id_pesanan'];
	$id_customer = $_POST['id_customer'];
	$id_menu = $_POST['id_menu'];
	
	$pelayanan = $_POST['pelayanan'];
	$harga = $_POST['harga'];
	$makanan = $_POST['makanan'];

	//menghitung nilai dari form sebelumnya
	$pelayanan = array_sum($pelayanan)/count($pelayanan);
	$harga = array_sum($harga)/count($harga);
	$makanan = array_sum($makanan)/count($makanan);

	echo "pelayanan = $pelayanan<br>";
	echo "harga = $harga<br>";
	echo "makanan = $makanan<br>";
	
	echo "<br><br>";

	//$pelayanan = array();

	//pelayanan 
	//Buruk
	if ($pelayanan >= 10 && $pelayanan <= 35)
	{
		$u_xp_buruk  = ($pelayanan - 10) / (35-10);
		echo $u_xp_buruk;
		echo " = pelayanan Buruk";
		$pelayanan_array['buruk'] = $u_xp_buruk;
	}
	else if ($pelayanan >= 35 && $pelayanan <= 55)
	{
		$u_xp_buruk  = (55 - $pelayanan) / (55-35);
		echo $u_xp_buruk;
		echo " = pelayanan Buruk";
		$pelayanan_array['buruk'] = $u_xp_buruk;
	}
	else
	{
		$u_xp_buruk = 0;
		echo $u_xp_buruk;
		echo " = pelayanan Buruk";
		$pelayanan_array['buruk'] = $u_xp_buruk;
	}
	echo "<br>";
	
	//pelayanan 
	//Sedang
	if ($pelayanan >= 35 && $pelayanan <= 55)
	{
		$u_xp_sedang  = ($pelayanan - 35 ) / (55-35);
		echo $u_xp_sedang;
		echo " = pelayanan Sedang";
		$pelayanan_array['sedang'] = $u_xp_sedang;
	}
	else if ($pelayanan >= 55 && $pelayanan <= 75)
	{
		$u_xp_sedang = (75 - $pelayanan ) / (75-55);
		echo $u_xp_sedang;
		echo " = pelayanan Sedang";
		$pelayanan_array['sedang'] = $u_xp_sedang;
	}
	else
	{
		$u_xp_sedang = 0;
		echo $u_xp_sedang;
		echo " = pelayanan Sedang";
		$pelayanan_array['sedang'] = $u_xp_sedang;
	}
	echo "<br>";

	//pelayanan 
	//Baik
	if ($pelayanan >= 55 && $pelayanan <= 75)
	{
		$u_xp_baik  = ($pelayanan - 55 ) / (75-55);
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['baik'] = $u_xp_baik;
	}
	else if ($pelayanan >= 75 && $pelayanan <= 100)
	{
		$u_xp_baik = (100 - $pelayanan ) / (100-75);
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['baik'] = $u_xp_baik;
	}
	else
	{
		$u_xp_baik = 0;
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['baik'] = $u_xp_baik;
	}

	echo "<br><br>";
	
	//harga 
	//Buruk
	if ($harga >= 10 && $harga <= 35)
	{
		$u_xd_buruk  = ($harga - 10) / (35-10);
		echo $u_xd_buruk;
		echo " = harga Buruk";
		$harga_array['buruk'] = $u_xd_buruk;
	}
	else if ($harga >= 35 && $harga <= 55)
	{
		$u_xd_buruk  = (55 - $harga) / (55-35);
		echo $u_xd_buruk;
		echo " = harga Buruk";
		$harga_array['buruk'] = $u_xd_buruk;
	}
	else
	{
		$u_xd_buruk = 0;
		echo $u_xd_buruk;
		echo " = harga Buruk";
		$harga_array['buruk'] = $u_xd_buruk;
	}
	echo "<br>";
	
	//harga 
	//Sedang
	if ($harga >= 35 && $harga <= 55)
	{
		$u_xd_sedang  = ($harga - 35 ) / (55-35);
		echo $u_xd_sedang;
		echo " = harga Sedang";
		$harga_array['sedang'] = $u_xd_sedang;
	}
	else if ($harga >= 55 && $harga <= 75)
	{
		$u_xd_sedang = (75 - $harga ) / (75-55);
		echo $u_xd_sedang;
		echo " = harga Sedang";
		$harga_array['sedang'] = $u_xd_sedang;
	}
	else
	{
		$u_xd_sedang = 0;
		echo $u_xd_sedang;
		echo " = harga Sedang";
		$harga_array['sedang'] = $u_xd_sedang;
	}
	echo "<br>";

	//harga 
	//Baik
	if ($harga >= 55 && $harga <= 75)
	{
		$u_xd_baik  = ($harga - 55 ) / (75-55);
		echo $u_xd_baik;
		echo " = harga Baik";
		$harga_array['baik'] = $u_xd_baik;
	}
	else if ($harga >= 75 && $harga <= 100)
	{
		$u_xd_baik = (100 - $harga ) / (100-75);
		echo $u_xd_baik;
		echo " = harga Baik";
		$harga_array['baik'] = $u_xd_baik;
	}
	else
	{
		$u_xd_baik = 0;
		echo $u_xd_baik;
		echo " = harga Baik";
		$harga_array['baik'] = $u_xd_baik;
	}

	echo "<br><br>";
	
	// makanan
	//U buruk
	if ($makanan >= 10 && $makanan <= 35)
	{
		$u_xc_buruk = ($makanan - 10) / (35-10);
		echo $u_xc_buruk;
		echo " = makanan Buruk";
		$makanan_array['buruk'] = $u_xc_buruk;
	}
	else if ($makanan >= 35 && $makanan <= 55)
	{
		$u_xc_buruk  = (55 - $makanan) / (55-35);
		echo $u_xc_buruk;
		echo " = makanan Buruk";
		$makanan_array['buruk'] = $u_xc_buruk;
	}
	else
	{
		$u_xc_buruk = 0;
		echo $u_xc_buruk;
		echo " = makanan Buruk";
		$makanan_array['buruk'] = $u_xc_buruk;
	}
	echo "<br>";
	
	//makanan 
	//Sedang
	if ($makanan >= 35 && $makanan <= 55)
	{
		$u_xc_sedang = ($makanan - 35 ) / (55-35);
		echo $u_xc_sedang;
		echo " = makanan Sedang";
		$makanan_array['sedang'] = $u_xc_sedang;
	}
	else if ($makanan >= 55 && $makanan <= 75)
	{
		$u_xc_sedang = (75 - $makanan ) / (75-55);
		echo $u_xc_sedang;
		echo " = makanan Sedang";
		$makanan_array['sedang'] = $u_xc_sedang;
	}
	else
	{
		$u_xc_sedang = 0;
		echo $u_xc_sedang;
		echo " = makanan Sedang";
		$makanan_array['sedang'] = $u_xc_sedang;
	}
	echo "<br>";

	//makanan 
	//Baik
	if ($makanan >= 55 && $makanan <= 75)
	{
		$u_xc_baik  = ($makanan - 55 ) / (75-55);
		echo $u_xc_baik;
		echo " = makanan Baik";
		$makanan_array['baik'] = $u_xc_baik;
	}
	else if ($makanan >= 75 && $makanan <= 100)
	{
		$u_xc_baik = (100 - $makanan ) / (100-75);
		echo $u_xc_baik;
		echo " = makanan Baik";
		$makanan_array['baik'] = $u_xc_baik;
	}
	else
	{
		$u_xc_baik = 0;
		echo $u_xc_baik;
		echo " = makanan Baik";
		$makanan_array['baik'] = $u_xc_baik;
	}

	echo "<br><br>";

	/*
	echo 'porsiarray = <br>'.var_dump($porsiarray);
	sort($porsiarray);
	echo "<br>";
	echo 'porsiarray = <br>'.var_dump($porsiarray);
	die();
	*/
	/*
	//sort($performance_array);
	echo 'performance_array = ';
	var_dump($performance_array);
	echo "<br><br>";

	//sort($durability_array);
	echo 'durability_array = ';
	var_dump($durability_array);
	echo "<br><br>";

	//sort($conformance_array);
	echo 'conformance_array = ';
	var_dump($conformance_array);
	echo "<br><br>";

	//sort($features_array);
	echo 'features_array = ';
	var_dump($features_array);
	echo "<br><br>";

	//sort($reliability_array);
	echo 'reliability_array = ';
	var_dump($reliability_array);
	echo "<br><br>";

	//sort($aesthetics_array);
	echo 'aesthetics_array = ';
	var_dump($aesthetics_array);
	echo "<br><br>";

	//sort($perceived_quality_array);
	echo 'perceived_quality_array = ';
	var_dump($perceived_quality_array);
	echo "<br><br>";
	*/
	echo "<br>";
	echo "<br>";
	echo "<hr>";

	$pelayanan_ = ['baik', 'sedang', 'buruk'];
	$harga_ = ['baik', 'sedang', 'buruk'];
	$makanan_ = ['baik', 'sedang', 'buruk'];

	$minat_ =['kurang', 'cukup', 'diminati', 'sangat'];

	//string
	foreach($pelayanan_ as $pln) {
		foreach ($harga_ as $hrg) {
			foreach ($makanan_ as $mkn) {
				//w ilangin foreach minat
				$acak = array_rand($minat_);
				$acak_minat = $minat_[$acak];
					$rules_[] = [0=>"$pln", 1=>"$hrg", 2=>"$mkn", 7=>"$acak_minat"];

					//var_dump($rules_);
					//echo "<br>";
			}
		}
	}

	//die();

	//angka
	/*$i = 1;
	foreach($rules_ as $ruls) {
		foreach($ruls as $key=>$ruls_value) {
			if($key == 1)
			$ruls_value;
			
			//echo "<br>";
			if($i == 2)
			
			$i++;
		}
	}*/


	//blm beres => keluar huruf harusnya angka   _udah_
	$i = 1;
	foreach($pelayanan_array as $key_pfmc=>$pfmc) {
		foreach ($harga_array as $key_drblt=>$drblt) {
			foreach ($makanan_array as $key_pcfmc=>$cfmc) {
				$rules = [$pfmc, $drblt, $cfmc];
				sort($rules);
				$min = min($rules);
				$minarray[] = $min;
				
				//echo "No. $i, ";
				//var_dump($rules);
				//echo "<br><br>";
				
				//echo "min = $min<br><br>";
				$i++;
				
			}
		}
	}



	//var_dump($rules_);
	//die();



	//var_dump($rules_);
	echo "<br><br><br>";

	$i=0;
	foreach($rules_ as $rls) {
		//echo $rls[7];
		//echo $i;
		echo ($minarray[$i]);
		echo "<br>";
		//$z = -1 * ($minarray * (75-50)-75);
		
		if ($rls[7] == 'kurang') {
			$z = -1 * (($minarray[$i] * (25-0))-25);
		}
		else if ($rls[7] == 'cukup') {
			$z = -1 * (($minarray[$i] * (50-25))-50);
			//echo "$z = -1 * (($minarray[$i] * (50-25))-50)";
		}	
		else if ($rls[7] == 'diminati') {
			$z = -1 * (($minarray[$i] * (75-50))-50);
		}
		else if ($rls[7] == 'sangat') {
			$z = -1 * (($minarray[$i] * (100-75))-100);
		}
		else{
			$z = 0;
		}
			
		$i++;
		
		$zarray[] = $z;
	}


	//die;
	echo "lewat";

	echo "<br><br>";

	//var_dump($zarray);

	$i=0;
	$hasil1=0;
	$hasil2=0;
	foreach ($minarray as $mnarr) { 
		$hasil1 += $mnarr * $zarray[$i];
		$hasil2 += $mnarr;
		
		$i++;
		//var_dump($hasil1);
		//var_dump($hasil2);
		//echo "<br>";
	}

	if($hasil2 == 0)
		$hasil = 0;
	else
		$hasil = $hasil1 / $hasil2;
		
	echo "$hasil = $hasil1 / $hasil2 <br>";

	echo "z = $hasil <br>";
	//$_SESSION['z'] = $hasil;

	if($hasil > 50) {
		$minat = "Minat";
	}
	else {
		$minat = "Tidak Minat";
	}


	//die;
	$id_customer = $_SESSION['id_customer'];
	$sql = "
		insert into hitung_fuzzy_ values(
		'',
		'$id_menu',
		'$id_customer',
		'$id_pesanan',
		'$pelayanan',
		'$harga',
		'$makanan',
		'$hasil',
		'Sudah Dihitung',
		'$minat'
		)
	";
	echo $sql."<br><br>";
	mysqli_query($konek, $sql);
	//harusnya dr id_menu bukan id_pesanan




	$sql = "
		select count(*) 'jumlah' from hitung_fuzzy_
		where 
		id_menu = '$id_menu'
	";
	echo "$sql <br>";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$jumlah = $data['jumlah'];
	$sigma = $jumlah;

	$sql = "
		select count(*) 'jumlah_minat' from hitung_fuzzy_
		where 
		id_menu = '$id_menu' AND
		status_minat = 'Minat'
	";
	echo "$sql <br>";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$jumlah_minat = $data['jumlah_minat'];

	if($jumlah_minat == 0 || $jumlah == 0)
		$presentase = 0;
	else
		$presentase = $jumlah_minat/$jumlah;
		
	$presentase *= 100;
	echo "presentase=$presentase <br>";

	if($presentase <=50) {
		$minat_database = "tidak";
	}
	else {
		$minat_database = "ya";	
	}

	$sql = "
		select * from presentase
		where 
		id_menu = '$id_menu'
	";
	$hasil = mysqli_query($konek, $sql);
	
	
	
	if(mysqli_num_rows($hasil) < 1) {
		$sql = "insert into presentase values('', '$id_menu', $sigma, $jumlah_minat, $presentase, '$minat_database')";
		mysqli_query($konek, $sql);
	}
	else {
		$data = mysqli_fetch_assoc($hasil);
		$id_presentase = $data['id_presentase'];
		
		$sql = "
			update presentase 
			set 
			sigma = $sigma, 
			jumlah_minat = $jumlah_minat, 
			presentase = $presentase, 
			minat = '$minat_database' 
			where
			id_presentase = $id_presentase;
		";
		mysqli_query($konek, $sql);
	}
	
	echo "$sql <br>";


	
	$sql = "
		update pesanan 
		set 
		status_hitung = 'Sudah Dihitung' 
		where 
		id_menu = '$id_menu' AND
		id_customer = '$id_customer'
	";
	echo $sql;
	mysqli_query($konek, $sql);

	//header("location:end.php");
	die();

?>

