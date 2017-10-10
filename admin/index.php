
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/">


<script language="javascript">
    <?php
		session_start();
		session_destroy();
		echo "window.location.href = \"login/\"";		
	?>	
</script>
</head>
<body>
Go to <a href="pages/">/pages/index.php</a>
</body>
</html>