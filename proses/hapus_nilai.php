<?php
include '../koneksi.php';
$id_matrik = $_GET['id_matrik'];
mysqli_query($koneksi, "DELETE FROM tb_matrik WHERE id_matrik='$id_matrik'") or die(mysql_error());

// redirect to input.php
header("location:../nilai.php");
