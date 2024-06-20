<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_karyawan'];
	$dataset = $_GET['id_dataset'];

	$query = mysqli_query($koneksi, "DELETE from data_karyawan WHERE id_karyawan='$id'");
	
	header("location: data_alternatif.php?id_dataset=$dataset");