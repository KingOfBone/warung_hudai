<!DOCTYPE html>
<?php SESSION_START();
include('../konek.php');
$id_customer = $_SESSION['id_customer'];
$nama = $_SESSION['nama'];

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CH - Edit Profil</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.html">Edit Profil</a>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-static-side -->
        </nav>

			<?php include('logout.php'); ?>
			
			<?php include('dropdown.php'); ?>
			
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Data Customer</h3>
						<?php
							$sql = "select * from customer where id_customer = '$id_customer'";
							$hasil=mysqli_query($konek, $sql);
							$data=mysqli_fetch_row($hasil);
							
						?>
						<form role="form" action="prosesedit_profil.php" method="post">
							<div class="form-group">
								<label>KartuIdentitas</label>
								<select class="form-control" name="kartuid">
									<option value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option>
									<option value="KTP">KTP</option>
									<option value="SIM">SIM</option>
									<option value="Paspor">Passpor</option>
								</select>
							</div>
							<div class="form-group" >
								<label>Nomor Kartu Identitas</label>
								<input  name="noid" class="form-control" placeholder="Masukkan Nomor Identitas" value="<?php echo $data[2]; ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input  name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo $data[3]; ?>">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea  name="alamat" class="form-control" rows="3"> <?php echo $data[4]; ?></textarea>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin :</label>
								<label><?php echo $data[5]; ?></label>
							</div>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker2'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="form-group">
								<label>Nomor Handphone</label>
								<input name="no_hp" class="form-control" placeholder="Masukkan No HP" value="<?php echo $data[7]; ?>">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input name="email" class="form-control" placeholder="Masukkan E-mail" value="<?php echo $data[8]; ?>">
							</div>
							<br>
							<h3 class="page-header">Data Akun</h3>
							<div class="form-group">
								<label>Username</label>
								<input name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $data[9]; ?>">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" placeholder="Masukkan password" value="<?php echo $data[10]; ?>">
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/js.js"></script>
	<script type="../text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>

</body>

</html>
