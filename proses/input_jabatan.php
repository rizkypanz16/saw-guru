<?php
include '../koneksi.php';

$jabatan = ucwords($_POST['jabatan']);

if ($jabatan != NULL) {
    // input data ke database
    mysqli_query($koneksi, "insert into tb_jabatan values('','$jabatan')") or die(mysql_error());

    // redirect to input.php
    header("location:../jabatan.php");
} else {
    // redirect to input.php
    header("location:../jabatan.php");
}
