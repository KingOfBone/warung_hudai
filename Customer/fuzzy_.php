<?php 

	include('../konek.php');

	$id_pesanan = $_POST['id_pesanan'];
	$performance = $_POST['performance'];
	$durability = $_POST['durability'];
	$conformance = $_POST['conformance'];
	$features = $_POST['features'];
	$reliability = $_POST['reliability'];
	$aesthetics = $_POST['aesthetics'];
	$perceived_quality = $_POST['perceived_quality'];


	$performance = array_sum($performance)/count($performance);
	$durability = array_sum($durability)/count($durability);
	$conformance = array_sum($conformance)/count($conformance);
	$features = array_sum($features)/count($features);
	$reliability = array_sum($reliability)/count($reliability);
	$aesthetics = array_sum($aesthetics)/count($aesthetics);
	$perceived_quality = array_sum($perceived_quality)/count($perceived_quality);



	echo "performance = $performance<br>";
	echo "durability = $durability<br>";
	echo "conformance = $conformance<br>";
	echo "features = $features<br>";
	echo "reliability = $reliability<br>";
	echo "aesthetics = $aesthetics<br>";
	echo "perceived_quality = $perceived_quality<br><br>";


	$performance_array = array();

	//Performance 
	//Buruk
	if ($performance >= 10 && $performance <= 35)
	{
		$u_xp_buruk  = ($performance - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = Performance Buruk";
		$performance_array['buruk'] = $u_xr_buruk;
	}
	else if ($performance >= 35 && $performance <= 55)
	{
		$u_xr_buruk  = (55 - $performance) / (55-35);
		echo $u_xr_buruk;
		echo " = Performance Buruk";
		$performance_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = Performance Buruk";
		$performance_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//Performance 
	//Sedang
	if ($performance >= 35 && $performance <= 55)
	{
		$u_xr_sedang  = ($performance - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = Performance Sedang";
		$performance_array['sedang'] = $u_xr_sedang;
	}
	else if ($performance >= 55 && $performance <= 75)
	{
		$u_xr_sedang = (75 - $performance ) / (75-55);
		echo $u_xr_sedang;
		echo " = Performance Sedang";
		$performance_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = Performance Sedang";
		$performance_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//Performance 
	//Baik
	if ($performance >= 55 && $performance <= 75)
	{
		$u_xr_baik  = ($performance - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = Performance Baik";
		$performance_array['buruk'] = $u_xr_baik;
	}
	else if ($performance >= 75 && $performance <= 100)
	{
		$u_xr_baik = (100 - $performance ) / (100-75);
		echo $u_xr_baik;
		echo " = Performance Baik";
		$performance_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = Performance Baik";
		$performance_array['buruk'] = $u_xr_baik;
	}

	echo "<br><br>";
	

	
	
	//Durability 
	//Buruk
	if ($durability >= 10 && $durability <= 35)
	{
		$u_xr_buruk  = ($durability - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = durability Buruk";
		$durability_array['buruk'] = $u_xr_buruk;
	}
	else if ($durability >= 35 && $durability <= 55)
	{
		$u_xr_buruk  = (55 - $durability) / (55-35);
		echo $u_xr_buruk;
		echo " = durability Buruk";
		$durability_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = durability Buruk";
		$durability_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//durability 
	//Sedang
	if ($durability >= 35 && $durability <= 55)
	{
		$u_xr_sedang  = ($durability - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = durability Sedang";
		$durability_array['sedang'] = $u_xr_sedang;
	}
	else if ($durability >= 55 && $durability <= 75)
	{
		$u_xr_sedang = (75 - $durability ) / (75-55);
		echo $u_xr_sedang;
		echo " = durability Sedang";
		$durability_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = durability Sedang";
		$durability_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//durability 
	//Baik
	if ($durability >= 55 && $durability <= 75)
	{
		$u_xr_baik  = ($durability - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = durability Baik";
		$durability_array['buruk'] = $u_xr_baik;
	}
	else if ($durability >= 75 && $durability <= 100)
	{
		$u_xr_baik = (100 - $durability ) / (100-75);
		echo $u_xr_baik;
		echo " = durability Baik";
		$durability_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = durability Baik";
		$durability_array['buruk'] = $u_xr_baik;
	}

	echo "<br><br>";
	

	
	
	
	// Conformance
	//U buruk
	if ($conformance >= 10 && $conformance <= 35)
	{
		$u_xr_buruk  = ($conformance - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = conformance Buruk";
		$conformance_array['buruk'] = $u_xr_buruk;
	}
	else if ($conformance >= 35 && $conformance <= 55)
	{
		$u_xr_buruk  = (55 - $conformance) / (55-35);
		echo $u_xr_buruk;
		echo " = conformance Buruk";
		$conformance_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = conformance Buruk";
		$conformance_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//conformance 
	//Sedang
	if ($conformance >= 35 && $conformance <= 55)
	{
		$u_xr_sedang  = ($conformance - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = conformance Sedang";
		$conformance_array['sedang'] = $u_xr_sedang;
	}
	else if ($conformance >= 55 && $conformance <= 75)
	{
		$u_xr_sedang = (75 - $conformance ) / (75-55);
		echo $u_xr_sedang;
		echo " = conformance Sedang";
		$conformance_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = conformance Sedang";
		$conformance_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//conformance 
	//Baik
	if ($conformance >= 55 && $conformance <= 75)
	{
		$u_xr_baik  = ($conformance - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = conformance Baik";
		$conformance_array['buruk'] = $u_xr_baik;
	}
	else if ($conformance >= 75 && $conformance <= 100)
	{
		$u_xr_baik = (100 - $conformance ) / (100-75);
		echo $u_xr_baik;
		echo " = conformance Baik";
		$conformance_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = conformance Baik";
		$conformance_array['buruk'] = $u_xr_baik;
	}

echo "<br><br>";







//Features
//Murah
	if ($features >= 10 && $features <= 35)
	{
		$u_xr_buruk  = ($features - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = features Buruk";
		$features_array['buruk'] = $u_xr_buruk;
	}
	else if ($features >= 35 && $features <= 55)
	{
		$u_xr_buruk  = (55 - $features) / (55-35);
		echo $u_xr_buruk;
		echo " = features Buruk";
		$features_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = features Buruk";
		$features_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//features 
	//Sedang
	if ($features >= 35 && $features <= 55)
	{
		$u_xr_sedang  = ($features - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = features Sedang";
		$features_array['sedang'] = $u_xr_sedang;
	}
	else if ($features >= 55 && $features <= 75)
	{
		$u_xr_sedang = (75 - $features ) / (75-55);
		echo $u_xr_sedang;
		echo " = features Sedang";
		$features_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = features Sedang";
		$features_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//features 
	//Baik
	if ($features >= 55 && $features <= 75)
	{
		$u_xr_baik  = ($features - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = features Baik";
		$features_array['buruk'] = $u_xr_baik;
	}
	else if ($features >= 75 && $features <= 100)
	{
		$u_xr_baik = (100 - $features ) / (100-75);
		echo $u_xr_baik;
		echo " = features Baik";
		$features_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = features Baik";
		$features_array['buruk'] = $u_xr_baik;
	}

echo "<br><br>";






//Reliability
//U kurang
	if ($reliability >= 10 && $reliability <= 35)
	{
		$u_xr_buruk  = ($reliability - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = reliability Buruk";
		$reliability_array['buruk'] = $u_xr_buruk;
	}
	else if ($reliability >= 35 && $reliability <= 55)
	{
		$u_xr_buruk  = (55 - $reliability) / (55-35);
		echo $u_xr_buruk;
		echo " = reliability Buruk";
		$reliability_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = reliability Buruk";
		$reliability_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//reliability 
	//Sedang
	if ($reliability >= 35 && $reliability <= 55)
	{
		$u_xr_sedang  = ($reliability - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = reliability Sedang";
		$reliability_array['sedang'] = $u_xr_sedang;
	}
	else if ($reliability >= 55 && $reliability <= 75)
	{
		$u_xr_sedang = (75 - $reliability ) / (75-55);
		echo $u_xr_sedang;
		echo " = reliability Sedang";
		$reliability_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = reliability Sedang";
		$reliability_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//reliability 
	//Baik
	if ($reliability >= 55 && $reliability <= 75)
	{
		$u_xr_baik  = ($reliability - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = reliability Baik";
		$reliability_array['buruk'] = $u_xr_baik;
	}
	else if ($reliability >= 75 && $reliability <= 100)
	{
		$u_xr_baik = (100 - $reliability ) / (100-75);
		echo $u_xr_baik;
		echo " = reliability Baik";
		$reliability_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = reliability Baik";
		$reliability_array['buruk'] = $u_xr_baik;
	}

echo "<br><br>";





//Aesthetics
//U kurang
	if ($aesthetics >= 10 && $aesthetics <= 35)
	{
		$u_xr_buruk  = ($aesthetics - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = aesthetics Buruk";
		$aesthetics_array['buruk'] = $u_xr_buruk;
	}
	else if ($aesthetics >= 35 && $aesthetics <= 55)
	{
		$u_xr_buruk  = (55 - $aesthetics) / (55-35);
		echo $u_xr_buruk;
		echo " = aesthetics Buruk";
		$aesthetics_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = aesthetics Buruk";
		$aesthetics_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//aesthetics 
	//Sedang
	if ($aesthetics >= 35 && $aesthetics <= 55)
	{
		$u_xr_sedang  = ($aesthetics - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = aesthetics Sedang";
		$aesthetics_array['sedang'] = $u_xr_sedang;
	}
	else if ($aesthetics >= 55 && $aesthetics <= 75)
	{
		$u_xr_sedang = (75 - $aesthetics ) / (75-55);
		echo $u_xr_sedang;
		echo " = aesthetics Sedang";
		$aesthetics_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = aesthetics Sedang";
		$aesthetics_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//aesthetics 
	//Baik
	if ($aesthetics >= 55 && $aesthetics <= 75)
	{
		$u_xr_baik  = ($aesthetics - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = aesthetics Baik";
		$aesthetics_array['buruk'] = $u_xr_baik;
	}
	else if ($aesthetics >= 75 && $aesthetics <= 100)
	{
		$u_xr_baik = (100 - $aesthetics ) / (100-75);
		echo $u_xr_baik;
		echo " = aesthetics Baik";
		$aesthetics_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = aesthetics Baik";
		$aesthetics_array['buruk'] = $u_xr_baik;
	}

echo "<br><br>";





//Perceived_quality
//U kurang
	if ($perceived_quality >= 10 && $perceived_quality <= 35)
	{
		$u_xr_buruk  = ($perceived_quality - 10) / (35-10);
		echo $u_xr_buruk;
		echo " = perceived_quality Buruk";
		$perceived_quality_array['buruk'] = $u_xr_buruk;
	}
	else if ($perceived_quality >= 35 && $perceived_quality <= 55)
	{
		$u_xr_buruk  = (55 - $perceived_quality) / (55-35);
		echo $u_xr_buruk;
		echo " = perceived_quality Buruk";
		$perceived_quality_array['buruk'] = $u_xr_buruk;
	}
	else
	{
		$u_xr_buruk = 0;
		echo $u_xr_buruk;
		echo " = perceived_quality Buruk";
		$perceived_quality_array['buruk'] = $u_xr_buruk;
	}
	echo "<br>";
	
	//perceived_quality 
	//Sedang
	if ($perceived_quality >= 35 && $perceived_quality <= 55)
	{
		$u_xr_sedang  = ($perceived_quality - 35 ) / (55-35);
		echo $u_xr_sedang;
		echo " = perceived_quality Sedang";
		$perceived_quality_array['sedang'] = $u_xr_sedang;
	}
	else if ($perceived_quality >= 55 && $perceived_quality <= 75)
	{
		$u_xr_sedang = (75 - $perceived_quality ) / (75-55);
		echo $u_xr_sedang;
		echo " = perceived_quality Sedang";
		$perceived_quality_array['sedang'] = $u_xr_sedang;
	}
	else
	{
		$u_xr_sedang = 0;
		echo $u_xr_sedang;
		echo " = perceived_quality Sedang";
		$perceived_quality_array['sedang'] = $u_xr_sedang;
	}
	echo "<br>";

	//perceived_quality 
	//Baik
	if ($perceived_quality >= 55 && $perceived_quality <= 75)
	{
		$u_xr_baik  = ($perceived_quality - 55 ) / (75-55);
		echo $u_xr_baik;
		echo " = perceived_quality Baik";
		$perceived_quality_array['buruk'] = $u_xr_baik;
	}
	else if ($perceived_quality >= 75 && $perceived_quality <= 100)
	{
		$u_xr_baik = (100 - $perceived_quality ) / (100-75);
		echo $u_xr_baik;
		echo " = perceived_quality Baik";
		$perceived_quality_array['buruk'] = $u_xr_baik;
	}
	else
	{
		$u_xr_baik = 0;
		echo $u_xr_baik;
		echo " = perceived_quality Baik";
		$perceived_quality_array['buruk'] = $u_xr_baik;
	}

echo "<br><br>";

/*
echo 'porsiarray = <br>'.var_dump($porsiarray);
sort($porsiarray);
echo "<br>";
echo 'porsiarray = <br>'.var_dump($porsiarray);
die();
*/

//sort($performance_array);
echo 'performance_array = ';
var_dump($performance_array);
echo "<br><br>";
//die();


//sort($durability_array);
var_dump($durability_array);
echo "<br><br>";

//sort($conformance_array);
var_dump($conformance_array);
echo "<br><br>";

//echo 'features; = ';
sort($features_array);
var_dump($features_array);

//echo 'reliability_array = ';
sort($reliability_array);
var_dump($reliability_array);

//echo 'aesthetics_array = ';
sort($aesthetics_array);
var_dump($aesthetics_array);

//echo 'perceived_quality_array = ';
sort($perceived_quality_array);
var_dump($perceived_quality_array);

echo "<br>";
echo "<br>";
echo "<hr>";

$performance_ = ['baik', 'sedang', 'buruk'];
$durability_ = ['baik', 'sedang', 'buruk'];
$conformance_ = ['baik', 'sedang', 'buruk'];
$features_ = ['baik', 'sedang', 'buruk'];
$reliability_ = ['baik', 'sedang', 'buruk'];
$aesthetics_ = ['baik', 'sedang', 'buruk'];
$perceived_quality_ = ['baik', 'sedang', 'buruk'];
$minat_ =['kurang', 'cukup', 'diminati', 'sangat'];

//string
foreach($performance_ as $pfmc) {
	foreach ($durability_ as $drblt) {
		foreach ($conformance_ as $cfmc) {
			foreach ($features_ as $ftrs) {
				foreach ($reliability_ as $rlblt) {
					foreach ($aesthetics_ as $asttcs) {
						foreach ($perceived_quality_ as $prcv_qlty) {
							foreach ($minat_ as $mnt) {
								$rules_[] = [0=>"$pfmc", 1=>"$drblt", 2=>"$cfmc", 3=>"$ftrs", 4=>"$rlblt", 5=>"$asttcs", 6=>"$prcv_qlty", 7=>"$mnt" ];				
							}
						}
					}
				}
			}
		}
	}
}

//echo 'rules_ = ';
//var_dump($rules_);
//echo "<br>";
//die();
//angka



$i = 1;
foreach($rules_ as $ruls) {
	foreach($ruls as $key=>$ruls_value) {
		if($key == 1)
		$ruls_value;
		
		//echo "<br>";
		//if($i == 2) die();
		
		$i++;
	}
}




foreach($performance_ as $key_pfmc=>$pfmc) {
	foreach ($durability_ as $key_drblt=>$drblt) {
		foreach ($conformance_ as $key_pcfmc=>$cfmc) {
			foreach ($features_ as $key_ftrs=>$ftrs) {
				foreach ($reliability_ as $key_rlblt=>$rlblt) {
					foreach ($aesthetics_ as $key_asttcs=>$asttcs) {
						foreach ($perceived_quality_ as $key_prcv_qlty=>$prcv_qlty) {
							$rules = [$pfmc, $drblt, $cfmc, $ftrs, $rlblt, $asttcs, $prcv_qlty];
							sort($rules);
							$min = min($rules);
							$minarray[] = $min;
							
							//echo "No. $i, ";
							var_dump($rules);
							echo "<br><br>";
							
							//echo "min = $min<br><br>";
							$i++;
						}
					}
				}
			}
		}
	}
}



//var_dump($rules_);
//die();



//var_dump($rules_);
echo "<br><br><br>";

$i=0;
foreach($rules_ as $key=>$rls) {
	//echo $rls[4];
	
	//$z = -1 * ($minarray * (75-50)-75);
	
	if ($rls[4] == 'kurang') {
		$z = -1 * (($minarray[$i] * (25-0))-25);
	}
	else if ($rls[4] == 'cukup') {
		$z = -1 * (($minarray[$i] * (50-25))-50);
		//echo "$z = -1 * (($minarray[$i] * (50-25))-50)";
	}	
	else if ($rls[4] == 'diminati') {
		$z = -1 * (($minarray[$i] * (75-50))-50);
	}
	else if ($rls[4] == 'sangat') {
		$z = -1 * (($minarray[$i] * (100-75))-100);
	}
	else{
		$z = 0;
	}
		
	$i++;
	
	$zarray[] = $z;
}


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
	var_dump($hasil1);
	var_dump($hasil2);
	echo "<br>";
}

if($hasil2 == 0)
	$hasil = 0;
else
	$hasil = $hasil1 / $hasil2;
	
echo "$hasil = $hasil1 / $hasil2 <br>";

echo "z = $hasil <br>";
//$_SESSION['z'] = $hasil;


die;
$sql = "
	insert into hitung_fuzzy values(
	'',
	'$id_pesanan',
	'$performance',
	'$durability',
	'$conformance',
	'$features',
	'$reliability',
	'$aesthetics',
	'$perceived_quality',
	'$hasil',
	'Sudah Dihitung'
	)
";
echo $sql."<br><br>";
//mysqli_query($konek, $sql);

$sql = "update pesanan set status_hitung = 'Sudah Dihitung' where id_pesanan = '$id_pesanan'";
echo $sql;
//mysqli_query($konek, $sql);

//header("location:end.php");
die();


die();

$sql = "update pesanan set status_hitung = 'Sudah Dihitung' where id_pesanan = '$id_pesanan'";
echo $sql;
//mysqli_query($konek, $sql);

//header("location:end.php");
die();

?>
