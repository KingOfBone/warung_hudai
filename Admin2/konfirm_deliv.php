<!DOCTYPE html>
<?php 
session_start();
include('../konek.php');

//$id_customer = $_SESSION['id_customer'];
//$nama = $_SESSION['nama'];
//$data = $_SESSION['id_customer'];

//echo $id_customer;
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>CH - Admin Delivery</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>


<script>
	function kirim(index) {
		var select = document.getElementsByTagName('select');
		var value = select[index].value;
		
		window.top.location.href = "konfirm_deliv_proses.php?value="+value;
	}
</script>

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
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
									<form method='post' action="konfirm_deliv_proses.php">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pemesan</th>
												<th>Nama Menu</th>
												<th>Jumlah</th>
												<th>Tanggal</th>
												<th>Status Delivery</th>
												<th>Konfirmasi</th>
											</tr>
										</thead>
										<tbody>
										<?php

										$sql = "
											SELECT * FROM pesanan 
											inner join menu on pesanan.id_menu=menu.id_menu
											inner join customer on pesanan.id_customer=customer.id_customer
											where delivery = 'Belum Dikirim'
											order by id_pesanan desc
										"; 
										//$sql = "select * from customer"
										$hasil = mysqli_query($konek, $sql);
										$no=1;
										while($data = mysqli_fetch_assoc($hasil))
										{
											echo "
											<tr>
												<input type='hidden' name='id_pesanan[]' value='$data[id_pesanan]'>
												
												<td>$no</td>
												<td>$data[nama]</td>
												<td>$data[nama_paket]</td>
												<td>$data[jumlah]</td>
												<td>$data[tanggal]</td>
												<td>$data[delivery]</td>
												<td>
													<div class='form-group'>
													<select onChange='kirim(".($no-1).")' class='form-control' name='delivery[]'>
														<option value=''>-- Pilih --</option>
														<option value='$data[id_pesanan] - Belum Dikirim'>Belum Dikirim</option>
														<option value='$data[id_pesanan] - Sudah Dikirim'>Sudah Dikirim</option>
														<option value='$data[id_pesanan] - Gagal Dikirim'>Gagal Dikirim</option>
													</select>
													</div>
												</td>
											</tr> 
											";
											
											$no++;
										}
										?>
										<tr>
											<td colspan="7" align="center">
											<button type="submit" class="btn btn-default">Simpan</button>
											</td>
										</tr>
										</tbody>
									</form>
                                </table>
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