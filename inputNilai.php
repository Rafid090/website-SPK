<?php
	
	include_once('koneksi.php');

	$id_kriteria = $_POST['id_kriteria'];
	$id_alternatif = $_POST['id_karyawan'];
	$nilai = $_POST['nilai'];
    $dataset = $_POST['dataset'];

    $query = "SELECT * from nilai where id_karyawan='$id_alternatif'";
    $result = mysqli_query($koneksi, $query);

    if($result->num_rows > 0 ) {
        echo "<script> alert('DATA SUDAH ADA') </script>";
		header("location: formNilai.php?id_dataset=$dataset");
    } elseif (empty($id_alternatif)){
        echo "<script> alert('DATA TIDAK LENGKAP') </script>";
        header("location: formNilai.php?id_dataset=$dataset");
    }
    else {
        $jml = count($id_kriteria);
        for($i=0;$i<$jml;$i++) {
            $query = mysqli_query($koneksi, "INSERT INTO nilai (nilai, id_kriteria, id_karyawan) values ('$nilai[$i]', '$id_kriteria[$i]', '$id_alternatif')");
            }
        header("location: penilaian.php?id_dataset=$dataset");
    }
  
    

    
    
    


	
