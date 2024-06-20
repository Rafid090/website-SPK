<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_kriteria'];

    $kode = $_POST['kode'];
	$nama_kriteria = $_POST['nama_kriteria'];
	$bobot = $_POST['bobot'];
	$atribut = $_POST['atribut'];

	$query = mysqli_query($koneksi, "UPDATE kriteria SET kode='$kode', nama_kriteria='$nama_kriteria', bobot='$bobot', atribut='$atribut' WHERE id_kriteria='$id'");

	header("location: dataBobot.php");