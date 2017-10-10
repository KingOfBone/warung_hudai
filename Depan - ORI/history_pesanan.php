

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
		<!-- for bootstrap working -->
			<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
		<!-- //for bootstrap working -->
		<!-- cart -->
			<script src="js/simpleCart.min.js"> </script>
		<!-- cart -->
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
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
				<div class="contact-form">
					<?php
						$str = '';
						if(!empty($_SESSION['id_customer']))
							$str = ", history pembelian";
					?>
					
					<div class="contact-info">
						<h3>Hasil Pencarian</h3>
					</div>
					<div class="contact-info">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										History Pesanan
									</div>
									<div class="panel-body">
										<div class="dataTable_wrapper">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example-0">
												<thead>
													<tr>
														<th>Nama Paket</th>
														<th>No Pesanan</th>
														<th>Jumlah</th>
														<th>Tanggal</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$sql = "select nama_paket, no_pesanan, jumlah, tanggal from pesanan inner join menu on pesanan.id_menu=menu.id_menu where id_customer = '$id_customer' order by nama_paket asc;";
														$hasil = mysqli_query($konek, $sql);
														
														$urutan = 0;
														while($data = mysqli_fetch_assoc($hasil)) {
															echo "
																<tr class='gradeX'>
																	<td align='center'>".$data['nama_paket']."</td>
																	<td align='center'>".$data['no_pesanan']."</td>
																	<td align='center'>".$data['jumlah']."</td>
																	<td align='center'>".$data['tanggal']."</td>
																</tr>
															";
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>							
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