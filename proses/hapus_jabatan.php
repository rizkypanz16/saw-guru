<?php
include '../koneksi.php';
$id_jabatan = $_GET['id_jabatan'];
mysqli_query($koneksi, "DELETE FROM tb_jabatan WHERE id_jabatan='$id_jabatan'") or die(mysql_error());

// redirect to input.php
header("location:../jabatan.php");
