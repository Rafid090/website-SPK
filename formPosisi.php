<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }
  require 'koneksi.php';
  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SPK Karyawan Rumah Sakit KORPRI Samarinda </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>
    <div class="container py-5">
		<div class="position-absolute top-50 start-50 translate-middle">

			<form nama="myForm" class="row g-3" action ="inputPosisi.php" method ="post" onsubmit="return validate()">
				<div class="row align-self-center">
					<h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Data Posisi Pekerjaan </h2>
						<div class="col mt-2">
							<label for="nama" class="form-label" style="font-size: 16px;">Nama Posisi</label>
							<input type="text" class="form-control" name="nama_posisi" id="nama" autocomplete="off" required>
						</div>
						<div class="col mt-2">
							<label for="kode" class="form-label" style="font-size: 16px;">Kode</label>
							<input maxlength="5" type="number" min="1" class="form-control" name="kode_posisi" id="kode" autocomplete="off" required>
						</div>
							
						
				</div>
				<div class="row align-self-center"> 
					<div class="col mt-2">
						<button type="submit" class="btn btn-dark" name="submit"> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>