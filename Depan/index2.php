
<style>
	#q-graph {
	  display: block;
	  /* fixes layout wonkiness in FF1.5 */
	  position: relative;
	  width: 600px;
	  height: 300px;
	  margin: 1.1em 0 0;
	  padding: 0;
	  background: transparent;
	  font-size: 11px;
	}

	#q-graph caption {
	  caption-side: top;
	  width: 600px;
	  text-transform: uppercase;
	  letter-spacing: .5px;
	  top: -40px;
	  position: relative;
	  z-index: 10;
	  font-weight: bold;
	}

	#q-graph tr, #q-graph th, #q-graph td {
	  position: absolute;
	  bottom: 0;
	  width: 150px;
	  z-index: 2;
	  margin: 0;
	  padding: 0;
	  text-align: center;
	}

	#q-graph td {
	  -webkit-transition: all .3s ease;
	  transition: all .3s ease;
	}
	#q-graph td:hover {
	  background-color: #4d4d4d;
	  opacity: .9;
	  color: white;
	}

	#q-graph thead tr {
	  left: 100%;
	  top: 50%;
	  bottom: auto;
	  margin: -2.5em 0 0 5em;
	}

	#q-graph thead th {
	  width: 7.5em;
	  height: auto;
	  padding: 0.5em 1em;
	}

	#q-graph thead th.sent {
	  top: 0;
	  left: 0;
	  line-height: 2;
	}

	#q-graph thead th.paid {
	  top: 2.75em;
	  line-height: 2;
	  left: 0;
	}

	#q-graph tbody tr {
	  height: 296px;
	  padding-top: 2px;
	  border-right: 1px dotted #C4C4C4;
	  color: #AAA;
	}

	#q-graph #q1 {
	  left: 0;
	}

	#q-graph #q2 {
	  left: 150px;
	}

	#q-graph #q3 {
	  left: 300px;
	}

	#q-graph #q4 {
	  left: 450px;
	  border-right: none;
	}

	#q-graph tbody th {
	  bottom: -1.75em;
	  vertical-align: top;
	  font-weight: normal;
	  color: #333;
	}

	#q-graph .bar {
	  width: 60px;
	  border: 1px solid;
	  border-bottom: none;
	  color: #000;
	}

	#q-graph .bar p {
	  margin: 5px 0 0;
	  padding: 0;
	  opacity: .4;
	}

	#q-graph .sent {
	  left: 13px;
	  background-color: #39cccc;
	  border-color: transparent;
	}

	#q-graph .paid {
	  left: 77px;
	  background-color: #7fdbff;
	  border-color: transparent;
	}

	#ticks {
	  position: relative;
	  top: -300px;
	  left: 2px;
	  width: 596px;
	  height: 300px;
	  z-index: 1;
	  margin-bottom: -300px;
	  font-size: 10px;
	  font-family: "fira-sans-2", Verdana, sans-serif;
	}

	#ticks .tick {
	  position: relative;
	  border-bottom: 1px dotted #C4C4C4;
	  width: 600px;
	}

	#ticks .tick p {
	  position: absolute;
	  left: -5em;
	  top: -0.8em;
	  margin: 0 0 0 0.5em;
	}
	
	.tablenya {
		margin-top:2%;
		margin-left:10%;
	}
	
	.tablenyap {
		color:black;
		text-align:center;
	}
</style>



<!DOCTYPE html>
<html>
<head>
<title>Monitoring Penjualan Makanan</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
	<!-- header-section-starts -->
	<!-- header-section-ends -->
	<?php include("atas.php")?>
	
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">			
				<div class='tablenya'>
					<h2 class='tablenyap'>Hasil Penjualan</h2>
					<table id="q-graph">
						<thead>
							<tr>
								<th></th>
								<th class="sent">Tahun Lalu</th>
								<th class="paid">Sekarang</th>
							</tr>
						</thead>
						
						<tbody>
							<tr class="qtr" id="q1">
								<th scope="row">Sate Ayam</th>
								<td class="sent bar" style="height: 80px;"><p>1.450.00</p></td>
								<td class="paid bar" style="height: 99px;"><p>2.500.00</p></td>
							</tr>
							<tr class="qtr" id="q2">
								<th scope="row">Soto Ayam</th>
								<td class="sent bar" style="height: 108px;"><p>3.340.72</p></td>
								<td class="paid bar" style="height: 113px;"><p>4.340.72</p></td>
							</tr>
							<tr class="qtr" id="q3">
								<th scope="row">Gulai Ayam</th>
								<td class="sent bar" style="height: 135px;"><p>5.145.52</p></td>
								<td class="paid bar" style="height: 108px;"><p>3.225.52</p></td>
							</tr>
							<tr class="qtr" id="q4">
								<th scope="row">Ayam Bakar Khas Kulo</th>
								<td class="sent bar" style="height: 140px;"><p>6.415.96</p></td>
								<td class="paid bar" style="height: 142px;"><p>6.425.00</p></td>
							</tr>
						</tbody>
					</table>

					<div id="ticks">						
						<div class="tick" style="height: 59px;"><p>50.000.000</p></div>
						<div class="tick" style="height: 59px;"><p>20.000.000</p></div>
						<div class="tick" style="height: 59px;"><p>10.000.000</p></div>
						<div class="tick" style="height: 59px;"><p>5.000.000</p></div>
						<div class="tick" style="height: 59px;"><p>1.000.000</p></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="other-products">
			<div class="container">
			</div>
		</div>
		<div class="copyright text-center">
			<p>© 2016 | Hudai Cafe Catering</p>
		</div>		
	</body>
</html>