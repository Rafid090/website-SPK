<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }

  require 'koneksi.php';

  
  $id = $_GET['id_dataset'];
  $id1 = $_GET['id_posisi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SPK Karyawan Rumah Sakit KORPRI Samarinda </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <header class="navbar sticky-top navbar-expand-lg navbar-dark main-header">
        <div class="container">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto py-2">
              <li class="nav-item px-3">
                <a class="nav-link" aria-current="page" href="index.php">Alternatif</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="dataBobot.php">Kriteria & Bobot </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="penilaian.php">Penilaian </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="perhitungan.php">Perhitungan </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link active" href="hasil.php">Hasil </a>
              </li>
            </div>
          </div>
        </div>
    </header>
</head>
<body>
    <section>
        <div class="container py-2">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-5"> Hasil Pemeringkatan Alternatif </div>
            <div class="col-6 col-md-4 text-end">
            </div>
            <?php
                $query=mysqli_query($koneksi, "SELECT * from dataset where id_dataset='$id'");
                while($row=mysqli_fetch_array($query)) {
                  echo "<span style='font-size: 16px;'> Data Perekrutan Tanggal : ";
                  echo date("d F Y", strtotime($row["tanggal"]));
                  echo "</span>";
                }
              ?>
          </div>
          <table class="table table-striped mt-3">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>
               <th class="col-lg-2"> Nilai Akhir </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query2=mysqli_query($koneksi, "SELECT DISTINCT * from data_karyawan, nilai, vektor_v where vektor_v.id_karyawan = data_karyawan.id_karyawan and nilai.id_karyawan = data_karyawan.id_karyawan");
                      while($data2=mysqli_fetch_array($query2)) {
                      $no = 1;
                      $query=mysqli_query($koneksi, "SELECT DISTINCT nama, vektor_v, posisi_lamar from data_karyawan, nilai, vektor_v where vektor_v.id_karyawan = data_karyawan.id_karyawan and nilai.id_karyawan = data_karyawan.id_karyawan and data_karyawan.tanggal_dataset='$id' and posisi_lamar='$id1' order by vektor_v desc");
                    
                      while($data=mysqli_fetch_array($query)) {
                        echo "<tr><td>$no </td>";
                        echo "<td>$data[nama] </td>";

                        echo "<td>$data[vektor_v] </td>";
                        $no++;
                        
                      }
                      break;
                    }
                      ?>
            </tbody>
          </table>   
        </div>
    </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script> window.print()</script>
    
</body>
</html>
