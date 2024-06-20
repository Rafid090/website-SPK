<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {
        
        $id = $_GET['id_gelar'];

		$nama = $_POST['nama_gelar'];
		$posisi = $_POST['gelar'];
	
        $query = mysqli_query($koneksi, "UPDATE gelar SET gelar='$nama', posisi='$posisi' WHERE id_gelar='$id'");
        header("location: posisiGelar.php");

	}
	
