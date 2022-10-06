<?php
include '../koneksi.php';

$id_periode = $_GET['id_periode'];
mysqli_query($koneksi, "DELETE FROM tb_periode WHERE id_periode='$id_periode'") or die(mysql_error());

// redirect to input.php
header("location:../periode.php");
