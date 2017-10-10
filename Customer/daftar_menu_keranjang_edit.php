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
	
	<!-- -Untuk Datetimepircker, Buka -->
	<!--<link href="../Datetimepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../Datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">-->
	
	<!--tambahan w-->
	<!-- Latest compiled and minified CSS -->
	
	<link rel="stylesheet" href="../datepicker/css/datepicker.css" >
	<script type="text/javascript" src="../bootstrap/js/bootstrap-datepicker.js"></script>
	
	<link rel="stylesheet" href="../bootstrap_datepicker/css/bootstrap.css" >
	<link rel="stylesheet" href="../bootstrap_datepicker/css/bootstrap.min.css" >
	<link rel="stylesheet" href="../bootstrap_datepicker/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="../bootstrap_datepicker/css/bootstrap-theme.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script href="../bootstrap_datepicker/jquery-3.1.0.min.js" ></script>

	<title>CH - Daftar Menu</title>
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
									<td><input class='form-control' onClick='return validasi()' type='text' readonly name='no_keranjang' value='<?php echo $no_pesanan; ?>' /></td>
									<input type='hidden' name='id_customer' value='<?php echo $id_customer; ?>' />
									<input type='hidden' name='id_menu' value='<?php echo $id_menu; ?>' />
								</tr>
								<tr>
									<td>Nama Pesanan</td>
									<td>:</td>
									<td><input class='form-control' type='text' readonly name='nama_pesanan' value='<?php echo $nama_customer; ?>' /></td>
								</tr>
								<tr>
									<td>Tanggal Pemesanan</td>
									<td>:</td>
									<td><input class='form-control' readonly type='text' name='tanggal' value='<?php echo $tanggal; ?>' /></td>
								</tr>
								<tr>
									<td>Tanggal Delivery</td>
									<td>:</td>
									<td>
										<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
											<input class="span2" size="16" type="text" value="12-02-2012">
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
										<!--<div class="form-group">
											<div class="controls input-append date form_datetime" data-date="<?php date("y-m-d"); ?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
											<input style="width:200px; height:35px;" size="16" type="text" name='tanggal' value="" readonly>
											<span style="width:40px; height:35px;" class="add-on"><i class="icon-remove"></i></span>
											<span style="width:40px; height:35px;" class="add-on"><i class="icon-th"></i></span>
											</div>
										</div>-->
									</td>
								</tr>
								</table>
								
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>No</th>
												<th>Hari</th>
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
													//$hari = $explode[2];
													$id_menu = $explode[0];
													$menu = $explode[1];
													$hari = $explode[2];
													$harga = $explode[3];
													echo "
														<tr>
															<td>$i</td>
															<td>$hari</td>
															<td>$menu</td>
															<td>$harga</td>
															<td>
															<input type='text' class='form-control' id='quantity_$i' name='quantity[]' />
															</td>
														</tr>
													
													<input type='hidden' name='id_menu[]' value='$id_menu'>
													";
													
													
													$i++;
												}
											?>
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

	<script type="text/javascript" src="../bootstrap_datepicker/js/bootstrap.js"></script>
	<script type="text/javascript" src="../bootstrap_datepicker/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap_datepicker/js/npm.js"></script>

	<!-- -Untuk Datetimepircker, Buka -->
	<script type="text/javascript">
	$('.datepicker').datepicker()
	$('#dp5').datepicker()
  .on('changeDate', function(ev){
	
	var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
	//$('.datepicker').datepicker({
    //format: 'mm/dd/yyyy',
    //startDate: '-3d'
	//});
	</script>
<!--<script type="text/javascript" src="../datetimepicker/bootstrap/js/bootstrap.min.js"></script>
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
</script>-->
<!-- -Tutup-->
	
</body>

</html>