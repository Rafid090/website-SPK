<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }
  
  include_once('koneksi.php');

  $id = $_GET['id_karyawan'];
  $id1 = $_GET['id_dataset'];

  $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id_karyawan='$id'");
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
			<form class="row g-3" action ="inputEditKaryawan.php?id_karyawan=<?php echo $id; ?>" method ="post">
				<div class="row align-self-center">
					<h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Data Alternatif </h2>
						<div class="col mt-2">
							<label class="form-label" style="font-size: 16px;">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" value="<?php echo $row["nama"]?>" autocomplete="off" required>
						</div>
						<div class="col mt-2">
							<label for="inputEmail4" class="form-label" style="font-size: 16px;">Kode</label>
							<input maxlength="5" type="number" min="1" class="form-control" name="kode" value=<?php echo $row['kode']?> autocomplete="off" required>
						</div>
						<input type="hidden" type="date" class="form-control" value="<?php echo $id1 ?>" name="dataset" required>
				</div>
				<div class="row align-self-center">
						<div class="col py-4">
						<label class="form-label" style="font-size: 16px;">Pilih Gelar</label>
						<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="Gelar" autocomplete="off" required>
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM data_karyawan, gelar where id_karyawan = '$id' and gelar.id_gelar = data_karyawan.gelar");
							
							while($row = mysqli_fetch_array($query)) {?>
							<option selected hidden value =  "<?php echo $row['gelar']?>"> <?php echo $row['gelar'] ?></option>
						<?php	
							}
							$query = $koneksi->query("SELECT * from gelar");
							while($gelar = $query->fetch_array()) {
								echo "<option value=$gelar[id_gelar]> $gelar[gelar] </option>";
							}
							?>
						</select> 
					</div>
					<div class="col py-4">
						<label class="form-label" style="font-size: 16px;">Pilih Posisi Lamaran</label>
						<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="posisi_lamar" autocomplete="off" required>
						<?php
							$query1 = mysqli_query($koneksi, "SELECT * FROM data_karyawan, posisi where id_karyawan = '$id' and posisi.id_posisi = data_karyawan.posisi_lamar");
							
							while($row1 = mysqli_fetch_array($query1)) {?>
							<option selected hidden value =  "<?php echo $row1['nama_posisi']?>"> <?php echo $row1['nama_posisi'] ?></option>
						<?php	
							}
							$query2 = $koneksi->query("SELECT * from posisi");
							while($posisi = $query2->fetch_array()) {
								echo "<option value=$posisi[id_posisi]> $posisi[nama_posisi] </option>";
							}
							?>
						</select> 
					</div>
				</div>
				<div class="row align-self-center"> 
					<div class="col">
						<button type="submit" class="btn btn-dark" name="submit" value="update">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>