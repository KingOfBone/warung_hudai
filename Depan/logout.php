<?php
	session_start();
	session_destroy();
	
	header("location:http://localhost/warung_hudai/Depan");
	die();
?>