	
	
	<?php
		ob_start();
		session_start();
		include('../konek.php');
		
		
		if(empty($_SESSION['id_user'])) {
			header("location:http://localhost/warung_hudai/login.php");
			die();			
		}
		
		if(!empty($_SESSION['id_user']))
			$id_customer = $_SESSION['id_user'];
	?>
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<!--
						<li><a href="../login.php"><span class="glyphicon glyphicon-user"> </span>Login</a></li> 
						<li><a href="../daftar_cus.php"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>
						-->
					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<!--<a href="checkout.html">
								<h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)<img src="images/bag.png" alt=""></h3>
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
							-->
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


<div class="banner-top">
		<div class="container">
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
			
			<div style='width:150%' class="logo">
				<h1><a href="index.html">Monitoring Penjualan Makanan</a></h1>
			</div>
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
				<li><a href="http://localhost/warung_hudai/Depan">Home</a></li>
		        <!--
				<li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Sarapan <br>(06.00 - 12.00)</h6>
						            <?php
										$sql = "select nama_paket from menu where jenis = 'sarapan' limit 3";
										$hasil = mysqli_query($konek, $sql);
										
										while($data = mysqli_fetch_assoc($hasil)) {
											echo "<li><a>$data[nama_paket]</a></li>";
										}
									?>
					            </ul>
				            </div>
							<div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Makan Siang <br>(12.00 - 15.00)</h6>
						            <?php
										$sql = "select nama_paket from menu where jenis = 'makan siang' limit 3";
										$hasil = mysqli_query($konek, $sql);
										
										while($data = mysqli_fetch_assoc($hasil)) {
											echo "<li><a>$data[nama_paket]</a></li>";
										}
									?>
					            </ul>
				            </div>
							<div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Makan Malam <br>(15.00 - 06.00)</h6>
						            <?php
										$sql = "select nama_paket from menu where jenis = 'makan malam' limit 3";
										$hasil = mysqli_query($konek, $sql);
										
										while($data = mysqli_fetch_assoc($hasil)) {
											echo "<li><a>$data[nama_paket]</a></li>";
										}
									?>
					            </ul>
				            </div>
							<div class="clearfix"></div>
			            </div>
		            </ul>
		        </li>
				-->
		        <?php
					if(!empty($_SESSION['status'] == 'owner'))
						echo "<li><a href='pencarian.php'>PENCARIAN</a></li>";
				?>
		        
				<?php
					if(empty($_SESSION['id_user'])) {
						echo "<li><a href='contact.php'>CONTACT</a></li>";
						echo "<li><a href='../login.php'>LOGIN</a></li>";						
					}
					else {
						if($_SESSION['status'] == 'owner') {
							/* echo "
								<li class='dropdown'>
									<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Pesanan<b class='caret'></b></a>
									<ul class='dropdown-menu multi-column columns-3'>
										<div class='row'>
											<div class='col-sm-4'>
												<ul class='multi-column-dropdown'>
													<li><a href='pesanan.php'>Pesan Makanan</a></li>
													<li><a href='history_pesanan.php'>History Pesanan</a></li>
												</ul>
											</div>
											
											<div class='clearfix'></div>
										</div>
									</ul>
								</li>
							";
							 */
							
							
							echo "<li><a href='contact.php'>CONTACT</a></li>";
						}
						else {
							echo "<li><a href='menu.php'>Menu</a></li>";
							echo "<li><a href='pesanan_adm.php'>Pesanan</a></li>";							
						}
						
						echo "<li><a href='logout.php'>LOGOUT</a></li>";						
					}
				?>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
</div>