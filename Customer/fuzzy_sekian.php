<?php 
	ob_start();
	session_start();
	include('../konek.php');

	$id_pesanan = $_POST['id_pesanan'];
	$id_customer = $_SESSION['id_customer'];
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
	//Sangat tidak baik
	if ($pelayanan >= 10 && $pelayanan <= 25)
	{
		$u_xp_stb  = ($pelayanan - 10) / (25-10);
		echo $u_xp_stb;
		echo " = pelayanan sangat tidak baik";
		$pelayanan_array['stb'] = $u_xp_stb;
	}
	else if ($pelayanan >= 25 && $pelayanan <= 40)
	{
		$u_xp_stb  = (40 - $pelayanan) / (40-25);
		echo $u_xp_stb;
		echo " = pelayanan sangat tidak baik";
		$pelayanan_array['stb'] = $u_xp_stb;
	}
	else
	{
		$u_xp_stb = 0;
		echo $u_xp_stb;
		echo " = pelayanan sangat tidak baik";
		$pelayanan_array['stb'] = $u_xp_stb;
	}
	echo "<br>";
	
	//pelayanan 
	//Tidak baik
	if ($pelayanan >= 30 && $pelayanan <= 45)
	{
		$u_xp_tb  = ($pelayanan - 30 ) / (45-30);
		echo $u_xp_tb;
		echo " = pelayanan Tidak baik";
		$pelayanan_array['tb'] = $u_xp_tb;
	}
	else if ($pelayanan >= 45 && $pelayanan <= 60)
	{
		$u_xp_tb = (60 - $pelayanan ) / (60-45);
		echo $u_xp_tb;
		echo " = pelayanan Tidak baik";
		$pelayanan_array['tb'] = $u_xp_tb;
	}
	else
	{
		$u_xp_tb = 0;
		echo $u_xp_tb;
		echo " = pelayanan Tidak baik";
		$pelayanan_array['tb'] = $u_xp_tb;
	}
	echo "<br>";

	//pelayanan 
	//Cukup Baik
	if ($pelayanan >= 50 && $pelayanan <= 75)
	{
		$u_xp_cb  = ($pelayanan - 50 ) / (75-50);
		echo $u_xp_cb;
		echo " = pelayanan Cukup Baik";
		$pelayanan_array['cb'] = $u_xp_cb;
	}
	else if ($pelayanan >= 75 && $pelayanan <= 80)
	{
		$u_xp_cb = (80 - $pelayanan ) / (80-75);
		echo $u_xp_cb;
		echo " = pelayanan Cukup Baik";
		$pelayanan_array['cb'] = $u_xp_cb;
	}
	else
	{
		$u_xp_cb = 0;
		echo $u_xp_cb;
		echo " = pelayanan Cukup Baik";
		$pelayanan_array['cb'] = $u_xp_cb;
	}

	echo "<br>";
	
	//pelayanan 
	// Baik
	if ($pelayanan >= 70 && $pelayanan <= 85)
	{
		$u_xp_baik  = ($pelayanan - 70 ) / (85-70);
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['b'] = $u_xp_baik;
	}
	else if ($pelayanan >= 85 && $pelayanan <= 100)
	{
		$u_xp_baik = (100 - $pelayanan ) / (100-85);
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['b'] = $u_xp_baik;
	}
	else
	{
		$u_xp_baik = 0;
		echo $u_xp_baik;
		echo " = pelayanan Baik";
		$pelayanan_array['b'] = $u_xp_baik;
	}
	echo "<br>";
	echo "<br>";
	
	//harga 
	//sangat mahal
	if ($harga >= 10 && $harga <= 25)
	{
		$u_xd_sm  = ($harga - 10) / (25-10);
		echo $u_xd_sm;
		echo " = harga sangat mahal";
		$harga_array['sm'] = $u_xd_sm;
	}
	else if ($harga >= 25 && $harga <= 40)
	{
		$u_xd_sm  = (40 - $harga) / (40-25);
		echo $u_xd_sm;
		echo " = harga sangat mahal";
		$harga_array['sm'] = $u_xd_sm;
	}
	else
	{
		$u_xd_sm = 0;
		echo $u_xd_sm;
		echo " = harga sangat mahal";
		$harga_array['sm'] = $u_xd_sm;
	}
	echo "<br>";
	
	//harga 
	//mahal
	if ($harga >= 30 && $harga <= 45)
	{
		$u_xd_m  = ($harga - 30 ) / (45-30);
		echo $u_xd_m;
		echo " = harga mahal";
		$harga_array['mahal'] = $u_xd_m;
	}
	else if ($harga >= 45 && $harga <= 60)
	{
		$u_xd_m = (60 - $harga ) / (60-45);
		echo $u_xd_m;
		echo " = harga mahal";
		$harga_array['mahal'] = $u_xd_m;
	}
	else
	{
		$u_xd_m = 0;
		echo $u_xd_m;
		echo " = harga mahal";
		$harga_array['mahal'] = $u_xd_m;
	}
	echo "<br>";

	//harga 
	//Cukup Murah
	if ($harga >= 50 && $harga <= 75)
	{
		$u_xd_cm  = ($harga - 50 ) / (75-50);
		echo $u_xd_cm;
		echo " = harga cukup murah";
		$harga_array['cm'] = $u_xd_cm;
	}
	else if ($harga >= 75 && $harga <= 80)
	{
		$u_xd_cm = (80 - $harga ) / (80-75);
		echo $u_xd_cm;
		echo " = harga cukup murah";
		$harga_array['cm'] = $u_xd_cm;
	}
	else
	{
		$u_xd_cm = 0;
		echo $u_xd_cm;
		echo " = harga cukup murah";
		$harga_array['cm'] = $u_xd_cm;
	}

	echo "<br>";
	
	//harga 
	//Murah
	if ($harga >= 70 && $harga <= 85)
	{
		$u_xd_m  = ($harga - 70 ) / (85-70);
		echo $u_xd_m;
		echo " = harga murah";
		$harga_array['murah'] = $u_xd_m;
	}
	else if ($harga >= 85 && $harga <= 100)
	{
		$u_xd_m = (100 - $harga ) / (100-85);
		echo $u_xd_m;
		echo " = harga murah";
		$harga_array['murah'] = $u_xd_m;
	}
	else
	{
		$u_xd_m = 0;
		echo $u_xd_m;
		echo " = harga murah";
		$harga_array['murah'] = $u_xd_m;
	}

	echo "<br><br>";
	
	// makanan
	//sangat tidak berkualitas
	if ($makanan >= 10 && $makanan <= 25)
	{
		$u_xc_stk = ($makanan - 10) / (25-10);
		echo $u_xc_stk;
		echo " = makanan sangat tidak berkualitas";
		$makanan_array['stk'] = $u_xc_stk;
	}
	else if ($makanan >= 25 && $makanan <= 40)
	{
		$u_xc_stk  = (40 - $makanan) / (40-25);
		echo $u_xc_stk;
		echo " = makanan sangat tidak berkualitas";
		$makanan_array['stk'] = $u_xc_stk;
	}
	else
	{
		$u_xc_stk = 0;
		echo $u_xc_stk;
		echo " = makanan sangat tidak berkualitas";
		$makanan_array['stk'] = $u_xc_stk;
	}
	echo "<br>";
	
	//makanan 
	//tidak berkualitas
	if ($makanan >= 30 && $makanan <= 55)
	{
		$u_xc_tk = ($makanan - 30 ) / (45-30);
		echo $u_xc_tk;
		echo " = makanan tidak berkualitas";
		$makanan_array['tk'] = $u_xc_tk;
	}
	else if ($makanan >= 45 && $makanan <= 60)
	{
		$u_xc_tk = (60 - $makanan ) / (60-45);
		echo $u_xc_tk;
		echo " = makanan tidak berkualitas";
		$makanan_array['tk'] = $u_xc_tk;
	}
	else
	{
		$u_xc_tk = 0;
		echo $u_xc_tk;
		echo " = makanan tidak berkualitas";
		$makanan_array['tk'] = $u_xc_tk;
	}
	echo "<br>";

	//makanan 
	//cukup berkualitas
	if ($makanan >= 50 && $makanan <= 75)
	{
		$u_xc_ck  = ($makanan - 50 ) / (75-50);
		echo $u_xc_ck;
		echo " = makanan cukup berkualitas";
		$makanan_array['ck'] = $u_xc_ck;
	}
	else if ($makanan >= 75 && $makanan <= 80)
	{
		$u_xc_ck = (80 - $makanan ) / (80-75);
		echo $u_xc_ck;
		echo " = makanan cukup berkualitas";
		$makanan_array['ck'] = $u_xc_ck;
	}
	else
	{
		$u_xc_ck = 0;
		echo $u_xc_ck;
		echo " = makanan cukup berkualitas";
		$makanan_array['ck'] = $u_xc_ck;
	}

	echo "<br>";

	//makanan 
	//berkualitas
	if ($makanan >= 70 && $makanan <= 85)
	{
		$u_xc_k  = ($makanan - 70 ) / (85-70);
		echo $u_xc_k;
		echo " = makanan berkualitas";
		$makanan_array['k'] = $u_xc_k;
	}
	else if ($makanan >= 85 && $makanan <= 100)
	{
		$u_xc_k = (100 - $makanan ) / (100-85);
		echo $u_xc_k;
		echo " = makanan berkualitas";
		$makanan_array['k'] = $u_xc_k;
	}
	else
	{
		$u_xc_k = 0;
		echo $u_xc_k;
		echo " = makanan berkualitas";
		$makanan_array['k'] = $u_xc_k;
	}

	echo "<br><br>";
	//die();
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
	
	/*
	$pelayanan_ = ['stb', 'tb', 'cb', 'b'];
	$harga_ = ['sm', 'm', 'cm', 'murah'];
	$makanan_ = ['stk', 'tk', 'ck', 'k'];
	*/
	
	$pelayanan_ = ['Sangat Tidak Baik', 'Tidak Baik', 'Cukup Baik', 'Baik'];
	$harga_ = ['Sangat Mahal', 'Mahal', 'Cukup Murah', 'Murah'];
	$makanan_ = ['Sangat Tidak Berkualitas','Tidak Berkualitas','Cukup Berkualitas','Berkualitas'];

	//$kepuasan_ =['sangat tidak puas','tidak puas','cukup puas','puas'];
	$kepuasan_ =['Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas'];

	//string
	$i=1;
	echo "
		<table border='0'>
			<tr>
				<th>No</th>
				<th>Pelayanan</th>
				<th>Harga</th>
				<th>Makanan</th>
				<th>Kepuasan</th>
			</tr>
	";
	foreach($pelayanan_ as $pln) {
		foreach ($harga_ as $hrg) {
			foreach ($makanan_ as $mkn) {
				foreach ($kepuasan_ as $puas) {
					//w ilangin foreach minat
					//$acak = array_rand($kepuasan_);
					//$acak_minat = $kepuasan_[$acak];
					/*
					echo "
						<tr>
							<td>$i</td>
							<td>$pln</td>
							<td>$hrg</td>
							<td>$mkn</td>
							<td>$puas</td>
						</tr>
					";
					*/
					
					$i++;
					
					$rules_[] = [0=>"$pln", 1=>"$hrg", 2=>"$mkn", 3=>"$puas"];
					
					//var_dump($rules_);
					//echo "<br>";
				}
			}
		}
	}
	echo "</table>";
	
	
	


	//angka
	/*$i = 1;
	die();
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
				foreach ($kepuasan_ as $puas) {
					$rules[($i-1)] = [$pfmc, $drblt, $cfmc];
					sort($rules[($i-1)]);
					$min = min($rules[($i-1)]);
					$minarray[] = $min;
				
					//echo "No. $i, ";
					//var_dump($rules);
					//echo "<br><br>";
					
					//echo "min = $min<br><br>";
					$i++;
				}
			}
		}
	}
	
	
	$i_rules = 1;
	foreach($rules_ as $key_r=>$r) {
		$min = $rules[$key_r];
		/*
		var_dump($min);
		die();
		$min = $rules[$key_r];
		
		foreach($min as $min_) {
			
		}
		*/
		
		echo "
			<div>
				(R$i_rules) 
				<b>Jika</b> 
					Pelayanan $r[0], 
					Harga $r[1], 
					Makanan $r[2], 
				<b>Maka</b>  
					$r[3] 
				<br>
				<b>=></b> 
					MIN($min[0]; $min[1]; $min[2])						
				<b>=</b>  
					$minarray[$key_r] 
				<br><br>
			</div>
		";
		
		$i_rules++;
		
	}
	
	echo "<br><br>";
	


	//var_dump($rules_);
	//die();



	//var_dump($rules_);
	echo "<br><br><br>";
	
	//echo "rules_ = ".count($rules_)."<br>";
	//echo  "minarray = ".count($minarray)."<br>";

	
	$i=0;
	foreach($rules_ as $rls) {
		//echo $rls[7];
		//echo $i;
		//echo ($minarray[$i]);
		//echo "<br>";
		//$z = -1 * ($minarray * (75-50)-75);
		
		//echo "No. $i, ";
		
		if ($rls[3] == 'Sangat Tidak Puas') {
			$z = -1 * (($minarray[$i] * (40-10))-40);
			//echo "$z = -1 * (($minarray[$i] * (40-10))-40) <br>";
		}
		else if ($rls[3] == 'Tidak Puas') {
			$z = -1 * (($minarray[$i] * (60-30))-60);
			//echo "$z = -1 * (($minarray[$i] * (60-30))-60) <br>";
			////echo "$z = -1 * (($minarray[$i] * (50-25))-50)";
		}	
		else if ($rls[3] == 'Cukup Puas') {
			$z = -1 * (($minarray[$i] * (80-50))-80);
			//echo "$z = -1 * (($minarray[$i] * (80-50))-80) <br>";
		}
		else if ($rls[3] == 'Puas') {
			$z = -1 * (($minarray[$i] * (100-70))-100);
			//echo "$z = -1 * (($minarray[$i] * (100-70))-100) <br>";
		}
		else{
			$z = 0;
			//echo "$rls[3] $z <br>";
		}
			
		$i++;
		
		$zarray[] = $z;
	}


	//die;
	//echo "lewat";

	echo "<br><br>";

	//var_dump($zarray);

	$i=0;
	$hasil1=0;
	$hasil2=0;
	$hasil1_string='';
	$hasil2_string='';
	
	echo "
		<table>
			<tr>
				<td>(</td>
			</tr>
	";
	foreach ($minarray as $mnarr) { 
		$hasil1_string .= "($mnarr * $zarray[$i]) + ";
		$hasil1 += $mnarr * $zarray[$i];
		$hasil2 += $mnarr;
		$hasil2_string .= " $mnarr +";
		
		echo "
			<tr>
				<td style='padding-left:1em'>No.".($i+1)." =></td>
				<td>($mnarr * $zarray[$i])</td>
				<td>=</td>
				<td>".($mnarr * $zarray[$i])."</td>
			</tr>
		";
		
		$i++;
		//var_dump($hasil1);
		//var_dump($hasil2);
		//echo "<br>";
	}
	echo "
			<tr>
				<td>)</td>
			</tr>
		</table>
	";
	
	$hasil1_string = substr($hasil1_string, 0, -3);
	$hasil2_string = substr($hasil2_string, 0, -1);
	

	if($hasil2 == 0)
		$hasil = 0;
	else
		$hasil = $hasil1 / $hasil2;
		
	echo "($hasil1_string) / ($hasil2_string) <br><br>";
	echo "=> $hasil1 / $hasil2 <br>";
	echo "=> $hasil <br>";
	echo "z = $hasil <br>";
	
	die();
	/*
	echo "$hasil = $hasil1 / $hasil2 <br>";

	echo "z = $hasil <br>";
	//$_SESSION['z'] = $hasil;

	if($hasil > 50) {
		$kepuasan_database = "Minat";
	}
	else {
		$kepuasan_database = "Tidak Minat";
	}
	*/
	
	
	
	if($hasil <=25) {
		$kepuasan_database = "Sangat Tidak Puas";
	}
	else if($hasil >25 && $hasil <= 50) {
		$kepuasan_database = "Tidak Puas";
	}
	else if($hasil >50 && $hasil <= 75) {
		$kepuasan_database = "Cukup Puas";
	}
	else if($hasil > 100) {
		$kepuasan_database = "Puas";	
	}
	
	//$id_customer = $_SESSION['id_customer'];
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
		'$kepuasan_database'
		)
	";
	echo "sql = $sql<br><br>";
	mysqli_query($konek, $sql);
	//harusnya dr id_menu bukan id_pesanan




	$sql = "
		select count(*) 'jumlah' from hitung_fuzzy_
		where 
		id_menu = '$id_menu'
	";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$jumlah = $data['jumlah'];
	$sigma = $jumlah;
	echo "sigma=$sigma, $sql <br>";
	
	
	
	$sql = "
		select SUM(hasil) 'total_hasil', count(*) 'jumlah_baris' from hitung_fuzzy_
		where 
		id_menu = '$id_menu' AND
		tingkat_kepuasan = 'cukup puas' or
		tingkat_kepuasan = 'puas'
	";
	echo "$sql <br>";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$total_hasil = $data['total_hasil'];
	$jumlah_baris = $data['jumlah_baris'];

	if($total_hasil == 0 || $jumlah_baris == 0)
		$presentase = 0;
	else
		$presentase = $total_hasil/$jumlah_baris;
		
	//$presentase *= 100;
	echo "presentase=$presentase <br>";

	if($presentase <60) {
		$kepuasan_database = "Cukup Puas";
	}
	else {
		$kepuasan_database = "Puas";	
	}
	
	//echo "minat = $kepuasan_database";
	
	
	
	
	$sql = "
		select * from presentase
		where 
		id_menu = '$id_menu' and
		tingkat_kepuasan = '$kepuasan_database'
	";
	$hasil = mysqli_query($konek, $sql);
	
	
	
	if(mysqli_num_rows($hasil) < 1) {
		$sql = "insert into presentase values('', '$id_menu', $sigma, $jumlah_baris, $presentase, '$kepuasan_database')";
		//echo "$sql <br>";
		mysqli_query($konek, $sql);
	}
	else {
		$data = mysqli_fetch_assoc($hasil);
		$id_presentase = $data['id_presentase'];
		
		$sql = "
			update presentase 
			set 
			sigma = $sigma, 
			jumlah_kepuasan = $jumlah_baris, 
			presentase = $presentase, 
			tingkat_kepuasan = '$kepuasan_database' 
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

	die();
	header("location:pesanan.php");

?>

