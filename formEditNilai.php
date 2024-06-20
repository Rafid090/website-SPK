<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }
  require 'koneksi.php';

  $id = $_GET['id_karyawan'];

  $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id_karyawan='$id'");
  $row=mysqli_fetch_assoc($query);
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

			<form class="row g-3" action ="inputEditNilai.php?id_karyawan=<?php echo $id; ?>" method ="post">
                <div class="row align-self-center mt-3">
                <h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Input Nilai </h2>

                    <select class="form-select form-select-sm" required id="id_karyawan" name="id_karyawan">
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan where id_karyawan = '$id' "); 
                    while($row = mysqli_fetch_array($query)) {?>
                        <option selected hidden value =  "<?php echo $row['id_karyawan']?>"> <?php echo $row['nama'] ?></option>
                        <?php
                                $query5 = mysqli_query($koneksi, "SELECT * from data_karyawan");
                                while($a = mysqli_fetch_array($query5)){
                                echo "<option value=\"$a[id_karyawan]\">$a[nama] </option>";
                                }
                            } ?>
                    </select>
                            <?php
                            
                            $query=mysqli_query($koneksi, "SELECT nilai.id_kriteria, nilai.id_karyawan from nilai, kriteria, data_karyawan where nilai.id_kriteria = kriteria.id_kriteria and nilai.id_karyawan = data_karyawan.id_karyawan");
                            
                            while($data = mysqli_fetch_array($query)) {
                              $query2 = mysqli_query($koneksi, "SELECT nilai FROM nilai, kriteria, data_karyawan WHERE nilai.id_kriteria = kriteria.id_kriteria and nilai.id_karyawan = '$data[id_karyawan]'");
                            }
                              $form = mysqli_query($koneksi, "SELECT * FROM kriteria");
                              while($nilai=mysqli_fetch_assoc($query2)) {
                              while($cr = mysqli_fetch_array($form)) {
                                  echo "<label style=\"font-size: 21px;\" for =\"kriteria\"> $cr[nama_kriteria]</label>";
                                  echo "<input type='hidden' value=$cr[id_kriteria] name='id_kriteria[]'>";
                                  echo "<input type='text' value=\"$nilai[nilai]\" class=\"form-control\" name=\"nilai[]\" id=\"nilai\">";
                              }									  
                            }                         
                                ?>
                                  <?php                               
                        ?>                           
                    </div>
				<div class="row align-self-center"> 
					<div class="col">
						<button type="submit" class="btn btn-dark" name="Karyawan" value="Submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>