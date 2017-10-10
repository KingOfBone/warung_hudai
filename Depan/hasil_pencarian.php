

<!DOCTYPE html>

<html>
	<head>
		<title>Cari Menu</title>
		
		
		<!-- Untuk Table -->
		<!-- Bootstrap Core CSS -->
		<link href="css/tabel/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="css/tabel/metisMenu.min.css" rel="stylesheet">

		<!-- DataTables CSS -->
		<link href="css/tabel/dataTables.bootstrap.css" rel="stylesheet">

		<!-- DataTables Responsive CSS -->
		<link href="css/tabel/dataTables.responsive.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/tabel/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="css/tabel/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		
		
		
		<!-- struktur bawaan -->
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfont-->
		
	</head>
	<body>
		<?php include("atas.php")?>
		
			
		<!-- contact-page -->
		<div class="contact">
			<div class="container">
				<div class="dreamcrub">
					<ul class="breadcrumbs">
						<li class="home">
						   <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
						   <span>&gt;</span>
						</li>
						<li class="women">
						   Pencarian
						</li>
					</ul>
					
					<div class="clearfix"></div>
				</div>
				<div class="contact-form2">
					<?php
						if(!empty($_SESSION['post'])) {							
							$ses_post = $_SESSION['post']['cari'];							
						}
						else {
							$ses_post = '';
						}
						
						$cari = !empty($_POST['cari']) ? $_POST['cari'] : $ses_post; // Proses awal pencarian
						$bulan = !empty($_POST['bulan']) && $_POST['bulan'] != 'semua' ? "AND tanggal like '%-".$_POST['bulan']."-%'" : '';
						
						$str = '';
						if(!empty($_SESSION['id_admin']))
							$str = ", history pembelian";
					?>
					
					<div class="contact-info">
						<h3>Hasil Pencarian</h3>
					</div>
					
					
					
					<div class="contact-info">
						<?php
							$time_pre = microtime(true);
							
							if($cari == 'semua')
								$klausa = "in (select nama_paket from menu order by nama_paket asc)";
							else
								$klausa = "like '%$cari%'";
							
							$sql = "
								select 
									nama_paket, no_pesanan, jumlah, harga, tanggal 
								from pesanan 
								inner join menu 
									on pesanan.id_menu=menu.id_menu 
								where 
									nama_paket $klausa 
									$bulan
								order by 
									tanggal desc, nama_paket asc
							";
							
							$hasil = mysqli_query($konek, $sql);							
							$hasil2 = mysqli_query($konek, $sql);							
							$data2 = mysqli_fetch_assoc($hasil2);
							
							
							if(count($data2) == 0 && $cari != 'semua') {
								echo "Ma'af menu yang anda cari tidak ada";								
							}
							else {
						?>
						
							<form style='margin-bottom:20px;' method='post' action='hasil_pencarian.php'>
								<!--
								Hasil pencarian berdasarkan :
								
								<select name='lihat_pencarian'>
									<option value='Perhari'>Perhari</option>
									<option value='Perminggu'>Perminggu</option>
									<option value='Perbulan'>Perbulan</option>
									<option value='Pertahun'>Pertahun</option>
								</select>
								Dari Tanggal
								<input type='text' name='cari' value='<?php echo $cari; ?>'>
								<br>
								
								Ke Tanggal
								<input type='text' name='cari' value='<?php echo $cari; ?>'>
								<br>
								-->
								
								
								<input type='hidden' name='cari' value='<?php echo $cari; ?>'>
								
								<?php
									if(!empty($_SESSION['post']['status_download'])) {
										unset($_SESSION['post']['status_download']);
										
										echo "<a href='../PHPtoPDF/Download/Laporan_Keuntungan.pdf'><input type='button' value='Lihat PDF'></a>";
										
									}else {
										echo "<input type='submit' name='sDownload' value='Download PDF'>";
									}
								?>
								<!--
								<input type='submit' name='sLihat' value='Cari'>
								-->
							</form>
							
							<form method='post' action='hasil_pencarian.php'>
								<?php
									if($cari == 'semua')
										$klausa = "in (select nama_paket from menu order by nama_paket asc)";
									else
										$klausa = "like '%$cari%'";
									
									$sql3 = "
										select 
											distinct(monthname(tanggal)) 'f',
											month(tanggal) 'm'
										from pesanan 
										inner join menu 
											on pesanan.id_menu=menu.id_menu 
										where nama_paket $klausa
										order by 
											tanggal asc
									";
									$hasil3 = mysqli_query($konek, $sql3);							
									
								?>
								Lihat Laporan untuk Bulan
								<select name='bulan'>
									<option value='semua'>Semua</option>
									<?php
										while($data3 = mysqli_fetch_assoc($hasil3)) {
											$M = $data3['m'] < 10 ? 0 ."$data3[m]" : $data3['m'];
											echo "<option value='$M'>$data3[f]</option>";
										}
									?>
								</select>
								<input type='hidden' name='cari' value='<?php echo $cari; ?>' />
								<input type='submit' value='Lihat' />
							</form>
						
						
						
						
						<?php
								
								
								$urutan = 0;
								$dari_database = array();
								
								while($data = mysqli_fetch_assoc($hasil)) {
									$dari_database[] = [
										'urutan'=>$urutan,
										'no_pesanan'=>$data['no_pesanan'],
										'nama_paket'=>$data['nama_paket'],
										'jumlah'=>$data['jumlah'],
										'harga'=>$data['harga'],
										'tanggal'=>$data['tanggal']
									];
									
									$nama_paket_database[] = $data['nama_paket'];
									
									$urutan++;
								}
								
								//var_dump($dari_database);
								
								
								
								
								
								
								$key_urutan = array();
								
								foreach($dari_database as $ddatab) {
									if($cari != 'semua') {
										$strpos = strpos(strtolower($ddatab['nama_paket']), strtolower($cari));
										//echo "<br> $strpos = strpos(strtolower(".$ddatab['nama_paket'] ."), strtolower($cari))";
										
										if($strpos !== false) {
											$key_urutan[] = $ddatab['urutan'];
										}
									}
									else {
										foreach($dari_database as $ddatab2) {
											$strpos = strpos(strtolower($ddatab2['nama_paket']), strtolower($ddatab['nama_paket']));
											//echo "<br> $strpos = strpos(strtolower(".$ddatab['nama_paket'] ."), strtolower($cari))";
											
											if($strpos !== false) {
												$key_urutan[] = $ddatab['urutan'];
												break;
											}
										}										
									}
								}
								
								//var_dump($key_urutan);
								
								
								
								
								
								
								
								
								
								$hasil_pencarian = array();
								$konci_tampil_perhitungan = true;
								$konci_tampil_perhitungan = false;
								include "binary.php";	

								
								foreach($key_urutan as $key_urt) {
									$array = $nama_paket_database;
									
									/* var_dump($key_urutan);
									echo "<br>";
									var_dump($array); */
									
									$key = $key_urt;			// Keyword menu makanan
									$low = 0;				// Batas bawah nilai array di database
									$high = count($dari_database)-1;	// Batas atas nilai array di database
									$urutan_perhitungan = 1;							
									$hasil_pencarian[] = BinarySearch( $array, $key, $low, $high, $konci_tampil_perhitungan, $urutan_perhitungan ) ;
									
									if($konci_tampil_perhitungan)
										echo "<hr>";
								}
								
								
								
								
								
								foreach($dari_database as $key=>$ddatab) {
									if(!in_array($key, $hasil_pencarian)) {
										unset($dari_database[$key]);
									}
								}
								
								
								
								$ar = array();
								$ar_tanggal = array();
								$akhir = array();
								$bpesanan = 0;
								$bharga = 0;
								$bbiaya = 0;
								$i = 0;
								foreach($hasil_pencarian as $key_haspen=>$haspen) {
									$tanggal = $dari_database[$haspen]['tanggal'];
									
									if($key_haspen == 0)
										$akhir['tanggal_awal'] = $tanggal;
									
									if(!in_array($tanggal, $ar_tanggal)) {
										$no_pesanan = '';
										$jumlah = 0;
										$harga = 0;
										$biaya = 0;
										$hari = date('d', strtotime($tanggal));
										$bulan = date('m', strtotime($tanggal));
										
										
										
										foreach($hasil_pencarian as $key2=>$haspen2) {
											$tanggal2 = $dari_database[$haspen2]['tanggal'];
											
											if(!in_array($tanggal2, $ar_tanggal)) {
												if($tanggal != $tanggal2) {
													$i++;
													$ar_tanggal[] = $tanggal;
													break;
												}
												else {
													$nama_paket = $dari_database[$haspen2]['nama_paket'];
													$no_pesanan .= $dari_database[$haspen2]['no_pesanan'].", ";
													$jumlah += $dari_database[$haspen2]['jumlah'];
													$bpesanan += $jumlah;
													/* echo "
														tanggal = $tanggal <br>
														$jumlah += ".$dari_database[$haspen2]['jumlah']."
														<br><br>
													"; */
													$harga = $dari_database[$haspen2]['harga'];
													$bharga += $harga;
													
													$biaya2 = $dari_database[$haspen2]['jumlah'] * $dari_database[$haspen2]['harga'];
													$biaya += $biaya2;
													$bbiaya += $biaya;
													
													$ar[$i] = [
														'nama_paket'=>$nama_paket,
														'no_pesanan'=>$no_pesanan,
														'jumlah'=>$jumlah,
														'harga'=>$harga,
														'biaya'=>$biaya,
														'hari'=>$hari,
														'bulan'=>$bulan,
														'tanggal'=>$tanggal
													];
													
													$akhir['tanggal_akhir'] = $tanggal;
													
													
													
													/* if($key2 > 2) {
														var_dump($ar);
														die();
													} */
												}
											}
										}
									}
								}
								
								
								$akhir['pesanan'] = $bpesanan;
								$akhir['harga'] = $bharga;
								$akhir['biaya'] = $bbiaya;
								
								$_SESSION['ar'] = [$ar, $akhir];
								$x = [$ar, $akhir];
								//var_dump($x);
								
								
								
								
								
								if(!empty($_POST['sDownload'])) {
									$cari = $_POST['cari'];
									$lihat_pencarian = $_POST['lihat_pencarian'];
									$_SESSION['post'] = ['cari'=>$cari, 'lihat_pencarian'=>$lihat_pencarian, 'status_download'=>true];
									
									header("location:http://localhost/warung_hudai/PHPtoPDF/examples/pdf_report.php");
									die();
									
									//http://localhost/warung_hudai/Depan/hasil_pencarian.php
									//header("location:http://localhost/warung_hudai/dompdf/dompdf.php?base_path=www/test/&amp;options[Attachment]=0&amp;input_file=demo_coba.php#toolbar=0&amp;view=FitH&amp;statusbar=0&amp;messages=0&amp;navpanes=0");
									//header("location:http://localhost/warung_hudai/dompdf/dompdf.php?base_path=www/test/&amp;options[Attachment]=0&amp;input_file=demo_01.html#toolbar=0&amp;view=FitH&amp;statusbar=0&amp;messages=0&amp;navpanes=0");
								}
								
								
								//var_dump($key_urutan);
								
								// Untuk hasil waktu pencarian 
								$time_post = microtime(true);
								$time = $time_post - $time_pre;
								
								// Menampilkan output hasi pencarian
							?>
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												Hasil Pencarian
											</div>
											<div class="panel-body">
												<div class="dataTable_wrapper">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example-0">
														<thead>
															<tr>
																<th>No</th>
																<th>Nama Paket</th>
																<th>No Pesanan</th>
																<th>Jumlah</th>
																<th>Harga</th>
																<th>Biaya</th>
																<th>Hari Ke</th>
																<th>Bulan Ke</th>
																<th>Tanggal</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$total = 0;
																$i = 1;
																foreach($ar as $has_pen) {
																	$biaya = $has_pen['jumlah'] * $has_pen['harga'];
																	$total += $biaya;
																	
																	$harga = number_format($has_pen['harga'], 0, ',', '.');
																	$biaya = number_format($biaya, 0, ',', '.');
																	
																	$tanggal = $has_pen['tanggal'];
																	$hari = date('d', strtotime($tanggal));
																	$bulan = date('m', strtotime($tanggal));
																	
																	
																	echo "
																		<tr class='gradeX'>
																			<td align='center'>$i</td>
																			<td align='center'>".$has_pen['nama_paket']."</td>
																			<td align='center'>".$has_pen['no_pesanan']."</td>
																			<td align='center'>".$has_pen['jumlah']."</td>
																			<td align='center'>Rp. ".$harga."</td>
																			<td align='center'>Rp. ".$biaya."</td>
																			<td align='center'>".$hari."</td>
																			<td align='center'>".$bulan."</td>
																			<td align='center'>".$tanggal."</td>
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
								$total = number_format($total, 0, ',', '.');
								
								$_SESSION['total'] = $total;
								
								echo "	
									<h4>Waktu pencarian : [ ".sprintf("%.4f",$time)." ]  seconds </h4>
									<h4>Total : Rp. $total </h4>
								";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		
		
                                        
		
		
		
		
		
		
		
		
		<div class="copyright text-center">
			<p>© 2016 | Hudai Cafe Catering</p>
		</div>
		</div>
		</div>
		
		
		<!-- jQuery -->
		<!--
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		-->
		
		<!-- Bootstrap Core JavaScript -->
		<script src="js/tabel/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="js/tabel/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="js/tabel/jquery.dataTables.min.js"></script>
		<script src="js/tabel/dataTables.bootstrap.min.js"></script>

		
		<script src="js/tabel//sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script>
		$(document).ready(function() {
			$('#dataTables-example-0').DataTable({
					responsive: true
			});
			$('#dataTables-example-1').DataTable({
					responsive: true
			});
		});
		</script>
		
		
		
		
	</body>
</html>