<?php

$connect = mysqli_connect("localhost","root","","jember");

if(!$connect) {
		die("Koneksi gagal : ".mysql_connect_error());
	}

$file = fopen("jember.csv", "r");
?>