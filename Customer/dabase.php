<?php
foreach($hari as $h) {
	$sql = "select * from menu where jenis = 'sarapan' and hari = '$h' ";
	$hasil = mysqli_query($konek, $sql);
	$data = mysqli_fetch_assoc($hasil);
	
	$sql = "select * from menu where jenis = 'makan siang' and hari = '$h' ";
	$hasil = mysqli_query($konek, $sql);
	$data2 = mysqli_fetch_assoc($hasil);
	
	$sql = "select * from menu where jenis = 'makan malam' and hari = '$h' ";
	$hasil = mysqli_query($konek, $sql);
	$data3 = mysqli_fetch_assoc($hasil);
	
	echo "<tr>
		<td>$h</td>
		<td><input type='checkbox'name='nama_menu[]' value='$data[id_menu]-$data[nama_paket]-$data[Hari]-$data[harga]'>$data[nama_paket]</input>
		
		<label data-toggle='modal' data-target='#myModal_sarapan_$h'>Detail</label>
		</td>
		
		
		<td><input type='checkbox'name='nama_menu[]' value='$data2[id_menu]-$data2[nama_paket]-$data2[Hari]-$data2[harga]'>$data2[nama_paket]</input>
		
		<label data-toggle='modal' data-target='#myModal_makan_siang_$h'>Detail</label>
		</td>
		
		
		<td><input type='checkbox'name='nama_menu[]' value='$data3[id_menu]-$data3[nama_paket]-$data3[Hari]-$data3[harga]'>$data3[nama_paket]</input>
		
		<label data-toggle='modal' data-target='#myModal_makan_malam_$h'>Detail</label>
		</td>
	</tr>
	
	<div class='modal fade' id='myModal_sarapan_$h' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
	<div class='modal-content'>
	<div class='modal-header'>
	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	<h4 class='modal-title' id='myModalLabel'>$h</h4>
	</div>
	<div class='modal-body'>
	$data[detail_menu] - Harga : Rp. $data[harga]
	</div>
	<div class='modal-footer'>
	<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>

	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	
	<div class='modal fade' id='myModal_makan_siang_$h' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
	<div class='modal-content'>
	<div class='modal-header'>
	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	<h4 class='modal-title' id='myModalLabel'>$h</h4>
	</div>
	<div class='modal-body'>
	$data2[detail_menu] - Harga : Rp. $data2[harga]
	</div>
	<div class='modal-footer'>
	<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>

	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	
	
	<div class='modal fade' id='myModal_makan_malam_$h' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
	<div class='modal-content'>
	<div class='modal-header'>
	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
	<h4 class='modal-title' id='myModalLabel'>$h</h4>
	</div>
	<div class='modal-body'>
	$data3[detail_menu] - Harga : Rp. $data3[harga]
	</div>
	<div class='modal-footer'>
	<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>

	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>";
?>