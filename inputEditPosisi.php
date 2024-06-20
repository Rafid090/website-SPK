<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {
		
    $id = $_GET['id_posisi'];

    $nama = $_POST['nama_posisi'];
    $kode = $_POST['kode_posisi'];
	
	$query = mysqli_query($koneksi, "UPDATE posisi SET nama_posisi='$nama', kode='$kode' WHERE id_posisi='$id'");
	header("location: posisiGelar.php");

	}