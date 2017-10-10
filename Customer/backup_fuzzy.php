<?php 

include('../konek.php');

$id_pesanan = $_POST['id_pesanan'];
$no_pesanan = $_POST['no_pesanan'];
$id_customer = $_POST['id_customer'];
$komposisi = $_POST['komposisi'];
$kombinasi = $_POST['kombinasi'];
$penyajian = $_POST['penyajian'];
$rasa = $_POST['citarasa'];
$texture = $_POST['texture'];
$penataan = $_POST['penataan'];
$kemasan = $_POST['kemasan'];
$nasi = $_POST['nasi'];
$lauk = $_POST['lauk'];
$lengkap = $_POST['kelengkapan'];
$xharga = $_POST['harga'];

$xrasa = (($komposisi + $kombinasi + $penyajian + $rasa + $texture) / 5);

$xpenampilan = (($penataan + $kemasan) / 2);
$xporsi = (($nasi + $lauk + $lengkap) / 3);
//$harga = $harga;

echo $xrasa;
echo "<br>";
echo $xpenampilan;
echo "<br>";
echo $xporsi;
echo "<br>";
echo $xharga;



/*$_SESSION['citarasa']=$citarasa;
$_SESSION['tampilan']=$tampilan;
$_SESSION['porsi']=$porsi;
$_SESSION['harga']=$harga;

$xrasa = $_SESSION['citarasa'];
$xpenampilan = $_SESSION['tampilan'];
$xharga = $_SESSION['harga'];
$xporsi = $_SESSION['porsi'];*/

$rasaarray = array();

//echo "xrasa : $xrasa <br>";
echo "<br>";

//Rasa
//Urendah
	if ($xrasa >= 50 && $xrasa <= 150)
	{
		$u_xr_rendah  = ($xrasa - 50 ) / (150-30);
		echo $u_xr_rendah;
		echo "Rasa Kurang Enak";
		$rasaarray['kurang enak'] = $u_xr_rendah;
	}
	else if ($xrasa >= 150 && $xrasa <= 275)
	{
		$u_xr_rendah = (275 - $xrasa ) / (275-150);
		echo $u_xr_rendah;
		echo "Rasa Kurang Enak";
		$rasaarray['kurang enak'] = $u_xr_rendah;
	}
	else
	{
		$u_xr_rendah = 0;
		echo $u_xr_rendah;
		echo "Rasa Kurang Enak";
		$rasaarray['kurang enak'] = $u_xr_rendah;
	}
	echo "<br>";

//Unormal
	if ($xrasa >= 150 && $xrasa <= 275)
	{
		$u_xr_normal  = ($xrasa - 150 ) / (275-150);
		echo $u_xr_normal;
		echo "Rasa Enak";
		$rasaarray['enak'] = $u_xr_normal;
	}
	else if ($xrasa >= 275 && $xrasa <= 400)
	{
		$u_xr_normal = (400 - $xrasa ) / (400-275);
		echo $u_xr_normal;
		echo "Rasa Enak";
		$rasaarray['enak'] = $u_xr_normal;
	}
	else
	{
		$u_xr_normal = 0;
		echo $u_xr_normal;
		echo "Rasa Enak";
		$rasaarray['enak'] = $u_xr_normal;
	}

echo "<br>";

//Utinggi
	if ($xrasa >= 275 && $xrasa <=400)
	{
		$u_xr_tinggi  = ($xrasa - 275 ) / (400-275);
		echo $u_xr_tinggi;
		echo "Rasa Lezat";
		$rasaarray['lezat'] = $u_xr_tinggi;
	}
	else if ($xrasa >= 500 && $xrasa <= 400)
	{
		$u_xr_tinggi = (500 - $xrasa ) / (500-400);
		echo $u_xr_tinggi;
		echo "Rasa Lezat";
		$rasaarray['lezat'] = $u_xr_tinggi;
	}
	else
	{
		$u_xr_tinggi = 0;
		echo $u_xr_tinggi;
		echo "Rasa Lezat";
		$rasaarray['lezat'] = $u_xr_tinggi;
	}

echo "<br><br>";

// Penampilan
//U tidak menarik
	if ($xpenampilan >=20 && $xpenampilan <=65)
	{
		$u_xp_rendah = ($xpenampilan - 20) / (65 - 20);
		echo $u_xp_rendah;
		echo "Penampilan Kurang Menarik";
		$penampilanarray['tidak menarik'] = $u_xp_rendah;
	}
	else if ($xpenampilan >= 65 && $xpenampilan <= 110)
	{
		$u_xp_rendah = (110 - $xpenampilan) / (110 - 65);
		echo $u_xp_rendah;
		echo "Penampilan Kurang Menarik";
		$penampilanarray['tidak menarik'] = $u_xp_rendah;
	}
	else
	{
		$u_xp_rendah = 0;
		echo $u_xp_rendah;
		echo "Penampilan Kurang Menarik";
		$penampilanarray['tidak menarik'] = $u_xp_rendah;
	}
echo "<br>";

//U Menarik
	if ($xpenampilan >=65 && $xpenampilan <=110)
	{
		$u_xp_menarik = ($xpenampilan - 65) / (110 - 65);
		echo $u_xp_menarik;
		echo "Penampilan Menarik";
		$penampilanarray['menarik'] = $u_xp_menarik;
	}
	else if ($xpenampilan >=110 && $xpenampilan <= 155)
	{
		$u_xp_menarik = (155 - $xpenampilan) / (155- 110);
		echo $u_xp_menarik;
		echo "Penampilan Menarik";
		$penampilanarray['menarik'] = $u_xp_menarik;
	}
	else
	{
		$u_xp_menarik = 0;
		echo $u_xp_menarik;
		echo "Penampilan Menarik";
		$penampilanarray['menarik'] = $u_xp_menarik;
	}

echo "<br>";

//U Bagus
	if ($xpenampilan >=110 && $xpenampilan <= 155)
	{
		$u_xp_bagus = ($xpenampilan - 155) / (110 - 155);
		echo $u_xp_bagus;
		echo "Penampilan Bagus";
		$penampilanarray['bagus'] = $u_xp_bagus;
	}
	else if ($xpenampilan >= 155 && $xpenampilan <= 200)
	{
		$u_xp_bagus = (200 - $xpenampilan) / (200 - 155);
		echo $u_xp_bagus;
		echo "Penampilan Bagus";
		$penampilanarray['bagus'] = $u_xp_bagus;
	}
	else
	{
		$u_xp_bagus = 0;
		echo $u_xp_bagus;
		echo "Penampilan Bagus";
		$penampilanarray['bagus'] = $u_xp_bagus;
	}

echo "<br><br>";

//Harga
//Murah
	if ($xharga >=10 && $xharga <=30)
	{
		$u_xh_murah = ($xharga - 10) / (30-10);
		echo $u_xh_murah;
		echo "Harga Murah";
		$hargaarray['murah'] = $u_xh_murah;
	}
	else if ($xharga >=30 && $xharga <=55)
	{
		$u_xh_murah = (55 - $xharga) / (55 - 30);
		echo $u_xh_murah;
		echo "Harga Murah";
		$hargaarray['murah'] = $u_xh_murah;
	}
	else
	{
		$u_xh_murah = 0;
		echo $u_xh_murah;
		echo "Harga Murah";
		$hargaarray['murah'] = $u_xh_murah;
	}

echo "<br>";

//Sedang
	if ($xharga >= 30 && $xharga <= 55)
	{
		$u_xh_sedang = ($xharga - 30) / (55-30);
		echo $u_xh_sedang;
		echo "Harga Sedang";
		$hargaarray['sedang'] = $u_xh_sedang;
	}
	else if ($xharga >= 55 && $xharga <= 80)
	{
		$u_xh_sedang = (80-$xharga)/(80-55);
		echo $u_xh_sedang;
		echo "Harga Sedang";
		$hargaarray['sedang'] = $u_xh_sedang;
	}
	else
	{
		$u_xh_sedang = 0;
		echo $u_xh_sedang;
		echo "Harga Sedang";
		$hargaarray['sedang'] = $u_xh_sedang;
	}

echo "<br>";

//Mahal
	if ($xharga >= 55 && $xharga <= 80)
	{
		$u_xh_mahal = ($xharga - 55) / (80-55);
		echo $u_xh_mahal;
		echo "Harga Mahal";
		$hargaarray['mahal'] = $u_xh_mahal;
	}
	else if ($xharga >= 80 && $xharga <= 100)
	{
		$u_xh_mahal = (100-$xharga)/(100-80);
		echo $u_xh_mahal;
		echo "Harga Mahal";
		$hargaarray['mahal'] = $u_xh_mahal;
	}
	else
	{
		$u_xh_mahal = 0;
		echo $u_xh_mahal;
		echo "Harga Mahal";
		$hargaarray['mahal'] = $u_xh_mahal;
	}

echo "<br><br>";

//Porsi
//U kurang
	if ($xporsi >= 30 && $xporsi <= 90)
	{
		$u_xp_kurang = ($xporsi - 30) / (90-30);
		echo $u_xp_kurang;
		echo "Porsi Kurang";
		$porsiarray['kurang'] = $u_xp_kurang;
	}
	else if ($xporsi >=90 && $xporsi <= 160)
	{
		$u_xp_kurang = (160 - $xporsi) / (160 - 90);
		echo $u_xp_kurang;
		echo "Porsi Kurang";
		$porsiarray['kurang'] = $u_xp_kurang;
	}
	else
	{
		$u_xp_kurang = 0;
		echo $u_xp_kurang;
		echo "Porsi Kurang";
		$porsiarray['kurang'] = $u_xp_kurang;
	}

echo "<br>";

// Cukup
	if ($xporsi >= 90 && $xporsi <= 160)
	{
		$u_xp_cukup = ($xporsi - 90) / (160-90);
		echo $u_xp_cukup;
		echo "Porsi Cukup";
		$porsiarray['cukup'] = $u_xp_cukup;
	}
	else if ($xporsi >=160 && $xporsi <= 230)
	{
		$u_xp_cukup = (160 - $xporsi) / (160-230);
		echo $u_xp_cukup;
		echo "Porsi Cukup";
		$porsiarray['cukup'] = $u_xp_cukup;
	}
	else
	{
		$u_xp_cukup = 0;
		echo $u_xp_cukup;
		echo "Porsi Cukup";
		$porsiarray['cukup'] = $u_xp_cukup;
	}

echo "<br>";

//U Lengkap
	if ($xporsi >= 160 && $xporsi <= 230)
	{
		$u_xp_lengkap = ($xporsi - 160) / (230-160);
		echo $u_xp_lengkap;
		echo "Porsi Lengkap";
		$porsiarray['lengkap'] = $u_xp_lengkap;
	}
	else if ($xporsi >=230 && $xporsi <= 300)
	{
		$u_xp_lengkap = (300 - $xporsi) / (300-230);
		echo $u_xp_lengkap;
		echo "Porsi Lengkap";
		$porsiarray['lengkap'] = $u_xp_lengkap;
	}
	else
	{
		$u_xp_lengkap = 0;
		echo $u_xp_lengkap;
		echo "Porsi Lengkap";
		$porsiarray['lengkap'] = $u_xp_lengkap;
	}

echo "<br><br>";

sort($rasaarray);
echo 'rasaaray = ';
var_dump($rasaarray);
echo "<br><br>";
//die();


sort($penampilanarray);
var_dump($penampilanarray);
echo "<br><br>";

sort($hargaarray);
var_dump($hargaarray);
echo "<br><br>";

sort($porsiarray);
var_dump($porsiarray);
echo "<br>";
echo "<br>";
echo "<hr>";

/*
$arrayatribut = ['rasaarray','penampilanarray','hargaarray','porsiarray'];
foreach($arrayatribut as $at)
{
	$x = $$at;
	
	
	$$at = array_values($x);
	$$at = min($$at);
	
	var_dump($$at);
	echo "<br>";
}
*/

$rasa_ = ['kurang enak', 'enak', 'lezat'];
$penampilan_ = ['tidak menarik', 'menarik', 'bagus'];
$harga_ = ['Mahal', 'Standar', 'Murah'];
$porsiarray_ = ['kurang', 'cukup', 'lengkap'];
$minat_ =['kurang', 'cukup', 'diminati', 'sangat'];
//string
foreach($rasa_ as $rs) {
	foreach ($penampilan_ as $pnmpl) {
		foreach ($harga_ as $hrg) {
			foreach ($porsiarray_ as $prs) {
				foreach ($minat_ as $mnt) {
					$rules_[] = [0=>"$rs", 1=>"$pnmpl", 2=>"$hrg", 3=>"$prs", 4=>"$mnt" ];				
				}
			}
		}
	}
}

//echo 'rules_ = ';
//var_dump($rules_);
//die();
//angka
$i=1;
foreach($rules_ as $key=>$ruls) {
	foreach($ruls as $ruls_value) {
		$ruls_value;
	}
	die();
}
/*
foreach($rasaarray as $key_rs=>$rs) {
	foreach ($penampilanarray as $key_pnmpl=>$pnmpl) {
		foreach ($hargaarray as $key_hrg=>$hrg) {
			foreach ($porsiarray as $key_prs=>$prs) {
				$rules = [0=>$rs, 1=>$pnmpl, 2=>$hrg, 3=>$prs];
				sort($rules);
				$min = min($rules);
				$minarray[] = $min;
				
				//echo "No. $i, ";
				//var_dump($rules);
				//echo "<br>";
				
				//echo "min = $min<br><br>";
				$i++;
			}
		}
	}
}
*/

var_dump($rules_);
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



$sql = "
	insert into hitung_fuzzy values(
	'',
	'$id_pesanan',
	'$komposisi',
	'$kombinasi',
	'$penyajian',
	'$rasa',
	'$texture',
	'$xrasa',
	'$penataan',
	'$kemasan',
	'$xpenampilan',
	'$nasi',
	'$lauk',
	'$lengkap',
	'$xporsi',
	'$xharga',
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

?>
