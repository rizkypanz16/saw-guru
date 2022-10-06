<?php


include '../koneksi.php';

$periode = strtoupper($_POST['periode']);
$tgl_periode = $_POST['tgl_periode'];

if ($periode != NULL) {
    if ($tgl_periode != NULL) {
        // input data ke database
        mysqli_query($koneksi, "insert into tb_periode values('','$periode', '$tgl_periode')") or die(mysql_error());

        // redirect to input.php
        header("location:../periode.php");
    } else {
        // redirect to input.php
        header("location:../periode.php");
    }
} else {
    // redirect to input.php
    header("location:../periode.php");
}
