<?php
	
	include_once('koneksi.php');

	$id_kriteria = $_POST['id_kriteria'];
	$id_alternatif = $_POST['id_karyawan'];
	$nilai = $_POST['nilai'];

    $query = mysqli_query($koneksi, "UPDATE nilai set nilai='$nilai[$i]', id_kriteria='$id_kriteria[$i]', id_karyawan='$id_alternatif' where id_karyawan='$id_alternatif' and id_kriteria='$id_kriteria'");

    header("location: penilaian.php");


