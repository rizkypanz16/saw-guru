<?php
include '../koneksi.php';

$kelas = strtoupper($_POST['kelas']);

if ($kelas != NULL) {
    // input data ke database
    mysqli_query($koneksi, "insert into tb_kelas values('','$kelas')") or die(mysql_error());

    // redirect to input.php
    header("location:../kelas.php");
} else {
    // redirect to input.php
    header("location:../kelas.php");
}
