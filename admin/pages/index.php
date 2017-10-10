
<?php
	ob_start();
	session_start();
	include("../config/config.php");
	
	if(empty($_SESSION['ID_User'])) {
		header("location:$url_login");
		die();
	}
	
	$id_user = $_SESSION['ID_User'];
	
	$sql = "select * from user where id_user = $id_user";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	$nama = $data['Nama'];
	 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="shortcut icon" type="image/x-icon" href="../config/title_icon/pln-logo.jpg">
	
	
	<style>
		#cbs {
			white-space:nowrap;
		}
	</style>
	

    <title>
		<?php
			if(!empty($_GET['menu'])) {
				$explode = explode('_', $_GET['menu']);
				
				$judul = '';
				for($i_explode=0; $i_explode<count($explode); $i_explode++) {
					$judul .= $explode[$i_explode];
					
					if($i_explode < count($explode)-1) $judul .= ' ';
				}
				
				echo ucwords($judul);
			}
		?>
	</title>

	<?php
		$konci_menu = false;
		if(empty($_GET['submenu'])) {
			$konci_menu = true;
		}
		else {
			if(
				$_GET['submenu'] != 'tampilkan_user' && 
				$_GET['submenu'] != 'ubah_user' && 
				$_GET['submenu'] != 'hapus_user' && 
				$_GET['submenu'] != 'tampilkan_data_kesehatan' && 
				$_GET['submenu'] != 'tampilkan_data_kesehatan_detail' && 
				$_GET['submenu'] != 'ubah_data_kesehatan' && 
				$_GET['submenu'] != 'ubah_data_kesehatan_detail' && 
				$_GET['submenu'] != 'hitung_data_kesehatan_proses' && 
				$_GET['submenu'] != 'hitung_data_kesehatan' && 
				$_GET['submenu'] != 'hapus_hasil_clustering_pegawai' && 
				$_GET['submenu'] != 'masukkan_data_kesehatan_proses' && 
				$_GET['submenu'] != 'hapus_data_kesehatan' && 
				$_GET['submenu'] != 'tampilkan_bobot_atribut_detail' && 
				$_GET['submenu'] != 'tampilkan_bobotatributbermasalah' && 
				$_GET['submenu'] != 'tampilkan_bobot_atribut' && 
				$_GET['submenu'] != 'tampilkan_bobot_atribut_bermasalah' && 
				$_GET['submenu'] != 'hapus_bobot_atribut' && 
				$_GET['submenu'] != 'tampilkan_konversi_data_kesehatan' && 
				$_GET['submenu'] != 'tampilkan_konversi_data_kesehatan_detail' && 
				$_GET['submenu'] != 'tampilkan_gold_standard' && 
				$_GET['submenu'] != 'masukkan_tindakan_preventif' && 
				$_GET['submenu'] != 'tampilkan_tindakan_preventif' && 
				$_GET['submenu'] != 'ubah_tindakan_preventif' && 
				$_GET['submenu'] != 'hapus_gold_standard' && 
				$_GET['submenu'] != 'hapus_tindakan_preventif' && 
				$_GET['submenu'] != 'tampilkan_hasil_clustering_pegawai' && 
				$_GET['submenu'] != 'cek_gold_standard' && 
				$_GET['submenu'] != 'tampilkan_hasil_clustering_pegawai_detail' &&
				$_GET['submenu'] != 'tampilkan_solusi_yang_diberikan' &&
				$_GET['submenu'] != 'tampilkan_solusi_yang_diberikan_detail' &&
				$_GET['submenu'] != 'cek_nilai_kolom' 
			) {
				$konci_menu = true;
			}
		}
		
		
		///echo "\$_GET[submenu] = $_GET[submenu], konci_menu = $konci_menu ";
		
		
		if($konci_menu) {
	?>
	
    
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">
 
    
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<?php
		}
		else {
	?>
	
	
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <!-- <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet"> -->
	
    
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<?php
		}
	?>
	
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php
		$konci_style_wrapper = false;
		$konci_style_wrapper1 = false;
		$konci_style_wrapper2 = false;
		$konci_style_wrapper3 = false;
		$konci_style_wrapper4 = false;
		$konci_style_wrapper5 = false;
		$konci_style_wrapper6 = false;
		$konci_style_wrapper7 = false;
		$konci_style_wrapper8 = false;
		
		if(!empty($_GET['submenu'])) {
			if(
				$_GET['submenu'] == 'ubah_data_kesehatan_detail'
			) {
				$konci_style_wrapper1 = true;
			}
			
			if(
				$_GET['submenu'] == 'hitung_data_kesehatan_proses'
			) {
				$konci_style_wrapper2 = true;
			}
			
			if(
								
				$_GET['submenu'] == 'tampilkan_bobot_atribut_bermasalah' ||
				$_GET['submenu'] == 'tampilkan_solusi_yang_diberikan' ||
				$_GET['submenu'] == 'tampilkan_hasil_clustering_pegawai' 
			) {
				$konci_style_wrapper3 = true;
			}
			
			if(
				$_GET['submenu'] == 'ampilkan_bobot_atribut_detail' || 
				$_GET['submenu'] == 'tampilkan_bobot_atribut_bermasalah' 
			) {
				$konci_style_wrapper4 = true;
			}
			
			if(
				$_GET['submenu'] == 'hapus_bobot_atribut' || 
				$_GET['submenu'] == 'tampilkan_data_kesehatan' ||
				$_GET['submenu'] == 'hitung_data_kesehatan' ||
				
				$_GET['submenu'] == 'hapus_data_kesehatan'
			) {
				$konci_style_wrapper5 = true;
			}
			
			if(
				$_GET['submenu'] == 'hapus_bobot_atribut3' || 
				$_GET['submenu'] == 'tampilkan_hasil_clustering_pegawai_detail' ||
				$_GET['submenu'] == 'tampilkan_solusi_yang_diberikan_detail'
			) {
				$konci_style_wrapper6 = true;
			}
			
			if(
				$_GET['submenu'] == 'tampilkan_data_kesehatan_detail'
			) {
				$konci_style_wrapper7 = true;
			}
			
			if(
				$_GET['submenu'] == 'tampilkan_gold_standard'
			) {
				$konci_style_wrapper8 = true;
			}
		}
		
		$konci_style_wrapper = '';
		if($konci_style_wrapper1) {
			$konci_style_wrapper = "style='width:190%;'";
		}
		if($konci_style_wrapper2) {
			$konci_style_wrapper = "style='width:290%;'";
		}
		if($konci_style_wrapper3) {
			$konci_style_wrapper = "style='width:110%;'";
		}
		if($konci_style_wrapper4) {
			$konci_style_wrapper = "style='width:140%;'";
		}
		if($konci_style_wrapper5) {
			$konci_style_wrapper = "style='width:120%;'";
		}
		if($konci_style_wrapper6) {
			$konci_style_wrapper = "style='width:130%;'";
		}
		if($konci_style_wrapper7) {
			$konci_style_wrapper = "style='width:210%;'";
		}
		if($konci_style_wrapper8) {
			$konci_style_wrapper = "style='width:105%;'";
		}
		
	?>
	
    <div id="wrapper" <?php echo $konci_style_wrapper; ?> >

        <!-- Navigation -->
        <?php include("navigation_top_right.php"); ?>

        <div id="page-wrapper">
        <?php include("content.php"); ?>
		<!-- /#page-wrapper -->
		</div>
    </div>
    <!-- /#wrapper -->
	
	<?php
		//echo "konci_menu=$konci_menu";
		if($konci_menu) {
	?>
    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
	

    
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
	<!--
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>
	-->

    
    <script src="../dist/js/sb-admin-2.js"></script>
	<?php
		}
	?>
	<script>
		/*
		$('a.coba_link').click(function() {
			$('a.coba_link').removeClass("active");
			$(this).addClass("active");
		});
		*/
	</script>

</body>

</html>
