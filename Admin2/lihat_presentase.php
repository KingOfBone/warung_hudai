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

	<title>CH - Admin hasil Presentase</title>
	
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
			
        <div style='margin-bottom:-250px;' id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php
							$sql = "
								select 
									hitung_fuzzy_.id_menu,
									nama_paket,
									sigma,
									presentase,
									hitung_fuzzy_.tingkat_kepuasan
								from hitung_fuzzy_
								inner join 
									menu on 
									hitung_fuzzy_.id_menu=menu.id_menu
								inner join 
									presentase on 
									presentase.id_menu=menu.id_menu
								where 
									presentase.tingkat_kepuasan = 'cukup puas' or
									presentase.tingkat_kepuasan = 'puas'
								GROUP BY menu.id_menu
							";
							
							$hasil = mysqli_query($konek, $sql);
							
							$jumlah_menu = mysqli_num_rows($hasil);
						?>
						
						
                        <h1 class="page-header">Kesimpulan Perhitungan</h1>
                        <h4 class="page-header">Menurut perhitungan Fuzzy terdapat <?php echo $jumlah_menu; ?> menu yang diperkirakan diminati untuk bulan depan</h4>
							<table class="table" id="dataTables-example-1">
								<thead>
									<tr>
										<th>No</th>
										<th>Id Menu</th>
										<th>Nama Menu</th>
										<th>Jumlah Feedback</th>
										<th>Rata-Rata Feedback</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
									while($data = mysqli_fetch_assoc($hasil))
									{
										echo "
										<tr>
											<td>$no</td>
											<td>$data[id_menu]</td>
											<td>$data[nama_paket]</td>
											<td>$data[sigma]</td>
											<td>$data[presentase]</td>
											<td>$data[tingkat_kepuasan]</td>
										</tr>
										";
	
									$no++;
									}
									/*$sql ="
										select * from presentase 
										inner join pesanan
											on presentase.id_pesanan=pesanan.id_pesanan 
										inner join menu
											on pesanan.id_menu=menu.id_menu
									";
									$hasil = mysqli_query($konek, $sql);
									$no=1;
									while($data = mysqli_fetch_assoc($hasil))
									{
										echo "
										<tr>
											<td>$no</td>
											<td>$data[id_menu]</td>
											<td>$data[nama_paket]</td>
											<td>$data[presentase]</td>
										</tr> 
										";
										
									$no++;
									}*/
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
		
		
		
		
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hasil Presentase</h1>
							<table class="table" id="dataTables-example">
								<thead>
									<tr>
										<th>No</th>
										<th>Id Menu</th>
										<th>Nama Menu</th>
										<th>Jumlah Feedback</th>
										<th>Rata-Rata Feedback</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "
										select * from hitung_fuzzy_
										inner join menu on hitung_fuzzy_.id_menu=menu.id_menu
										inner join presentase on presentase.id_menu=menu.id_menu
										GROUP BY menu.id_menu
									";
									/*$sql = "
										select * from hitungfuzzy
										inner join pesanan on hitungfuzzy.id_pesanan=pesanan.id_pesanan
										inner join menu on pesanan.id_menu=menu.id_menu
										inner join presentase on presentase.id_menu=menu.id_menu
										GROUP BY menu.id_menu
									";*/
									
									$hasil = mysqli_query($konek, $sql);
									$no=1;
									while($data = mysqli_fetch_assoc($hasil))
									{
										echo "
										<tr>
											<td>$no</td>
											<td>$data[id_menu]</td>
											<td>$data[nama_paket]</td>
											<td>$data[sigma]</td>
											<td>$data[presentase]</td>
											<td>$data[tingkat_kepuasan]</td>
										</tr>
										";
	
									$no++;
									}
									/*$sql ="
										select * from presentase 
										inner join pesanan
											on presentase.id_pesanan=pesanan.id_pesanan 
										inner join menu
											on pesanan.id_menu=menu.id_menu
									";
									$hasil = mysqli_query($konek, $sql);
									$no=1;
									while($data = mysqli_fetch_assoc($hasil))
									{
										echo "
										<tr>
											<td>$no</td>
											<td>$data[id_menu]</td>
											<td>$data[nama_paket]</td>
											<td>$data[presentase]</td>
										</tr> 
										";
										
									$no++;
									}*/
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

	<script>
    $(document).ready(function() {
        $('#dataTables-example-1').DataTable({
                responsive: true
        });
		$('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

	
</body>

</html>