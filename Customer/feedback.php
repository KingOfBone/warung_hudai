<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];
$id_pesanan = $_GET['id_pesanan'];

$sql = "select * from menu inner join pesanan on menu.id_menu=pesanan.id_menu where id_pesanan = '$id_pesanan' ";
$hasil = mysqli_query($konek, $sql);

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
						$no=1;
						while ($data = mysqli_fetch_assoc($hasil))
							{ 
								echo "
								<h4 class='page-header'>Nama Menu : $data[nama_paket]</h4>
								";
							$no++;
							
							$no_pesanan = $data['no_pesanan'];
							}
						?>
						
						<div class="panel-body">
                            <div class="table-responsive">
								<form role="form" method="POST" action="fuzzy.php">
									<table class="table">
										<thead>
											<tr>
												<th></th>
												<th>Pertanyaan</th>
												<th>Nilai</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th colspan="3">Cita Rasa</th>
											</tr>
											<tr>
												<td>1</td>
												<td>Apakah komposisi menu sudah memenuhi kebutuhan asupan anda ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="komposisi" id="komposisi">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Apakah kombinasi makanan sesuai ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="kombinasi" id="kombinasi">
>
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Bagaimana dengan penyajian makanannya, apakah sudah baik ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="penyajian" id="penyajian">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Bagiamana Cita Rasa Masakan yang disajiakan ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="citarasa" id="citarasa">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>Apakah texture masakan  ? Kurang matang atau terlalu matang ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="texture" id="texture">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<th colspan="3">Tampilan</th>
											</tr>
											<tr>
												<td>1</td>
												<td>Apakah penataan makanan sudah benar ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="penataan" id="penataan">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Berapakah penilaian untuk kemasanan makanannya ? </td>
												<td>
												<div class="form-group">
												<select class="form-control" name="kemasan" id="kemasan">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<th colspan="3">Porsi</th>
											</tr>
											<tr>
												<td>1</td>
												<td>Apakah porsi nasi nya sudah cukup kurang ataukah terlalu banyak ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="nasi" id="nasi">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Apakah porsi lauk pauk nya sudah cukup kurang ataukah terlalu banyak ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="lauk" id="lauk">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Apakah kelengkapan kombinasi sudah memenuhi kebutuhan anda ?</td>
												<td>
												<div class="form-group">
												<select class="form-control" name="kelengkapan" id="kelengkapan">
													<?php 
														for($i=10;$i>=1;$i--)
														{
															$i2 = $i*10;
															echo "<option value='$i2'>$i2</option>";
														}
														?>
												</select>
												</div>
												</td>
											</tr>
											<tr>
												<th colspan="3">Harga</th>
											</tr>
											<td colspan="3">
												<div class="form-group">
													<label class="radio-inline">
														<input type="radio" name="harga" id="harga" value="100" checked>Sangat Murah
													</label>
													<label class="radio-inline">
														<input type="radio" name="harga" id="harga" value="80">Murah
													</label>
													<label class="radio-inline">
														<input type="radio" name="harga" id="harga" value="60">Sedang
													</label>
													<label class="radio-inline">
														<input type="radio" name="harga" id="harga" value="40">Mahal
													</label>
													<label class="radio-inline">
														<input type="radio" name="harga" id="harga" value="20">Sangat Mahal
													</label>
												</div>
											</td>
											<tr>
												<td colspan="3" align="center">
												<button type="submit" class="btn btn-default">Simpan</button>
												</td>
											</tr>
										</tbody>
									</table>
									
									<input type='hidden' name='id_pesanan' value='<?php echo $id_pesanan; ?>' >
									
									<input type='hidden' name='no_pesanan' value='<?php echo $no_pesanan; ?>' >
									
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