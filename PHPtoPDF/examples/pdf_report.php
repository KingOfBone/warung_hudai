<?php
	ob_start();
	session_start();
	$ar = $_SESSION['ar'];



	$test = '';
	$i=1;
	foreach($ar[0] as $ar2) {
		$test .= "
			<tr>
				<td>$i</td>
				<td>$ar2[nama_paket]</td>
				<td>$ar2[no_pesanan]</td>
				<td>$ar2[jumlah]</td>
				<td>$ar2[harga]</td>
				<td>$ar2[biaya]</td>
				<td>$ar2[hari]</td>
				<td>$ar2[bulan]</td>
				<td>$ar2[tanggal]</td>
			</tr>
		";
		
		$i++;
	}


	//var_dump($ar);
	
	$pesanan = number_format($ar[1]['pesanan'], 0, '', '.');
	$harga = number_format($ar[1]['harga'], 0, '', '.');
	
	$strStart = $ar[1]['tanggal_awal']; 
	$strEnd   = $ar[1]['tanggal_akhir'];

	$dteStart = new DateTime($strStart); 
	$dteEnd   = new DateTime($strEnd); 	
	
	$dteDiff  = $dteStart->diff($dteEnd); 
	
	$jumlah_hari = $dteDiff->format("%d"); 
	

	
	$akhir = "
		<h4>Dari Tanggal : ". $ar[1]['tanggal_awal'] ." Sampai ". $ar[1]['tanggal_akhir'] ." ($jumlah_hari Hari)</h4> <br>
		<h4>Jumlah Pesanan : ". $pesanan ."</h4> <br>
		<h4>Jumlah Keuntungan Yang Didapat : Rp. ". $harga ."</h4> <br>
	";
	
	/* $akhir = "
		<h2>Tanggal Awal : ". $ar[1]['tanggal_awal'] ."</h2> <br>
		<h2>Tanggal Akhir : ". $ar[1]['tanggal_akhir'] ."</h2> <br>
		<h2>Pesanan : ". $ar[1]['pesanan'] ."</h2> <br>
		<h2>harga : ". $ar[1]['harga'] ."</h2> <br>
		<h2>biaya : ". $ar[1]['biaya'] ."</h2> <br>
	"; */



	 // INCLUDE THE phpToPDF.php FILE
	require("phpToPDF.php"); 

	// PUT YOUR HTML IN A VARIABLE
	$my_html = "<html>
	<head>
	<link href=\"http://phptopdf.com/bootstrap.css\" rel=\"stylesheet\">
	<link href=\"http://getbootstrap.com/examples/dashboard/dashboard.css\" rel=\"stylesheet\">
	 <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
		<script type=\"text/javascript\">
		  google.load('visualization', '1.0', {'packages':['corechart']});
		  google.setOnLoadCallback(drawChart);

		  function drawChart() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Topping');
			data.addColumn('number', 'Slices');
			data.addRows([
			  ['Selection 1', 3],
			  ['Selection 2', 1],
			  ['Selection 3', 1],
			  ['Selection 4', 1],
			  ['Selection 5', 2]
			]);

			var options = {'title':'Example Chart',
						   'width':800,
						   'height':600};

			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		  }
		</script>    
	</head>
	<body>

	 

			<h1 style='text-align:center;' class=\"page-header\">Keuntungan Sate PerHari</h1>
			
			$akhir
			
			<table class=\"table table-striped\">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Paket</th>
						<th>No Pesanan</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>(Jumlah x Harga) Total</th>
						<th>Hari Ke</th>
						<th>Bulan Ke</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					$test                
				</tbody>
			</table>
			
			
			<!--
			<h1 style='text-align:center;' class=\"page-header\">Keuntungan Sate PerHari</h1>
			<table class=\"table table-striped\">
				<thead>
					<tr>
						<th>Nosss</th>
						<th>Tanggal Awal</th>
						<th>Tanggal Akhir</th>
						<th>Jumlah Seluruh Pesanan</th>
						<th>Jumlah Seluruh Harga</th>
						<th>Jumlah Seluruh Biaya</th>
					</tr>
				</thead>
				<tbody>
					$akhir                
				</tbody>
			</table>
			-->
			
			$akhir
			
		  
		
			<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
			<script src=\"http://getbootstrap.com/dist/js/bootstrap.min.js\"></script>
			<script src=\"http://getbootstrap.com/assets/js/docs.min.js\"></script>
			</body>
		</html>";
	
	/* echo $my_html;
	die(); */

	// PUT YOUR HTML HEADER IN A VARIABLE
	$my_html_header="";


	// PUT YOUR HTML FOOTER IN A VARIABLE (AND I USE PAGE NUMBERS)
	$my_html_footer="
	<div style=\"display:block;\">
	  <div style=\"float:left; width:33%; text-align:left;\">
			  &nbsp; 
	  </div>
	  <div style=\"float:left; width:33%; text-align:center;\">
			 Page phptopdf_on_page_number of phptopdf_pages_total
	  </div>
	  <div style=\"float:left; width:33%; text-align:right;\">
			  &nbsp;
	   </div>
	   <br style=\"clear:left;\"/>
	</div>";




	// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
	$pdf_options = array(
	  "source_type" => 'html',
	  "source" => $my_html,
	  "action" => 'save',
	  "save_directory" => '../Download',
	  "file_name" => 'Laporan_Keuntungan.pdf',
	  "header" => $my_html_header,
	  "footer" => $my_html_footer);
	
	

	// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
	phptopdf($pdf_options);

	//header("location:E:\xampp\htdocs\Warung_Hudai\PHPtoPDF\Download\Laporan_Keuntungan.pdf");
	//echo "<script>location.href='../Download/Laporan_Keuntungan.pdf';</script>";
	echo "<script>location.href='../../depan/hasil_pencarian.php';</script>";
	//header("location:../../depan/hasil_pencarian.php");
	die();
	
	// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
	echo ("<a href='sample_pdf_report.pdf'>Download Your PDF</a>");
	
?>