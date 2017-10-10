<?php
	include('../konek.php');

	$sql = "select * from menu order by jenis asc";
	$hasil = mysqli_query($konek, $sql);
	while($data = mysqli_fetch_assoc($hasil)) {
		$menu[$data['Jenis']][] = [
			'nama_paket'=>$data['nama_paket'],
			'lama_buat'=>$data['lama_buat'],
			'hari'=>$data['Hari'],
			'harga'=>$data['harga'],
			'gambar'=>$data['gambar']
		];
	}
	
	$sql = "select id_menu from menu order by id_menu desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$id_menu = substr($data['id_menu'], 1, 5)+1;
	
	
	$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
	$jam = [
		'Sarapan'=>'06.00 - 10.00', 
		'Sarapan'=>'10.00 - 12.00', 
		'Makan Siang'=>'12.00 - 15.00', 
		'Makan Malam'=>'15.00 - 18.00', 
		'Makan Malam'=>'18.00 - 06.00'
	];
	
	//var_dump($menu);
	//echo "<br><br><br>";
	
	$cek_array['Sarapan'] = [];
	$cek_array['Makan Siang'] = [];
	$cek_array['Makan Malam'] = [];
	for($i=1; $i<=50; $i++) {
		foreach($hari as $har) {
			foreach($jam as $key_jams=>$jams) {
				//echo array_rand($menu[$key_jams]); die();
				$array_rand = array_rand($menu[$key_jams]);
				$menu_acak = $menu[$key_jams][$array_rand]['nama_paket'];
				$lama_buat_acak = $menu[$key_jams][$array_rand]['lama_buat'];
				$hari_acak = $menu[$key_jams][$array_rand]['hari'];
				$harga_acak = $menu[$key_jams][$array_rand]['harga'];
				$gambar_acak = $menu[$key_jams][$array_rand]['gambar'];
				
				foreach($cek_array[$key_jams] as $cek_ar) {
					$in_array = in_array($cek_ar, $menu_acak);
					echo "in_array = $in_array<br>";
				}
				
				$id_menu_sql = "M$id_menu";
				
				$sql = "insert into menu values('$id_menu_sql', '$menu_acak', '$menu_acak', '$key_jams', '$lama_buat_acak', now(), '$hari_acak', $harga_acak, '$gambar_acak', '')";
				mysqli_query($konek, $sql);
				//echo "$sql; <br>";
				$id_menu++;
			}
		}
	}
	
	echo "BERHASIL";
?>