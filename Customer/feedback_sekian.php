<?php 
session_start();
include('../konek.php');

$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];
$id_pesanan = $_GET['id_pesanan'];
$id_menu = $_GET['id_menu'];

/*

$sql = "select * from menu inner join pesanan on menu.id_menu=pesanan.id_menu where id_pesanan = '$id_pesanan' ";
$hasil = mysqli_query($konek, $sql);
$id_menu = $_GET['id_menu'];

*/


/*
echo $sql = "select * from menu inner join pesanan on menu.id_menu=pesanan.id_menu where id_menu = '$id_menu' ";
$hasil = mysqli_query($konek, $sql);

//$data = $_SESSION['id_customer'];

//echo $id_customer;
///$sql = "select nama from customer where id_customer = $id_customer";
*/
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>CH - Feedback</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	
	<div id="wrapper">
	
        <!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="index.html">Selamat Datang <?php echo $nama ?></a>
			</div>
            <!-- /.navbar-header -->
			
			<?php include('logout.php'); ?>
			
			<?php include('dropdown.php'); ?>
		
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Feedback Menu</h1>
						<?php
						/*
						$no=1;
						while ($data = mysqli_fetch_assoc($hasil))
						{ 
							echo "
							<h4 class='page-header'>Nama Menu : $data[nama_paket]</h4>
							";
							$no++;
							
							$no_pesanan = $data['no_pesanan'];
						}
						*/
						?>
						
						<div class="panel-body">
                            <div class="table-responsive">
								<form role="form" method="POST" action="fuzzy_sekian.php">
									<table class="table">
										<thead>
											<tr>
												<th>No</th>
												<th>Kualitas Pelayanan</th>
												<th>Skor</th>
											</tr>
										</thead>
										<tbody>
										<tr>
											<?php
											
											$sql ="select * from soal_fuzzy where jenis_soal = 'pelayanan' and status = 'tayang'";
											$hasil = mysqli_query($konek, $sql);
											$no=1;
											while($data = mysqli_fetch_assoc($hasil))
											{
												echo "
													<tr>
														<td>$no</td>
														<td>$data[pertanyaan]</td>
														<td>
															<div class='form-group'>
																<select class='form-control' name='pelayanan[]' id='komposisi'>
												";
												for($i=100; $i>=10; $i-=10) {
													echo "<option value='$i'>$i</option>";
												}
												echo "
																</select>
															</div>
														</td>
													</tr> 
												";
												
												$no++;
											}
											?>
										</tr>
										</tbody>
										<thead>
											<tr>
												<th>No</th>
												<th>Kualitas Harga</th>
												<th>Skor</th>
											</tr>
										</thead>
										<tbody>
										<tr>
											<?php
											
											$sql ="select * from soal_fuzzy where jenis_soal = 'harga' and status = 'tayang'";
											$hasil = mysqli_query($konek, $sql);
											$no=1;
											while($data = mysqli_fetch_assoc($hasil))
											{
												echo "
													<tr>
														<td>$no</td>
														<td>$data[pertanyaan]</td>
														<td>
															<div class='form-group'>
																<select class='form-control' name='harga[]' id='komposisi'>
												";
												for($i=100; $i>=10; $i-=10) {
													echo "<option value='$i'>$i</option>";
												}
												echo "
																</select>
															</div>
														</td>
													</tr> 
												";
												
												$no++;									
											}
											?>
										</tr>
										</tbody>
										<thead>
											<tr>
												<th>No</th>
												<th>Kualitas Produk Makanan</th>
												<th>Skor</th>
											</tr>
										</thead>
										<tbody>
										<tr>
											<?php
											
											$sql ="select * from soal_fuzzy where jenis_soal = 'makanan' and status = 'tayang'";
											$hasil = mysqli_query($konek, $sql);
											$no=1;
											while($data = mysqli_fetch_assoc($hasil))
											{
												echo "
													<tr>
														<td>$no</td>
														<td>$data[pertanyaan]</td>
														<td>
															<div class='form-group'>
																<select class='form-control' name='makanan[]' id='komposisi'>
												";
												for($i=100; $i>=10; $i-=10) {
													echo "<option value='$i'>$i</option>";
												}
												echo "
																</select>
															</div>
														</td>
													</tr> 
												";
												
												$no++;
											}
											?>
										</tr>
										</tbody>
									<tr>
										<td colspan="3" align="center">
										<button type="submit" class="btn btn-default">Simpan</button>
										</td>
									</tr>

									</tbody>
									</table>
									
									<input type='hidden' name='id_menu' value='<?php echo $id_menu; ?>' >
									
									<input type='hidden' name='id_pesanan' value='<?php echo $id_pesanan; ?>' >
									
									<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>' >
									
								</form>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

						</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
				
	</div>
	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	
</body>

</html>