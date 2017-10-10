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
						<form role="form" method='post' action='masukkan_user_content_proses.php'>
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
								<label>Nama</label>
								<input name='nama' class="form-control" placeholder="Masukkan Nama Anda ">
							</div>
							<div class="form-group">
								<label>Jabatan</label>
								<select name='jabatan' class="form-control">
									<option value='Deputy Manager SDM'>Deputy Manager SDM</option>
									<option value='Junior Officer Administrator SDM'>Junior Officer Administrator SDM</option>
								</select>
							</div>
							<div class="form-group">
								<label>No Telp</label>
								<input name='telp' class="form-control" placeholder="Masukkan Nomor Telpon Anda ">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input name='username' class="form-control" placeholder="Masukkan Username Anda ">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type='password' name='password' class="form-control" placeholder="Masukkan Password Anda ">
							</div>
							<button type="submit" class="btn btn-primary">Masukkan</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</form>
					</div>
					<!-- /.col-lg-6 (nested) -->
					
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
    
	
