
<?php include('../konek.php');
//$id_customer = $_POST['id_customer'];
?>

<ul class="nav navbar-top-links navbar-right">
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		</a>
		<ul class="dropdown-menu dropdown-user">
			<li><a href="edit_profil.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
			</li>
			<!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
			</li>
			<li class="divider"></li>
			-->
			<li><a href="../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
		</ul>
	</li>
</ul>
<ul class="nav navbar-top-links navbar-right">
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<?php
				$id_customer = $_SESSION['id_customer'];
				
				$sql = "
					SELECT * FROM `pesanan` 
					inner join menu on pesanan.id_menu = menu.id_menu
					inner join customer on pesanan.id_customer = customer.id_customer
					where 
					customer.id_customer = '$id_customer' AND
					delivery = 'Sudah Dikirim' AND
					status_hitung = 'Belum Dihitung' AND
					menu.id_menu not in (
						select id_menu from pesanan
						where id_customer = '$id_customer' AND 
						delivery = 'Sudah Dikirim' AND 
						status_hitung = 'Sudah Dihitung' 
						ORDER BY `pesanan`.`id_menu` ASC
					)
					group by menu.id_menu
				";
				$hasil = mysqli_query($konek, $sql);
				$data = mysqli_fetch_assoc($hasil);
				$jumlah_notif = mysqli_num_rows($hasil);
				
				$style = $jumlah_notif == 0 ? '' : "color:red";
				
				$jumlah_notif = $jumlah_notif == 0 ? '' : $jumlah_notif;
				
				$notif = $jumlah_notif == 0 ? "0 Notif" : "$jumlah_notif New Notif";
				
			?>
			
			<?php echo $jumlah_notif; ?> <i style='<?php echo $style; ?>' class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
		</a>
		<ul class="dropdown-menu dropdown-alerts">
			<li>
				<a href="pesanan.php">
					<div>
						<i class="fa fa-envelope fa-fw"></i><?php echo $notif; ?> 
						<span class="pull-right text-muted small"> </span>
					</div>
				</a>
			</li>                        
		</ul>
		<!-- /.dropdown-alerts -->
	</li>
</ul>
