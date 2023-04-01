<?php 
include "header.php";

//dapatkan id dari url
$id_penyakit = $_GET["id"];

$koneksi -> query ("DELETE FROM penyakit WHERE id_penyakit = '$id_penyakit'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'penyakit_tampil.php'</script>";

 ?>