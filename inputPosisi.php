<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {

		$id_alternatif = $_POST['id_karyawan'];
        $id_posisi = $_POST['id_posisi'];

		$nama = $_POST['nama_posisi'];
		$kode = $_POST['kode_posisi'];

		$q = mysqli_query($koneksi, "SELECT * from posisi where nama_posisi='$nama' or kode='$kode'");
		$cek = mysqli_num_rows($q);

		if($cek==0) {
			$query = mysqli_query($koneksi, "INSERT INTO posisi (nama_posisi, kode) values('$nama', '$kode')");
			
			header("location: posisiGelar.php");
		}
		else {
			echo "<script> alert('DATA SUDAH ADA') </script>";
			header("location: formPosisi.php");
		}
	}
	

	
