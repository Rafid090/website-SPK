<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {

		$id_alternatif = $_POST['id_karyawan'];
        $id_gelar = $_POST['id_helar'];

		$nama = $_POST['nama_gelar'];
		$posisi = $_POST['gelar'];

		$q = mysqli_query($koneksi, "SELECT * from gelar where gelar='$nama'");
		$cek = mysqli_num_rows($q);

		if($cek==0) {
			$query = mysqli_query($koneksi, "INSERT INTO gelar (gelar, posisi) values('$nama', '$posisi')");
			
			header("location: posisiGelar.php");
		}
		else {
			echo "<script> alert('DATA SUDAH ADA') </script>";
			header("location: formGelar.php");
		}
	}
	

	
