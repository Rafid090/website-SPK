<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }
  
  include_once('koneksi.php');

  $id = $_GET['id_kriteria'];

  $query = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$id'");
  $row=mysqli_fetch_array($query);

  
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
			<form class="row g-3" action ="inputEditBobot.php?id_kriteria=<?php echo $id; ?>" method ="post">
				<div class="row align-self-center">
					<h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Data Bobot Kriteria </h2>
						<div class="col mt-2">
							<label for="inputEmail4" class="form-label">Kode</label>
							<input maxlength="2" type="text" class="form-control" name="kode" value=<?php echo $row['kode']?> autocomplete="off" required>
						</div>
						<div class="col mt-2">
						<label for="inputEmail4" class="form-label">Nama Kriteria</label>
							<input type="text" class="form-control" name="nama_kriteria" value="<?php echo $row['nama_kriteria']?>" autocomplete="off" required>
						</div>
				</div>
				<div class="row align-self-center">
						<div class="col mt-3">
						<label for="inputEmail4" class="form-label">Bobot</label>
							<input maxlength="1" min="0" max="9" type="text" class="form-control" name="bobot" value=<?php echo $row['bobot']?> autocomplete="off" required>
						</div>
				</div>
				<div class="row align-self-center">
						<div class="col py-4">
						<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="atribut" value=<?php echo $row['atribut']?> autocomplete="off" required>
							<option selected>Pilih Atribut</option>
							<option value="Benefit"> Benefit </option>
							<option value="Cost"> Cost </option>
						</select> 
					</div>
				</div>
				<div class="row align-self-center"> 
					<div class="col">
						<button type="submit" class="btn btn-dark" name="Bobot" value="Submit">Submit</button>
					</div>
				</div>
			</form>

		</div>
		
	</div>

</body>
</html>