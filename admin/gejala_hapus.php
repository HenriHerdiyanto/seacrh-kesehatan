<?php 
include "header.php";

//dapatkan id dari url
$id_gejala = $_GET["id"];

$koneksi -> query ("DELETE FROM gejala WHERE id_gejala = '$id_gejala'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'gejala_tampil.php'</script>";

 ?>