        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<!--Menu kiri bar-->
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cutlery"></i> Menu<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="tambah_menu.php">Tambahkan Menu</a>
                                </li>
                                <li>
                                    <a href="lihat_menu.php">List Menu</a>
                                </li>
								<li>
                                    <a href="#.php">Atur Menu</a>
                                </li>
							</ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md"></i> Customer<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="tambah_cus.php">Tambahkan Customer</a>
                                </li>
                                <li>
                                    <a href="lihat_customer.php">List Customer</a>
                                </li>
                                <li>
							</ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md"></i> Karyawan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="tambah_karyawan.php">Tambahkan Karyawan</a>
                                </li>
                                <li>
                                    <a href="lihat_karyawan.php">List Karyawan</a>
                                </li>
                                <li>
							</ul>
                        </li>
						<li>
							<a href="#"><i class="fa fa-check"></i> Pesanan <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="pesanan_skrg.php">Pesanan Hari Ini</a>
                                </li>
                                <li>
                                    <a href="konfirm_deliv.php">Konfirmasi Delivery Pesanan</a>
                                </li>
                                <li>
                                    <a href="lihat_pesanan.php">Daftar Pesanan</a>
                                </li>
                                <li>
							</ul>
						</li>
						<li>
                            <a href="#"><i class="fa fa-check"></i> Soal Fuzzy<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="tambah_soal_sekian.php">Tambahkan Soal</a>
                                </li>
                                <li>
                                    <a href="list_soal_sekian.php">List Soal</a>
                                </li>
							</ul>
                        </li>
                        <li>
                            <a href="hasil_fuzzy_sekian.php"><i class=" fa fa-bar-chart-o"></i> Hasil Survey Fuzzy</a>
                        </li>
						<li>
                            <a href="lihat_presentase.php"><i class=" fa fa-bar-chart-o"></i> Hasil Presentase Survey</a>
                        </li>
						<li>
                            <a href="jeda_survey.php"><i class=" fa fa-bar-chart-o"></i> Range Survey</a>
                        </li>
                    </ul>
                </div>
				
                <!-- /.sidebar-collapse -->
            </div>
			
			<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-
                        <li class="divider"></li>-->
                        <li><a href="../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
				</li>
			</ul>
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<?php
							//$id_customer = $_SESSION['id_customer'];
							
							$sql = "
								SELECT * FROM `pesanan` 
								where delivery = 'Belum Dikirim'								
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
							<a href="konfirm_deliv.php">
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

		</nav>
		