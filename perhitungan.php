<?php
  session_start();
  if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
  }

  require 'koneksi.php';
  require 'WP.php';

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
            <li class="my-3">
                <a href="index.php" class="text-decoration-none px-3 py-3 d-block"> Alternatif </a>
            </li>
            <li class="my-3">
                <a href="posisiGelar.php" class="text-decoration-none px-3 py-3 d-block"> Posisi & Gelar </a>
            </li>
            <li class="my-3">
                <a href="dataBobot.php" class="text-decoration-none px-3 py-3 d-block"> Kriteria & Bobot</a>
            </li>
            <li class="my-3">
                <a href="halamanPenilaianAwal.php" class="text-decoration-none px-3 py-3 d-block"> Penilaian </a>
            </li>
            <li class="active my-3">
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
  <div class="content" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
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
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>

                <?php
                    $query2 = mysqli_query($koneksi, "SELECT * FROM kriteria");

                    while($data=mysqli_fetch_array($query2)) {
                        $kriteria = mysqli_query($koneksi, "SELECT * from kriteria where id_kriteria='$data[id_kriteria]'");

                        echo "<th class=\"col-lg-1,5\"> $data[nama_kriteria] </th>";
                    } ?>
               
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            $no=0;
                            $query=mysqli_query($koneksi, "SELECT DISTINCT nilai.id_karyawan from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan and tanggal_dataset='$id' order by kode asc");
                            
                            while($data = mysqli_fetch_array($query)) {
                                $query2 = mysqli_query($koneksi, "SELECT DISTINCT nama from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan and nilai.id_karyawan = '$data[id_karyawan]'");

                                while($data2 = mysqli_fetch_array($query2)){
                                    $no++;
                                    echo "<tr><td>$no </td>";
                                    
                                    echo "<td>$data2[nama]</td>";
                    
                                }

                                $query3 = mysqli_query($koneksi, "SELECT nilai FROM nilai, kriteria WHERE nilai.id_kriteria = kriteria.id_kriteria and nilai.id_karyawan = '$data[id_karyawan]'");

                                while($data3 = mysqli_fetch_array($query3)){
                                    echo "<td>$data3[nilai]</td>";
                                }

                                $query4 = mysqli_query($koneksi, "SELECT nilai from nilai where nilai.id_karyawan='$data[id_karyawan]'");
                                $query5 = mysqli_query($koneksi, "SELECT * from kriteria");
                                ?>
                                  <?php
                                    }
                                  
                        ?>
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-2 px-5">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-2"> Data Bobot </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-2"></th>
                <?php
                    $query2 = mysqli_query($koneksi, "SELECT * FROM kriteria");

                    while($data=mysqli_fetch_array($query2)) {
                        $kriteria = mysqli_query($koneksi, "SELECT * from kriteria where id_kriteria='$data[id_kriteria]'");

                        echo "<th class=\"col-lg-1,5\"> $data[nama_kriteria] </th>";
                    } ?>
               
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>Bobot Awal</td>
                      <?php
                      $query5 = mysqli_query($koneksi, "SELECT * from kriteria");
                      while ($data5 = mysqli_fetch_array($query5)) {
                      ?>                        
                        <td><?php echo "$data5[bobot]"?></td>
                        <?php
                      }
                      ?>
                  </tr>
                  <tr>
                      <td>Bobot Baru</td>
                      <?php
                      $arBB = array();
                      $i=0;
                      $sumB = mysqli_query($koneksi, "SELECT SUM(bobot) AS sum FROM kriteria");
                      $quB = mysqli_fetch_array($sumB);
                      $jml_bobot = $quB['sum'];

                      $query6 = mysqli_query($koneksi, "SELECT * from kriteria");
                      while ($data6 = mysqli_fetch_array($query6)) {
                      $bb = $data6['bobot']/$jml_bobot;
                      $arBB[$i] = $bb;
                  ?>                     
                    <td><?php echo round("$bb", 4)?></td>
                    <?php
                    $i++;
                  }
                  ?>
                  </tr>
            </tbody>
          </table>
        </div>
    </section>
    <section>
        <div class="container py-2 px-5">
          <div class="row g-0">
            <div class="col-sm-6 col-md-8 py-5"> Menghitung Nilai Vektor S dan Vektor V </div>
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>


                <?php
                    $query2 = mysqli_query($koneksi, "SELECT * FROM kriteria");

                    while($data=mysqli_fetch_array($query2)) {
                        $kriteria = mysqli_query($koneksi, "SELECT * from kriteria where id_kriteria='$data[id_kriteria]'");

                        echo "<th class=\"col-lg-1,5\"> $data[nama_kriteria] </th>";
                    } ?>
               <th class="col-lg-1"> NILAI Si</th>
               <th class="col-lg-1"> Nilai Vi </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            $no=0;
                            $query=mysqli_query($koneksi, "SELECT DISTINCT nilai.id_karyawan from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan and tanggal_dataset='$id' order by kode asc");
                            
                            while($data = mysqli_fetch_array($query)) {
                                $query2 = mysqli_query($koneksi, "SELECT DISTINCT nama from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan and nilai.id_karyawan = '$data[id_karyawan]'");

                                while($data2 = mysqli_fetch_array($query2)){
                                    $no++;
                                    echo "<tr><td>$no </td>";
                                    
                                    echo "<td>$data2[nama]</td>";
                    
                                }

                                $query3 = mysqli_query($koneksi, "SELECT nilai FROM nilai, kriteria WHERE nilai.id_kriteria = kriteria.id_kriteria and nilai.id_karyawan = '$data[id_karyawan]'");

                                while($data3 = mysqli_fetch_array($query3)){
                                    echo "<td>$data3[nilai]</td>";
                                }

                                $query4 = mysqli_query($koneksi, "SELECT nilai from nilai where nilai.id_karyawan='$data[id_karyawan]'");
                                $query5 = mysqli_query($koneksi, "SELECT * from kriteria");

                                $arBB = array();
                                $i=0;
                                $sumB = mysqli_query($koneksi, "SELECT SUM(bobot) AS sum FROM kriteria");
                                $quB = mysqli_fetch_array($sumB);
                                $jml_bobot = $quB['sum'];

                                $query6 = mysqli_query($koneksi, "SELECT * from kriteria");
                                while ($data6 = mysqli_fetch_array($query6)) {
                                $bb = $data6['bobot'] / $jml_bobot;

                                $arBB[$i] = $bb;
                                $i++;
                                }

                                $query7= mysqli_query($koneksi, "SELECT * from nilai");
                                    $vektor_s = 1;
                                    $index = 0;

                                    

                                    
                                while($data7 = mysqli_fetch_array($query4)) {
                                    $pangkat = pow($data7['nilai'], $arBB[$index]);
                                    $vektor_s = round($vektor_s * $pangkat, 3);
                                    $index++;
                                }
                                echo "<td> $vektor_s </td>"; 
                                nilaiVektorS($data['id_karyawan'], $vektor_s, $id);
                                $total_s = 0;
                                $i= 0;
                                $vk_v= 1;

                                $query8 = mysqli_query($koneksi, "SELECT SUM(vektor_s) AS total_si FROM perhitungan where id_dataset=$id");
                                $data8 = mysqli_fetch_array($query8);
                                $total_si = round($data8['total_si'], 3);
                                $jumlah = array();
                                $x = 0;
                                
                                $query9 = mysqli_query($koneksi, "SELECT vektor_s from perhitungan where perhitungan.id_karyawan='$data[id_karyawan]' and id_dataset='$id'");
                                while($data9=mysqli_fetch_array($query9)) {
                                  $vk_v = $data9['vektor_s']/$total_si;
                                  $jumlah[$x] = $vk_v;
                                  
                                  $x++;
                                }
                                ?>
                                <td><?php echo round("$vk_v", 3)?></td>
                                <?php
                                nilaiVektorV($data['id_karyawan'], $vk_v);

                      ?>
                                  <?php
                  }
                                  
                        ?>
            </tbody>
          </table>
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
