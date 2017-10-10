<?php
	if(empty($_GET['menu'])) {
		include("dashboard_content.php");
	}
	else {
		if(empty($_GET['submenu'])) {
			include($_GET['menu']."_content.php");
		}
		else {
			if($_GET['submenu'] == 'tampilkan_bobotatributbermasalah')
				include("tampilkan_bobot_atribut_bermasalah_content.php");
			else	
				include($_GET['submenu']."_content.php");
		}
	}
	
?>






