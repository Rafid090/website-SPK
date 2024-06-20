<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_karyawan'];
	$dataset = $_GET['id_dataset'];

	$query = mysqli_query($koneksi, "DELETE from nilai WHERE id_karyawan='$id'");

	header("location: formNilai.php?id_dataset=$dataset");