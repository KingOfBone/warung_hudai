<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];
//$data = $_SESSION['id_customer'];

//echo $id_customer;
///$sql = "select nama from customer where id_customer = $id_customer";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>CH - Home Customer</title>
	
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
                        <h1 class="page-header">Menu Masakan Selanjutnya</h1>
						<form method='post' action='daftar_menu_keranjang.php'>
						<table class="table" id="dataTables-example" align="center">
						<?php
						date_default_timezone_set("Asia/Jakarta");
						$jam = date("H");
						//echo $jam;
						if ($jam >= 11 && $jam < 17)
						{
							$jenis = "Makan Malam";
						}
						elseif ($jam >= 6 && $jam < 11)
						{
							$jenis = "Makan Siang";
						}
						else
						{
							$jenis = "Sarapan";
						}
						//echo "<br>";

						?>
						<h4>Jenis Masakan : <?php echo "$jenis"; ?><h4>
							<thead>
								<tr>
									<th>Nama Menu</th>
									<th>Detail</th>
									<th>Pesan</th>
								</tr>
							</thead>
							<tbody>
						
						<?php
						echo "<br>";
						$sql = " select * from menu where jenis = '$jenis'";
						$hasil = mysqli_query($konek, $sql);
						$no=1;
						while($data = mysqli_fetch_assoc($hasil))
						{
						echo "
						<tr>
							<td>$data[nama_paket]</td>
							<td>$data[detail_menu]</td>
							<td><input type='checkbox'name='nama_menu[]' value='$data[id_menu]-$data[nama_paket]-$data[harga]'></input></td>
						</tr> 
						";
						}
						$no++;
						?>
						<tr>
							<td colspan="4" align="center">
							<input type='submit' value='Submit'>
							</td>
						</tr>
						</form>
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