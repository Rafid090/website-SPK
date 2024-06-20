<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_posisi'];

	$query = mysqli_query($koneksi, "DELETE from posisi WHERE id_posisi='$id'");

	header("location: posisiGelar.php");