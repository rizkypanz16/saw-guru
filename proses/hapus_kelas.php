<?php
include '../koneksi.php';
$id_kelas = $_GET['id_kelas'];
mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'") or die(mysql_error());

// redirect to input.php
header("location:../kelas.php");
