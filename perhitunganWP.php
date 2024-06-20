<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }

  require 'koneksi.php';
  require 'WP.php';
  $wp = new wp();

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
</head>
<body>
    <header class="navbar sticky-top navbar-expand-lg navbar-dark main-header">
        <div class="container">
          <a class="navbar-brand" href="#">SPK KARYAWAN</a>
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
                <a class="nav-link active" href="perhitungan.php">Perhitungan </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="#">Hasil </a>
              </li>
              </li>
            </div>
          </div>
        </div>
    </header>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Data Karyawan </div>
            <div class="col-6 col-md-4 text-end">
              <a class="link-website py-3" href="logout.php" style="font-size: 15px; color: #181D31; text-decoration: none;"> Log Out </a>
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">Nama</th>
                <th class="col">Gelar</th>
                <th class="col">C1</th>
                <th class="col">C2</th>
                <th class="col">C3</th>
                <th class="col">C4</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $total = 0;
              foreach($wp->alternatif as $a) 
              {
              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $a[0] </td>";
              echo "<td> $a[1] </td>";
              echo "<td> $a[2] </td>";
              echo "<td> $a[3] </td>";
              echo "<td> $a[4] </td>";
              echo "<td> $a[5] </td>";
              echo "<td> $a[6] </td>";
              $no++;
              }
                
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Bobot</div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">C1</th>
                <th class="col">C2</th>
                <th class="col">C3</th>
                <th class="col">C4</th>
              </tr>
            </thead>
            <tbody>
              <th coolspan="2"> Bobot</th>
              <td> <?=$wp->bobot[1] ?> </td>
              <td> <?=$wp->bobot[2] ?> </td>
              <td> <?=$wp->bobot[3] ?> </td>
              <td> <?=$wp->bobot[4] ?> </td>
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Perhitungan WP</div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">A1</th>
                <th class="col">A2</th>
                <th class="col">A3</th>
                <th class="col">A4</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $no = 1;
              foreach($wp->wpm as $wpm) 
              {
              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $wpm[0] </td>";
              echo "<td> $wpm[1] </td>";
              echo "<td> $wpm[2] </td>";
              echo "<td> $wpm[3] </td>";
              echo "<td> $wpm[4] </td>";
              $no++;
              }       
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-3">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Data Pembagi </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-2">Kriteria</th>
                <th class="col-lg-2">C1</th>
                <th class="col-lg-3">C2</th>
                <th class="col-lg-2">C3</th>
				<th class="col-lg-2">C4</th>
              </tr>
            </thead>
            <tbody>
                <td> Pembagi </td>
                <td><?=$topsis->pembagi[0] ?></td>
                <td><?=$topsis->pembagi[1] ?></td>
                <td><?=$topsis->pembagi[2] ?></td>
                <td><?=$topsis->pembagi[3] ?></td>
            </tbody>
          </table>
          
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Normalisasi </div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">C1</th>
                <th class="col">C2</th>
                <th class="col">C3</th>
                <th class="col">C4</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $no = 1;
              $total = 0;
              foreach($topsis->normalisasi as $n) 
              {
              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $n[0] </td>";
              echo "<td> $n[3] </td>";
              echo "<td> $n[4] </td>";
              echo "<td> $n[5] </td>";
              echo "<td> $n[6] </td>";
              $no++;
              }       
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Bobot</div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">C1</th>
                <th class="col">C2</th>
                <th class="col">C3</th>
                <th class="col">C4</th>
              </tr>
            </thead>
            <tbody>
              <th coolspan="2"> Bobot</th>
              <td> <?=$topsis->bobot[0] ?> </td>
              <td> <?=$topsis->bobot[1] ?> </td>
              <td> <?=$topsis->bobot[2] ?> </td>
              <td> <?=$topsis->bobot[3] ?> </td>
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Matriks Keputusan Ternormalisasi</div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">A1</th>
                <th class="col">A2</th>
                <th class="col">A3</th>
                <th class="col">A4</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $no = 1;
              foreach($topsis->normxbobot as $nb) 
              {
              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $nb[0] </td>";
              echo "<td> $nb[3] </td>";
              echo "<td> $nb[4] </td>";
              echo "<td> $nb[5] </td>";
              echo "<td> $nb[6] </td>";
              $no++;
              }       
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Matriks Ideal Positif dan Matriks Ideal Negatif</div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
            <tr>
                <th class="col"></th>
                <td class="col">A1</td>
                <td class="col">A2</td>
                <td class="col">A3</td>
                <td class="col">A4</td>
              </tr>
            <thead>
            <tbody>
              <tr>
                <th class="col">Max (y+)</th>
                <td class="col"><?=$topsis->ymax[0] ?></td>
                <td class="col"><?=$topsis->ymax[1] ?></td>
                <td class="col"><?=$topsis->ymax[2] ?></td>
                <td class="col"><?=$topsis->ymax[3] ?></td>
              </tr>
              <tr>
                <th class="col">Min (y-)</th>
                <td class="col"><?=$topsis->ymin[0] ?></td>
                <td class="col"><?=$topsis->ymin[1] ?></td>
                <td class="col"><?=$topsis->ymin[2] ?></td>
                <td class="col"><?=$topsis->ymin[3] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Jarak Setiap Alternatif (D+ dan D-) </div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">D+</th>
                <th class="col">D-</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $no = 1;
              $total = 0;
              foreach($topsis->dplusmin as $dpm) 
              {
              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $dpm[0] </td>";
              echo "<td> $dpm[7] </td>";
              echo "<td> $dpm[8] </td>";
              $no++;
              }       
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-4">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-3"> Nilai Preferensi (Vi) </div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col">No</th>
                <th class="col">Kode</th>
                <th class="col">Nama</th>
                <th class="col">Nilai Preferensi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $no = 1;
              foreach($topsis->dplusmin as $dpm) 
              {
              
              $preferensi = round($dpm[8]/($dpm[7]+$dpm[8]), 3);

              echo "<tr>";
              echo "<td> $no </td>";
              echo "<td> $dpm[0] </td>";
              echo "<td> $dpm[1] </td>";
              echo "<td> $preferensi </td>";
              $no++;
              
              /*$p = mysqli_query($koneksi, "SELECT * from perhitungan where id_hitung='$id'");
              

              $q = mysqli_query($koneksi, "SELECT * from perhitungan where nilai_preferensi='$preferensi'");
	            $cek = mysqli_num_rows($q);
              
              if($cek == 0) {
                $prf = mysqli_query($koneksi, "INSERT INTO perhitungan (nilai_preferensi) values('$preferensi')");
              }else {
                $id_hitung = $_GET['id'];

                $preferensi = $_POST['nilai_preferensi'];
                $upd = mysqli_query($koneksi, "UPDATE perhitungan SET nilai_preferensi=$preferensi WHERE id_hitung=$id_hitung");
              }*/
              }       
      ?>  
            </tbody>
          </table>
        </div>
    </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
