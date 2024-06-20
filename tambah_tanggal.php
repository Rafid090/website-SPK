<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {

		$id_dataset = $_POST['id_dataset'];
        $dataset = $_POST['dataset'];


		$q = mysqli_query($koneksi, "SELECT * from dataset where tanggal='$dataset'");
		$cek = mysqli_num_rows($q);

		if($cek==0) {
			$query = mysqli_query($koneksi, "INSERT INTO dataset (id_dataset, tanggal) values('', '$dataset')");
			
			header("location: index.php");
		}
		else {
			echo "<script> alert('DATA SUDAH ADA') </script>";
			header("location: index.php");
		}
	}
	

	
