<div class="navbar-default sidebar" role="navigation">
	<div style='margin-top:-40px;' class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
		
			<?php
			
				$konci_menu_utama = true;
				
				if($konci_menu_utama) {
					$daftar_menu = [
						0=>["nama"=>"Dashboard", "link"=>$url_dashboard, "class"=>"fa fa-dashboard fa-fw"],
						1=>["nama"=>"User", "link"=>$url_user, "class"=>"fa fa-bar-chart-o fa-fw"],
						2=>["nama"=>"Tindakan Preventif", "link"=>$url_tindakan_preventif, "class"=>"fa fa-table fa-fw"],
						3=>["nama"=>"Data Kesehatan", "link"=>$url_data_kesehatan, "class"=>"fa fa-table fa-fw"],
						4=>["nama"=>"Bobot Atribut", "link"=>$url_bobot_atribut, "class"=>"fa fa-table fa-fw"],
						5=>["nama"=>"Konversi Data Kesehatan", "link"=>$url_konversi_data_kesehatan, "class"=>"fa fa-table fa-fw"],
						6=>["nama"=>"Gold Standard", "link"=>$url_gold_standard, "class"=>"fa fa-table fa-fw"],
						7=>["nama"=>"Clustering", "link"=>$url_clustering, "class"=>"fa fa-table fa-fw"],
						8=>["nama"=>"Solusi", "link"=>$url_solusi, "class"=>"fa fa-table fa-fw"]
					];
					
					$daftar_sub_menu = [
						0=>[],
						1=>[
							0=>["nama"=>"Masukkan User", "link"=>$url_masukkan_user],
							1=>["nama"=>"Tampilkan User", "link"=>$url_tampilkan_user],
							2=>["nama"=>"Ubah User", "link"=>$url_ubah_user],
							3=>["nama"=>"Hapus User", "link"=>$url_hapus_user]
						],				
						2=>[
							0=>["nama"=>"Masukkan Tindakan Preventif", "link"=>$url_masukkan_tindakan_preventif],
							1=>["nama"=>"Tampilkan Tindakan Preventif", "link"=>$url_tampilkan_tindakan_preventif],
							2=>["nama"=>"Ubah Tindakan Preventif", "link"=>$url_ubah_tindakan_preventif],
							3=>["nama"=>"Hapus Tindakan Preventif", "link"=>$url_hapus_tindakan_preventif]
						],
						3=>[
							0=>["nama"=>"Masukkan Data Kesehatan", "link"=>$url_masukkan_data_kesehatan],
							1=>["nama"=>"Tampilkan Data Kesehatan", "link"=>$url_tampilkan_data_kesehatan],
							2=>["nama"=>"Hapus Data Kesehatan", "link"=>$url_hapus_data_kesehatan]
						],
						4=>[
							0=>["nama"=>"Tampilkan Bobot Atribut", "link"=>$url_tampilkan_bobot_atribut],
							1=>["nama"=>"Tampilkan Bobot Atribut Bermasalah", "link"=>$url_tampilkan_bobot_atribut_bermasalah]
						],
						5=>[
							0=>["nama"=>"Tampilkan Konversi Data Kesehatan", "link"=>$url_tampilkan_konversi_data_kesehatan]
						],
						6=>[
							0=>["nama"=>"Cek Gold Standard", "link"=>$url_cek_gold_standard],
							1=>["nama"=>"Tampilkan Gold Standard", "link"=>$url_tampilkan_gold_standard],
							2=>["nama"=>"Hapus Gold Standard", "link"=>$url_hapus_gold_standard]
						],
						7=>[
							0=>["nama"=>"Clustering Pegawai", "link"=>$url_clustering_pegawai],
							1=>["nama"=>"Tampilkan Hasil Clustering Pegawai", "link"=>$url_tampilkan_hasil_clustering_pegawai],
							2=>["nama"=>"Hapus Data Clustering", "link"=>$url_hapus_hasil_clustering_pegawai]
						],
						8=>[
							0=>["nama"=>"Tampilkan Tindakan Preventif yang Dipilih", "link"=>$url_tampilkan_solusi_yang_diberikan]
							
						]
					];
				}
				else {
					$daftar_menu = [
						0=>["nama"=>"Dashboard", "link"=>$url_dashboard, "class"=>"fa fa-dashboard fa-fw"],
						1=>["nama"=>"User", "link"=>$url_user, "class"=>"fa fa-bar-chart-o fa-fw"],
						2=>["nama"=>"Nilai Bobot", "link"=>$url_nilai_bobot, "class"=>"fa fa-table fa-fw"]						
					];
					
					$daftar_sub_menu = [
						0=>[],
						1=>[
							0=>["nama"=>"Masukkan User", "link"=>$url_masukkan_user],
							1=>["nama"=>"Tampilkan User", "link"=>$url_tampilkan_user],
							2=>["nama"=>"Ubah User", "link"=>$url_ubah_user],
							3=>["nama"=>"Hapus User", "link"=>$url_hapus_user]],				
						2=>[
							0=>["nama"=>"Masukkan Data Kesehatan", "link"=>$url_masukkan_data_kesehatan]]
					];
				}
				 
				
				
				
				for($i_daftar_menu=0; $i_daftar_menu<count($daftar_menu); $i_daftar_menu++) {
					$active_link = '';
					if(!empty($_GET["menu"])) {
						//echo ucwords($_GET["menu"])." = ".$daftar_menu[$i_daftar_menu]['nama'];
						$explode = $daftar_menu[$i_daftar_menu]['nama'];
						$explode = explode(' ', $explode);
						$menunyah = implode('_', $explode);
						$menunyah = strtolower($menunyah);

						$active_link = $_GET["menu"]==$menunyah ? "class='active'" : '';
						
						//echo "active_link = $_GET[menu]==".$menunyah." ? class='active' : '';";
					}
					
					
					/*
					if($i_daftar_menu==0&&empty($_GET["menu"])) {
						$active_link = "class='active'";
					}
					*/
					
					$style = $i_daftar_menu==0 ? "style='margin-top:50px;'" : '';
					//$active_link = $i_daftar_menu==0 ? '' : '';
					
					
					$span = !empty($daftar_sub_menu[$i_daftar_menu]) ? "<span class=\"fa arrow\"></span>" : '';
					
					//echo "active_link=$active_link";
					//$active_link = '';
					echo "
					<li $style>
						<a href=\"".$daftar_menu[$i_daftar_menu]['link']."\">
							<i  class='".$daftar_menu[$i_daftar_menu]['class']."'></i> ".$daftar_menu[$i_daftar_menu]['nama']." $span 
						</a>
					";
					
					if(!empty($daftar_sub_menu[$i_daftar_menu])) {
						echo "<ul class=\"nav nav-second-level\">";
						for($i_daftar_sub_menu=0; $i_daftar_sub_menu<count($daftar_sub_menu[$i_daftar_menu]); $i_daftar_sub_menu++) {
							/*
							if($_GET['submenu'] == "tampilkan_bobot_atribut_bermasalah") {
								if($daftar_sub_menu[$i_daftar_menu][$i_daftar_sub_menu]['nama'] == "Tampilkan Bobot Atribut Bermasalah") {
									echo "
									<li>
										<a href=\"".$daftar_sub_menu[$i_daftar_menu][$i_daftar_sub_menu]['link']."\" >Tampilkan Bobot Atribut</a>
									</li>
									<li>
										<a href=\"".$daftar_sub_menu[$i_daftar_menu][$i_daftar_sub_menu]['link']."\" >Tampilkan Bobot Atribut Bermasalah 3</a>
									</li>
									";
								}
							}
							else {
								*/
								echo "
								<li>
									<a href=\"".$daftar_sub_menu[$i_daftar_menu][$i_daftar_sub_menu]['link']."\">".$daftar_sub_menu[$i_daftar_menu][$i_daftar_sub_menu]['nama']."</a>
								</li>
								";								
							//}
						}
						echo "</ul>";
					}
					
					echo "
					</li>
					";
					
				}
			?>

			<!--
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button>
				</span>
				</div>
				// /input-group 
			</li>
			-->
		   
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>