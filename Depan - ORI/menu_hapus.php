<?php
	include('../konek.php');
	
	$id_menu = $_POST['id_menu'];
	
	$sql = "delete from menu where id_menu = '$id_menu'";
	mysqli_query($konek, $sql);
	
	
	header("location:http://localhost/warung_hudai/Depan/menu.php");	
?>