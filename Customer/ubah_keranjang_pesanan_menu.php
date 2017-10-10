

<!DOCTYPE>
<html>
<head>
</head>


<!-- Bootstrap Core CSS -->
<link href="JS_dan_CSS/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="JS_dan_CSS/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="JS_dan_CSS/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



<body>

<?php 
	$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];	
?>
	<table width="780" border="1">
	<tr>
	<?php
		echo "<th width='121' scope='col'>&nbsp;</th>";
		
		foreach($hari as $h) {
			echo "<th width='121' scope='col'>$h</th>";
		}		
	?>
  </tr>
  <tr>
    <td>Menu Sarapan</td>
	
	
    <?php 		
		foreach($hari as $h) {
			$sqlmenu = "select * from menu inner join detail_menu on menu.id_detail_menu=detail_menu.id_detail_menu where hari = '$h' limit 1";
			
			$hasilmenu = mysqli_query($konek, $sqlmenu);
			$data = mysqli_fetch_assoc($hasilmenu);
			
			echo "<td><input type='radio' name='id_menu' value='$h-$data[id_menu]'>$data[nama_menu]</input><label data-toggle='modal' data-target='#myModal_$h'>Detail</label></td>";
			
			
			
			echo "
			<div class='modal fade' id='myModal_$h' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>$h</h4>
                                        </div>
                                        <div class='modal-body'>
                                           $data[nama_masakan]
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
			
			
			";
			
		}
	?>
	
	
	
	
	
  </tr>
  <tr>
    <td>Makan Siang</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Makan Malam</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td><input type='submit' value='Ubah' /></td>
  </tr>
  
</table>


</body>
</html>



<!-- jQuery -->
    <script src="JS_dan_CSS/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="JS_dan_CSS/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="JS_dan_CSS/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>