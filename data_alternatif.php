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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SPK Karyawan Rumah Sakit KORPRI Samarinda </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>
  <div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-4 pt-5 pb-5 d-flex justify-content-between">
            <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 mx-2 my-5">SPK</span> <span class="text-white" style="font-size: 18px;"> RSUD KORPRI</span></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"> <img src="assets/img/w-berger.png"></button>
        </div>
        <ul class="list-unstyled px-5">
            <li class="active my-3">
                <a href="index.php" class="text-decoration-none px-3 py-3 d-block"> Alternatif </a>
            </li>
            <li class="my-3">
                <a href="posisiGelar.php" class="text-decoration-none px-3 py-3 d-block"> Posisi & Gelar </a>
            </li>
            <li class="my-3">
                <a href="dataBobot.php" class="text-decoration-none px-3 py-3 d-block"> Kriteria & Bobot </a>
            </li>
            <li class="my-3">
                <a href="halamanPenilaianAwal.php" class="text-decoration-none px-3 py-3 d-block"> Penilaian </a>
            </li>
            <li class="my-3">
                <a href="halamanPerhitunganAwal.php" class="text-decoration-none px-3 py-3 d-block"> Perhitungan </a>
            </li>
            <li class="my-3">
                <a href="halamanHasilAwal.php" class="text-decoration-none px-3 py-3 d-block"> Hasil </a>
            </li>
        </ul>
        <hr class="h-color mx-2">
        <ul class="list-unstyled px-5 my-3">
            <li class="my-5 justify-content-between">
            <a href="logout.php" class="text-decoration-none px-1 py-3 d-block"> <button class="btn px-2 py-0 open-btn"> <img src="assets/img/logout.png"> <span class="mx-3"> Log Out</span>  </a>
              </button>
            </li>
        </ul>
    </div>
  <div class="content">
    <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
        <a class="navbar-brand fs-4 bg-dark text-white rounded shadow px-2 mx-2" href="#"> SPK </a>
        <button class="btn px-1 py-0 open-btn"> <img src="assets/img/berger.png"></button>
    </div>
    </div>
    </nav>
    <div class="dashboard-content">
    <section>
        <div class="container py-4 px-5">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-5"> Data Karyawan </div>
          </div>
          <div class="scroll">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-1">Kode</th>
                <th class="col-lg-6">Nama</th>
                <th class="col-lg-2">Gelar</th>
                <th class="col text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan, gelar where tanggal_dataset='$id' and gelar.id_gelar = data_karyawan.Gelar order by kode asc");

              $no = 1;
              while($row=mysqli_fetch_array($query)) {
                echo "<tr>";
                  echo "<td> $no </td>";
                  echo "<td> A$row[kode] </td>";
                  echo "<td> $row[nama] </td>";
                  echo "<td> $row[gelar] </td>";
                  echo "<td>  <a class='btn btn-success btn-sm px-3 mx-2 align-self-center' href='formEditAlternatif.php?id_karyawan=$row[id_karyawan]&&id_dataset=$id'> Edit 
                  <a class='btn btn-danger btn-sm px-2 mx-2' href='deleteAlternatif.php?id_karyawan=$row[id_karyawan]&&id_dataset=$id'> Hapus </td>";
                  $no++;
      }
      ?>  
            </tbody>
          </table>
          </div>
          <?php
          echo "<a class='btn btn-dark' href='formKaryawan.php?id_dataset=$id' role='button'> Tambah </a>"; ?>
        </div>
    </section>
    </div>
  </div>

</div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>   
    <script>
        $(".sidebar ul li").on('click', function(){
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });

        $(".open-btn").on('click', function() {
            $(".sidebar").addClass('active');
        });
        $(".close-btn").on('click', function() {
            $(".sidebar").removeClass('active');
        })

    </script>
</body>
</html>