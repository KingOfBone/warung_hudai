<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

$nama = $_SESSION['nama'];


	
	$sql = "select id_keranjang_pesanan from keranjang_pesanan order by id_keranjang_pesanan desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0)
		$no_pesanan = $data['id_keranjang_pesanan'];
	else
		$no_pesanan = 1;

	
	$sql = "select distinct(no_keranjang) from keranjang_pesanan order by no_keranjang desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0)
		$no_keranjang = $data['no_keranjang']+1;		
	else
		$no_keranjang = 1;	
	
	$sql = "select * from customer where id_customer = '$id_customer'";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$nama_customer = $data['nama'];
	
	$sql = "select now() 'sekarang'";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$tanggal = $data['sekarang'];
	
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

	<title>CH - Daftar Menu</title>
	
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
			
			<style>
				td {height:50px;}
			</style>
		
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar Menu Masakan Harian</h1>
							
						<?php
							$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];	
							
						?>
                        <div class="panel-body">
							<form method='post' action='daftar_menu_keranjang.php'>
								<?php 
									$jenis = ['Sarapan', 'Makan Siang', 'Makan Malam'];
									for($i_table=0; $i_table<3; $i_table++) { 
								?>
                            <div style='margin-bottom:200px; float:left;'>
									<table width='300px'>
										<thead>
											<tr>
												<th><?php echo $jenis[$i_table]; ?></th>
												<!--
													<th>Hari</th>
													<th>Tangal</th>
													<th>Sarapan</th>
													<th>Makan Siang</th>
													<th>Makan Malam</th>
												-->
											</tr>
										</thead>
										<tbody>
											<?php											
												$sql = "select * from menu where jenis = '$jenis[$i_table]' ";
												$hasil = mysqli_query($konek, $sql);
												
												$h= !empty($h) ? $h : 1;
												while($data = mysqli_fetch_assoc($hasil)) {
													echo "
														<tr>
															<!--<td>$h</td>
															<td> Tambahin tanggal</td>-->
															<td><input type='checkbox'name='nama_menu[]' value='$data[id_menu]-$data[nama_paket]-$data[Hari]-$data[harga]'>$data[nama_paket]</input>
															
															<label data-toggle='modal' data-target='#myModal_sarapan_$h'>Detail</label>
															</td>												
														</tr>
														
														<div class='modal fade' id='myModal_sarapan_$h' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
														<div class='modal-dialog'>
														<div class='modal-content'>
														<div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
														<h4 class='modal-title' id='myModalLabel'>$h</h4>
														</div>
														<div class='modal-body'>
														$data[detail_menu] - Harga : Rp. $data[harga]
														</div>
														<div class='modal-footer'>
														<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>

														</div>
														</div>
														<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
														</div>											
													";
													
													$h++;
												}
												
											?>
											
										</tbody>
									</table>
							</div>
								<?php } ?>
							
							<input style='margin-left:10px' type='submit' value='Submit'>
							
							</form>
								
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