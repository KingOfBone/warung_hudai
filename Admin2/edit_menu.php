<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

$id_menu = $_GET['id_menu'];
//$nama = $_SESSION['nama'];
//$data = $_SESSION['id_customer'];

//echo $id_menu;
///$sql = "select nama from customer where id_customer = $id_customer";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- -Untuk Datetimepircker, Buka -->
	<link href="../Datetimepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../Datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

	<title>CH - Admin Edit Menu</title>
	<!-- -Tutup ->
	
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
                        <h1 class="page-header">Tambah Menu</h1>
						
						<?php
						
							$sql = "select * from menu where id_menu = '$id_menu'";
							$hasil=mysqli_query($konek, $sql);
							$data = mysqli_fetch_row($hasil);
							
						?>
						<form role="form" action="prosesedit_menu.php" method="post">
							<div class="form-group">
								<label>Nama Paket</label>
								<input  name="nama_paket" class="form-control" placeholder="Masukkan Paket" value="<?php echo $data[1];?>">
							</div>
							<div class="form-group">
								<label>Detail Menu</label>
								<input  name="detail_menu" class="form-control" placeholder="Masukkan Detail Menu" value="<?php echo $data[2];?>">
							</div>
							<div class="form-group">
								<label>Jenis Menu</label>
								<select class="form-control" name="jns_menu">
									<option value="<?php echo $data[3];?>"><?php echo $data[3];?></option>
									<option value="Sarapan">Sarapan</option>
									<option value="Makan Siang">Makan Siang</option>
									<option value="Makan Malam">Makan Malam</option>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
									<div class="controls input-append date form_datetime" data-date="<?php date("y-m-d"); ?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
										<input style="width:930px; height:35px;" size="16" type="text" name='tanggal' value="" readonly>
										<span style="width:40px; height:35px;" class="add-on"><i class="icon-remove"></i></span>
										<span style="width:40px; height:35px;" class="add-on"><i class="icon-th"></i></span>
									</div>
								<!--
								<select class="form-control" name="hari">
									<option value="<?php echo $data[4];?>"><?php echo $data[4];?></option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
								</select>
								-->
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input  name="harga" class="form-control" placeholder="Masukkan Harga" value="<?php echo $data[5]; ?>">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input  name="ket" class="form-control" placeholder="Masukkan Keterangan" value="<?php echo $data[6]; ?>">
							</div>
							<input type="hidden" name="id_menu" value="<?php echo $id_menu?>";
							<br>
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
	
	
	<!-- -Untuk Datetimepircker, Buka -->
<script type="text/javascript" src="../datetimepicker/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
<!-- -Tutup-->

	
</body>

</html>