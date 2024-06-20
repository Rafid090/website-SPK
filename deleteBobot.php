<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_kriteria'];

	$query = mysqli_query($koneksi, "DELETE from kriteria WHERE id_kriteria='$id'");

	header("location: dataBobot.php");