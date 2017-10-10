<?php
	session_start();
	$id_menu = $_POST['id_menu'];
	
	
	if(empty($_SESSION['session_menu']))
		$_SESSION['session_menu'] = $id_menu;
	else {
		$session_menu = $_SESSION['session_menu'];
		$session_menu .= ', '.$id_menu;
		$_SESSION['session_menu'] = $session_menu;
	}
?>