<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }
  require 'koneksi.php';
  $id = $_GET['id_dataset'];
  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SPK Karyawan Rumah Sakit KORPRI Samarinda </title>
    <script type="text/javascript"> 
      function validate() {
        var karyawan = document.myForm.id_karyawan.value;
          if(karyawan == "") {
            alert("Harap Pilih Calon Karyawan");
            document.myForm.id_karyawan.focus();
            return false;
          } else {
            return true;
          }
      }
    </script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>
    <div class="container py-5">
		<div class="position-absolute top-50 start-50 translate-middle">

			<form name="myForm" class="row g-3" action ="inputNilai.php" method ="post" onsubmit="return validate()">
              <div class="row align-self-center mt-2">
                <h2 class="alert text-center bg-dark text-white" style="font-size: 21px; color: #FFF; "> Input Nilai </h2>
                <div class="col mt-2">
                    <select class="form-select form-select-sm px-2" id="id_karyawan" name="id_karyawan">
                        <option style="font-size: 16px;" value=""> Calon Karyawan </option>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan where tanggal_dataset='$id'");
                            while($row = mysqli_fetch_array($query)) {
                                echo "<option style=\"font-size: 16px;\" value=\"$row[id_karyawan]\"> $row[nama] </option>";
                            } ?>
                            </select>
                </div>
              </div>
                    <div class="row align-self-center">
                          <div class="col mt-2">
                          <input type="hidden" type="date" class="form-control" value="<?php echo $id ?>" name="dataset" required> 
                            <?php
                          
                              $form = mysqli_query($koneksi, "SELECT * FROM kriteria");
                              while($cr = mysqli_fetch_array($form)) {
                              echo "<label style=\"font-size: 15px;\" for =\"kriteria\"> $cr[nama_kriteria]</label>";
                              echo "<input type='hidden' value=$cr[id_kriteria] name='id_kriteria[]'>";				
					
                              echo "<input min=\"0\" max=\"100\" autocomplete='off' required class=\"form-control\" name=\"nilai[]\" id=\"nilai\">";
                              }
                              ?>
                          </div>  
                      </div>
				<div class="row align-self-center"> 
					<div class="col py-2">
						<button type="submit" class="btn btn-dark" name="Karyawan" value="Submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>