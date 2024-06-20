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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Form Bobot Nilai</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container py-5">
		<div class="position-absolute top-50 start-50 translate-middle">
			<form class="row g-3" action ="inputBobot.php" method ="post">
				<div class="row align-self-center">
					<h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Data Bobot & Kriteria </h2>
						<div class="col mt-2">
							<label for="kode" class="form-label">Kode</label>
							<input maxlength="2" type="text" class="form-control" name="kode" id="kode" autocomplete="off" required>
						</div>
						<div class="col mt-2">
						<label for="nama_kriteria" class="form-label">Nama Kriteria</label>
							<input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" autocomplete="off" required>
						</div>
				</div>
				<div class="row align-self-center">
						<div class="col mt-3">
						<label for="bobot" class="form-label">Bobot</label>
							<input maxlength="1" min="0" max="9" type="number" class="form-control" name="bobot" id="bobot" autocomplete="off" required>
						</div>
						<div class="col mt-3">
				</div>
				<div class="row align-self-center">
						<div class="col py-4">
						<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="atribut" autocomplete="off" required>
							<option value="">Pilih Atribut</option>
							<option value="Benefit"> Benefit </option>
							<option value="Cost"> Cost </option>
						</select> 
					</div>
				</div>
				<div class="row align-self-center"> 
					<div class="col">
						<button type="submit" class="btn btn-dark" name="submit">Submit</button>
					</div>
				</div>
			</form>

		</div>
		
	</div>

</body>
</html>