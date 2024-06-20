<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {
		
    $id = $_GET['id_karyawan'];

	$nama = $_POST["nama"];
	$kode = $_POST['kode'];
	$gelar = $_POST['Gelar'];
	$dataset = $_POST['dataset'];
	$posisi = $_POST['posisi_lamar'];
	
	$query = mysqli_query($koneksi, "UPDATE data_karyawan SET kode='$kode', nama='$nama', Gelar='$gelar', posisi_lamar='$posisi' WHERE id_karyawan='$id'");
	header("location: data_alternatif.php?id_dataset=$dataset");

	}