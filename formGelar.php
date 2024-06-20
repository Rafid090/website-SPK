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
			<form class="row g-3" action ="inputGelar.php" method ="post">
				<div class="row align-self-center">
					<h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Data Gelar Calon Karyawan </h2>
						<div class="col mt-2">
						<label for="nama_gelar" class="form-label" style="font-size: 18px; color: #000;">Nama Gelar/Lulusan</label>
							<input type="text" class="form-control" name="nama_gelar" id="nama_gelar" autocomplete="off" required>
						</div>
				</div>
				<div class="row align-self-center">
						<div class="col py-3">					
						<select class="form-select form-select-sm" style="font-size: 18px;" aria-label=".form-select-sm example" name="gelar" required>
						<option value=""> Posisi </option>
							<?php
							$query = $koneksi->query("SELECT * from posisi");
							while($posisi = $query->fetch_array()) {
								echo "<option value=$posisi[id_posisi]> $posisi[nama_posisi] </option>";
							}
							?>
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