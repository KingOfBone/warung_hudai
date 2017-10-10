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

	<title>CH - Admin Tambah Soal</title>
	
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
			
			<?php include('logout.php');?>
			
			<?php include('dropdown_admin.php'); ?>
			
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tambah Soal Feedback</h1>
						
						<form role="form" action="input_soal.php" method="post">
							<div class="form-group">
								<label>Jenis Kategori Soal</label>
								<select class="form-control" name="jns_kategori">
									<option value="pelayanan">Kualitas Pelayanan</option>
									<option value="harga">Kualitas Harga</option>
									<option value="makanan">Kualitas Produk Makanan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Masukkan Soal Menurut Kategori</label>
								<textarea  name="soal" class="form-control" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label>Status</label>
									<select class="form-control" name="status">
										<option value="Tayang">Tayang</option>
										<option value="Tidak Tayang">Tidak Tayang</option>
									</select>
							</div>
							<div class="form-group">
								<label>Ket</label>
								<input  name="ket" class="form-control" placeholder="Masukkan Detai Menu">
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