<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			<?php
				if(!empty($_GET['submenu'])) {
					$explode = explode('_', $_GET['submenu']);
					
					$judul = '';
					for($i_explode=0; $i_explode<count($explode); $i_explode++) {
						$judul .= $explode[$i_explode];
						
						if($i_explode < count($explode)-1) $judul .= ' ';
					}
					
					echo ucwords($judul);
				}
			?>
		</h1>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form enctype='multipart/form-data' role="form" method='post' action='<?php echo $url_masukkan_data_kesehatan_utk_nilai_bobot_proses ?>'>
							<div class="form-group">
								<?php
									if(!empty($_GET['pesan'])) {
										if(strpos($_GET['pesan'], 'berhasil')) $style = "style='color:blue;'";
										else $style = "style='color:red;'";
										
										echo "<label $style>$_GET[pesan]</label>";
									}
									
								
								?>
								
								
								
							</div>
							<div class="form-group">
								<label>Masukkan file data kesehatan berupa excel</label>
								<input type="file" name='data_kesehatan'>
							</div>
							
							<button type="submit" class="btn btn-primary">Masukkan</button>
						</form>
					</div>
					<!-- /.col-lg-6 (nested) -->
					
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			
		</div>
		
	</div>
	
</div>
