<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {

		$id_kriteria = $_POST['id_kriteria'];
		$id_alternatif = $_POST['id_karyawan'];
		$dataset = $_POST['dataset'];
		$nama = $_POST['nama'];
		$kode = $_POST['kode'];
		$gelar = $_POST['Gelar'];
		$posisi = $_POST['posisi_lamar'];

		$q = mysqli_query($koneksi, "SELECT * from data_karyawan where nama='$nama' or kode='$kode'");
		$cek = mysqli_num_rows($q);

		if($cek==0) {
			$query = mysqli_query($koneksi, "INSERT INTO data_karyawan (kode, nama, Gelar, tanggal_dataset, posisi_lamar) values('$kode', '$nama', '$gelar', '$dataset', '$posisi')");
			
			header("location: data_alternatif.php?id_dataset=$dataset");
		}
		else {
			echo "<script> alert('DATA SUDAH ADA') </script>";
			header("location: formKaryawan.php?id_dataset=$dataset");
		}
	}
	

	
