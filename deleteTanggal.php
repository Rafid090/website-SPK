<?php
	
	include_once('koneksi.php');

    $id = $_GET['id_dataset'];

	$query = mysqli_query($koneksi, "DELETE from dataset WHERE id_dataset='$id'");
	
	header("location: index.php");