<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

/*$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];*/
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

	<title>CH - Admin Tambah Menu</title>
	
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
                <a class="navbar-brand" href="index.html">Selamat Datang <?php //echo $nama ?></a>
			</div>
            <!-- /.navbar-header -->
			
			<?php //include('logout.php');?>
			
			<?php include('dropdown_admin.php'); ?>
			
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Menu</h1>
						
						<form role="form" action="input_menu.php" method="post">
							<div class="form-group">
								<label>Nama Paket</label>
								<input  name="nama_paket" class="form-control" placeholder="Masukkan Paket">
							</div>
							<div class="form-group">
								<label>Detai Menu</label>
								<input  name="detail_menu" class="form-control" placeholder="Masukkan Detai Menu">
							</div>
							<div class="form-group">
								<label>Jenis Menu</label>
								<select class="form-control" name="jns_menu">
									<option value="Sarapan">Sarapan</option>
									<option value="Makan Siang">Makan Siang</option>
									<option value="Makan Malam">Makan Malam</option>
								</select>
							</div>
							<div class="form-group">
								<label>Hari</label>
								<select class="form-control" name="hari">
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
								</select>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input  name="harga" class="form-control" placeholder="Masukkan Harga">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input  name="ket" class="form-control" placeholder="Masukkan Keterangan">
							</div>
							<br><br>
							<button type="submit" class="btn btn-default">Simpan</button>
							<button type="reset" class="btn btn-default">Reset</button>
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