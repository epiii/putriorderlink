<html>
<head>
	<title>Registrasi</title>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>
	<body>
		<div class="pageLoader"></div>
		<br />

		<div class="container">
			<div class="card">
				<div class="card-body">
					<h2>Registrasi</h2>
					<p>Silahkan registrasi terlebih dahulu bila ingin mendapatkan WA OrderLink</p>
					<br>
					<form method="post" action="proses_orderlink.php" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama Depan</label>
							<div class="col-sm-10">
								<input type="nama_dpn" class="form-control" id="nama_dpn" name="nama_dpn" placeholder="Masukkan Nama Depan" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nama Belakang</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_blk" placeholder="Masukkan Nama Belakang" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Nomor WhatsApp</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nomor" placeholder="08xx xxxx" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama" class="col-sm-2 col-form-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" name="gambar" />
							</div>
						</div>
						<div class="form-group row">
	    	        		<div class="offset-sm-2 col-sm-10">
            					<input type="submit" id="submit" value="Daftar" class="btn btn-info" />            					
            				</div>
	            		</div>					
					</form>
				</div>
			</div>
		</div>
	</body>

</html>
