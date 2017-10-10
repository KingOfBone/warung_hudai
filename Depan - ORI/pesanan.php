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
						$sql = "select * from menu order by jenis asc";
						$hasil = mysqli_query($konek, $sql);
						
						$i=1;
						while($data = mysqli_fetch_assoc($hasil)) {
							
					?>
							<script>
								$(document).ready(function(c) {
									
									$('.cart-header<?php echo $i; ?>').on('click', function(c){
										var color = $(this).css("background-color");
										
										if(color == "rgba(0, 0, 0, 0)") {
											$(this).css({'background-color':'#e7e7e7'});										
										}
										else {
											$(this).css({'background-color':'rgba(0, 0, 0, 0)'});
										}
									});	  
								});
								
								function loadDoc<?php echo $i; ?>() {
									var id_menu<?php echo $i; ?> = document.getElementById("id_menu<?php echo $i; ?>").value;
									var xhttp = new XMLHttpRequest();

									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											document.getElementById("hasil").innerHTML = this.responseText;
										}
									};

									xhttp.open("POST", "session_menu.php", true);
									xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhttp.send("id_menu="+id_menu<?php echo $i; ?>);
								}
							</script>
							<div class="cart-header<?php echo $i; ?>" onClick="loadDoc<?php echo $i; ?>()">
								<div style='border:2px #e7e7e7 solid; height:20%;' class="cart-sec simpleCart_shelfItem">
									<div class="cart-item">
										<img src="images/<?php echo $data['gambar']; ?>" class="img-responsive" alt="">
									</div>
									<div style='margin-top:0px;' class="cart-item-info">
										<h3><a href="#"> <?php echo $data['nama_paket']; ?> </a></h3>
										<span>Jadwal Masak : <?php echo $data['harga']; ?></span><br>
										<span>Harga : <?php echo $data['harga']; ?></span><br>
										<span>Lama Buat : <?php echo $data['lama_buat']; ?></span><br>
										<span>(Click untuk memilih)</span><br>
										<input type='hidden' id='id_menu<?php echo $i; ?>' value='<?php echo $data['id_menu']; ?>' />
									</div>
									
									<div class="clearfix"></div>													
								</div>
							</div>
					<?php
							$i++;
						}
					?>
					
					<div id='hasil'></div>
					<div style='text-align:right;'>
						<input type='button' onClick="window.top.location.href='daftar_menu_keranjang.php'" value='Selesai Memilih'>
						<!--
						<input type='button' value='Selesai Memilih'>
						-->
					</div>
				</div>
			</div>
		
			
			<div class="copyright text-center">
				<p>© 2016 | Warung Hudai</p>
			</div>
		</div>
	</body>
</html>