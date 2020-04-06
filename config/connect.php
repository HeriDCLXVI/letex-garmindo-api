<?php
	$server = "localhost"; //nama server
	$username = "root"; // username 
	$password = ""; //  standarnya kosong
	$database = "letex-garmindo"; // buat nama database harus sama 

	// Koneksi dan memilih database di server
	$link = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
	mysqli_select_db($link, $database) or die("Database tidak bisa dibuka");
?>