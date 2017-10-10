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

	<title>CH - Admin Lihat Pesanan</title>
	
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
		

			<?php //include('logout.php'); ?>
			
			<?php include('dropdown_admin.php'); ?>
			
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Pesanan</h1>
							<table class="table" id="dataTables-example">
								<thead>
									<tr>
										<th>No</th>
										<th>Nomor Pesanan</th>
										<th>Nama Menu</th>
										<th>Nama Customer</th>
										<th>Jumlah</th>
										<th>Tanggal</th>
										<th>Status Delivery</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$sql ="SELECT * FROM pesanan inner join menu inner join customer on pesanan.id_menu=menu.id_menu and pesanan.id_customer=customer.id_customer";
									
									//$sql ="select * from pesanan";
									$hasil = mysqli_query($konek, $sql);
									$no=1;
									while($data = mysqli_fetch_assoc($hasil))
									{
										echo "
										<tr>
											<td>$no</td>
											<td>$data[no_pesanan]</td>
											<td>$data[nama_paket]</td>
											<td>$data[nama]</td>
											<td>$data[jumlah]</td>
											<td>$data[tanggal]</td>
											<td>$data[delivery]</td>
										</tr> 
										";
										
									$no++;
									}
								?>
								</tbody>
							</table>

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
	
	<!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

	
</body>

</html>