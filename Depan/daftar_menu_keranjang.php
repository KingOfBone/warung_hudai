<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Warung Hudai</title>
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
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body onLoad="hapus_session()">
	<script>
		function hapus_session() {
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "hapus_session.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");			
		}
	</script>
	
	
	
	<!-- header-section-starts -->
	<!-- header-section-ends -->
	<?php include("atas.php")?>
	
	</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
				<div class="cart-gd">
					<?php
						$sql = "select no_pesanan from pesanan order by no_pesanan desc limit 1";
						$hasil = mysqli_query($konek, $sql);
						$data = mysqli_fetch_assoc($hasil);
						
						if(mysqli_num_rows($hasil) > 0) {
							$explode = explode('P', $data['no_pesanan']);
							$no_pesanan = "P".($explode[1]+1);		
						}
						else
							$no_pesanan = "P10001";
						
						$session_menu = explode(', ', $_SESSION['session_menu']);
						$nama_menu = array();
						
						foreach($session_menu as $seme) {
							$sql = "select * from menu where id_menu = '$seme'";
							$hasil = mysqli_query($konek, $sql);
							$data = mysqli_fetch_assoc($hasil);
							$nama_menu[] = [$seme, $data['nama_paket'], $data['harga']] ;
						}
						
						$nama_customer = $_SESSION['id_user'];
						
						$sql = "select now() 'sekarang'";
						$hasil = mysqli_query($konek, $sql);
						$data = mysqli_fetch_assoc($hasil);
						$tanggal = $data['sekarang'];
						
						
					?>
						<script>
							function validasi() {
								var pesan = ''
								
								<?php for($i=1; $i<=count($nama_menu); $i++) { ?>
								var quantity_<?php echo $i;?> = document.getElementById("quantity_<?php echo $i;?>").value;
								
								if(quantity_<?php echo $i;?> == ''){
									pesan += 'Quantity untuk no '+<?php echo $i;?>+' kosong \n ';
								}
								if(isNaN(quantity_<?php echo $i;?>)){
									pesan += 'Quantity untuk no '+<?php echo $i;?>+' bukan angka \n ';
								}
								<?php } ?>
								
								if(pesan != '') {
									alert('error berupa : \n '+pesan);
									return false;
								}
							}
						</script>
						
						<h1 class="page-header">Confirmasi Pesanan</h1>
							
						<?php
							$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];	
						?>
                        <div class="panel-body">
                            <table  style='margin-bottom:20px;'>
								<form name='form' method='post' action='daftar_menu_keranjang_proses.php' onSubmit='return validasi()'>
								<tr>
									<td>Pemesan</td>
									<td>:</td>
									<td><input class="form-control" type='text' name='pemesan' /></td>
								</tr>
								<tr>
									<td>No Pesanan</td>
									<td>:</td>
									<td><input class="form-control" onClick='return validasi()' type='text' readonly name='no_keranjang' value='<?php echo $no_pesanan; ?>' /></td>
									<input type='hidden' name='pemesan' value='<?php echo $nama_customer; ?>' />
									<input type='hidden' name='id_menu' value='<?php echo $id_menu; ?>' />
								</tr>
								<!--
								<tr>
									<td>Nama Pesanan</td>
									<td>:</td>
									<td><input class="form-control" type='text' readonly name='nama_pesanan' value='<?php echo $nama_customer; ?>' /></td>
								</tr>
								-->
								<tr>
									<td>Tanggal Pemesanan</td>
									<td>:</td>
									<td><input class="form-control" readonly type='text' name='tanggal' value='<?php echo $tanggal; ?>' /></td>
								</tr>
								<tr>
									<td>Tanggal Pemesanan</td>
									<td>:</td>
									<td><input class="form-control" readonly type='text' name='' value='<?php echo $tanggal; ?>' /></td>
								</tr>
								<tr>
									<td>Tanggal Delivery</td>
									<td>:</td>
									<td><input class="form-control" type="text" name="tgl_delivery" id="tanggal" /></td>
								</tr>
									<!--
									<tr>
										<td><input type='submit' value='Masukkan'></td>
									</tr>
									-->
								</table>
								
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>No</th>
												<!--<th>Hari</th>-->
												<th>Menu</th>
												<th>Harga</th>
												<th>Quantity</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i=1;
												
												foreach($nama_menu as $nm) {
													$id_menu = $nm[0];
													$menu = $nm[1];
													$harga = $nm[2];
													
													echo "
														<tr>
															<td>$i</td>
															<td>$menu</td>
															<td>$harga</td>
															<td>
															<input type='text' id='quantity_$i' name='quantity[]' />
															</td>
														</tr>
													
														<input type='hidden' name='id_menu[]' value='$id_menu'>
													";													
													
													$i++;
												}
											?>
											<input type='hidden' name='id_user' value='<?php echo $id_customer; ?>'>
										</tbody>
									</table>
								</div>
										<input type='submit' value='Simpan'>
									</form>
                            <!-- /.table-responsive -->
                        </div>
						
						
						
				</div>
			</div>
		
			
			<div class="copyright text-center">
				<p>© 2016 | Warung Hudai</p>
			</div>
		</div>
	</body>
</html>