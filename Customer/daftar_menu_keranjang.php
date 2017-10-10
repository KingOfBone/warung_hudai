<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];
$nama_menu = $_POST['nama_menu'];
	
	$sql = "select no_pesanan from pesanan order by no_pesanan desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0) {
		$explode = explode('P', $data['no_pesanan']);
		$no_pesanan = "P".($explode[1]+1);		
	}
	else
		$no_pesanan = "P10001";
	
	//asli candra
	/*$sql = "select distinct(no_keranjang) from keranjang_pesanan order by no_keranjang desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);*/

	//w ubah
	/*
	$sql = "select distinct(no_pesanan) from pesanan order by no_pesanan desc limit 1";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	if(mysqli_num_rows($hasil) > 0)
		$no_pesanan = $data['no_pesanan']+1;		
	else
		$no_pesanan = 1;
	*/
	
		
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
	
	<!--datepicker-->
	<!--<link rel="../Datepicker/stylesheet" href="bootstrap/css/bootstrap.min.css"/>-->
    <link rel="../Datepicker/stylesheet" href="datepicker/css/datepicker3.css"/>
	
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
                        <h1 class="page-header">Daftar Menu</h1>
							
						<?php
							$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];	
						?>
                        <div class="panel-body">
                            <table  style='margin-bottom:20px;'>
								<form name='form' method='post' action='daftar_menu_keranjang_proses.php'
								onSubmit='return validasi()'>
								<tr>
									<td>No Pesanan</td>
									<td>:</td>
									<td><input class="form-control" onClick='return validasi()' type='text' readonly name='no_keranjang' value='<?php echo $no_pesanan; ?>' /></td>
									<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>' />
									<input type='hidden' name='id_menu' value='<?php echo $id_menu; ?>' />
								</tr>
								<tr>
									<td>Nama Pesanan</td>
									<td>:</td>
									<td><input class="form-control" type='text' readonly name='nama_pesanan' value='<?php echo $nama_customer; ?>' /></td>
								</tr>
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
													$explode = explode('-', $nm); 
													$id_menu = $explode[0];
													$menu = $explode[1];
													$harga = $explode[2];
													
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
											<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>'>
											<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>'>
										</tbody>
									</table>
								</div>
										<input type='submit' value='Simpan'>
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
	
	<!--datepicker-->
	<!--<script src="../Datepicker/jquery.min.js"></script>
	<script src="../Datepicker/bootstrap/js/bootstrap.js"></script>-->
	<?php
		$scandir = scandir("../Datepicker/datepicker/css");
		
		foreach($scandir as $key=>$s) {
			if($s == '.' || $s == '..')
				unset($scandir[$key]);
		}
		
		foreach($scandir as $s) {
			echo "<script src='../Datepicker/datepicker/js/$s'></script> ";
		}
		
		
		$scandir = scandir("../Datepicker/datepicker/locales");
		
		foreach($scandir as $key=>$s) {
			if($s == '.' || $s == '..')
				unset($scandir[$key]);
		}
		
		foreach($scandir as $s) {
			echo "<script src='../Datepicker/datepicker/locales/$s'></script> ";
		}
	?>
	
	<script src="../Datepicker/datepicker/js/bootstrap-datepicker.js"></script> 
	<script src="../Datepicker/datepicker/js/bootstrap-datepicker.min.js"></script> 
	
	<script type="text/javascript">
		$(document).ready(function () {
			$('#tanggal').datepicker({
				format: "dd-mm-yyyy",
				autoclose:true
			});
		});
	</script>

	
</body>

</html>