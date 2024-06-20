<?php
	
	include_once('koneksi.php');

	if(isset($_POST["submit"])) {
	$kode = $_POST['kode'];
	$nama_kriteria = $_POST['nama_kriteria'];
	$bobot = $_POST['bobot'];
	$atribut = $_POST['atribut'];


	$q = mysqli_query($koneksi, "SELECT * from kriteria where nama_kriteria='$nama' or kode='$kode'");
	$cek = mysqli_num_rows($q);

	if($cek==0) {
		$query = mysqli_query($koneksi, "INSERT INTO kriteria (kode, nama_kriteria, bobot, atribut) 
		values ('$kode', '$nama_kriteria', '$bobot', '$atribut')");
		header("location: dataBobot.php");
	} else {
		echo "<script> alert('DATA SUDAH ADA') </script>";
		header("location: formBobot.php");
	}
}
	