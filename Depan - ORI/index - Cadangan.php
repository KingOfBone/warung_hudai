<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Warung Hudai</title>
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
	<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-right">
		<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
								<!--<div class="banner-info">
									<h3>Smart But Casual</h3>
									<p>Start your shopping here...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3>Shop Online</h3>
									<p>Start your shopping here...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								  <h3>Pack your Bag</h3>
									<p>Start your shopping here...</p>
								</div>-->								
							</li>
						</ul>
					</div>
					<!--banner-->
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	</div>
		</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
				
				<div class="online-strip">
					<div class="col-md-4 follow-us">
						<h3>follow us : <a class="twitter" href="#"></a><a class="facebook" href="#"></a></h3>
					</div>
					<div class="col-md-4 shipping-grid">
						<div class="shipping">
							<img src="images/shipping.png" alt="" />
						</div>
						
						<div class="shipping-text">
							<h3>Free Shipping</h3>
							<p>Jabodetabek</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 online-order">
						<p>CS</p>
						<h3>Tel : 0858 1494 9874</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="products-grid">
				<?php
					$sql = "select now() 'waktu_sekarang'";
					$hasil = mysqli_query($konek, $sql);
					$data = mysqli_fetch_assoc($hasil);
					$waktu_sekarang = date('h', strtotime($data['waktu_sekarang']));
					
					if($waktu_sekarang >= 6 and $waktu_sekarang <=12)
						$menu = "Sarapan";
					else if($waktu_sekarang >= 12 and $waktu_sekarang <=15)
						$menu = "Makan Siang";
					else	
						$menu = "Makan Malam";
						
					if($menu == "Sarapan")
						$menu_berikutnya = "Makan Siang";
					else if($menu == "Makan Siang")
						$menu_berikutnya = "Makan Malam";
					else	
						$menu_berikutnya = "Sarapan";
						
					
				?>
				
				<header>
					<h3 class="head text-center">Menu Sekarang : <?php echo $menu; ?></h3>
				</header>
					<?php
						$sql = "select * from menu where jenis = '$menu'";
						$hasil = mysqli_query($konek, $sql);
						
						while($data = mysqli_fetch_assoc($hasil)) {
					?>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single.html"><img src="images/<?php echo $data['gambar']; ?>" alt="" /></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="single.html"><?php echo $data['nama_paket']; ?></a>
						<!--<p><a class="item_add" href="#"><i></i> <span class="item_price">$329</span></a></p>-->
					</div>
					<?php
						}
					?>
					
					
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Menu Berikutnya : <?php echo $menu_berikutnya; ?></h3>        			
			 <ul id="flexiselDemo3">
				<?php
					$sql = "select * from menu where jenis = '$menu_berikutnya'";
					$hasil = mysqli_query($konek, $sql);
					
					while($data = mysqli_fetch_assoc($hasil)) {
				?>
				
				<li><a href="single.html"><img src="images/<?php echo $data['gambar']; ?>" class="img-responsive" alt="" /></a>
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="single.html"><?php echo $data['nama_paket']; ?></a>
					<!--<p><a class="item_add" href="#"><i></i> <span class=" item_price">$759</span></a></p>
					</div>-->
				</li>
				<?php
					}
				?>
				<li><a href="single.html"><img src="images/majair asam manis.jpg" class="img-responsive" alt="" /></a>						
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="single.html">Mujair Asam Manis</a>
					</div>
				</li>
				<li><a href="single.html"><img src="images/resep_pindang_patin_03.jpg" class="img-responsive" alt="" /></a>
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="single.html">Pindang Patin</a>
					</div>
				</li>
				<li><a href="single.html"><img src="images/mujair-asam-manis.jpg" class="img-responsive" alt="" /></a>
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="single.html">Kakap Asam Manis</a>
					</div>
				</li>
				<li><a href="single.html"><img src="images/Resep-Cara-Memasak-Telur-Ikan-Goreng-Tepung-Gurih-dan-Renyah.jpg" class="img-responsive" alt="" /></a>
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="single.html">Telur Ikan Tepung</a>
					</div>
				</li>
			 </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->
		<!--
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>JOIN OUR MAILING LIST</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		-->
		<!--
		<div class="footer">
		<div class="container">
		 <div class="footer_top">
			<div class="span_of_4">
				<div class="col-md-3 span1_of_4">
					<h4>Shop</h4>
					<ul class="f_nav">
						<li><a href="#">new arrivals</a></li>
						<li><a href="#">men</a></li>
						<li><a href="#">women</a></li>
						<li><a href="#">accessories</a></li>
						<li><a href="#">kids</a></li>
						<li><a href="#">brands</a></li>
						<li><a href="#">trends</a></li>
						<li><a href="#">sale</a></li>
						<li><a href="#">style videos</a></li>
					</ul>	
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>help</h4>
					<ul class="f_nav">
						<li><a href="#">frequently asked  questions</a></li>
						<li><a href="#">men</a></li>
						<li><a href="#">women</a></li>
						<li><a href="#">accessories</a></li>
						<li><a href="#">kids</a></li>
						<li><a href="#">brands</a></li>
					</ul>	
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>account</h4>
					<ul class="f_nav">
						<li><a href="account.html">login</a></li>
						<li><a href="register.html">create an account</a></li>
						<li><a href="#">create wishlist</a></li>
						<li><a href="checkout.html">my shopping bag</a></li>
						<li><a href="#">brands</a></li>
						<li><a href="#">create wishlist</a></li>
					</ul>				
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>popular</h4>
					<ul class="f_nav">
						<li><a href="#">new arrivals</a></li>
						<li><a href="#">men</a></li>
						<li><a href="#">women</a></li>
						<li><a href="#">accessories</a></li>
						<li><a href="#">kids</a></li>
						<li><a href="#">brands</a></li>
						<li><a href="#">trends</a></li>
						<li><a href="#">sale</a></li>
						<li><a href="#">style videos</a></li>
						<li><a href="#">login</a></li>
						<li><a href="#">brands</a></li>
					</ul>			
				</div>
				<div class="clearfix"></div>
				</div>
		  </div>
		  
		  <div class="cards text-center">
				<img src="images/cards.jpg" alt="" />
		  </div>
		  -->
		  <div class="copyright text-center">
				<p>© 2016 | Hudai Cafe Catering</p>
		  </div>
		</div>
		</div>
</body>
</html>