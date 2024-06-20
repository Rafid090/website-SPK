<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "spk_karyawan";

	$koneksi = mysqli_connect($server, $user, $pass, $database) or DIE ("koneksi gagal");