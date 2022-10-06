<?php
include '../koneksi.php';
$id_guru = $_GET['id_guru'];
mysqli_query($koneksi, "DELETE FROM tb_guru WHERE id_guru='$id_guru'") or die(mysql_error());

// redirect to input.php
header("location:../guru.php");
