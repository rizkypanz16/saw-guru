<?php
include '../koneksi.php';

$periode = $_POST['periode'];
$guru = $_POST['guru'];
$kriteria1 = $_POST['kriteria1'];
$kriteria2 = $_POST['kriteria2'];
$kriteria3 = $_POST['kriteria3'];
$kriteria4 = $_POST['kriteria4'];

if ($guru == 0) {
    header("location:../nilai.php");
} else {
    if ($periode == 0) {
        header("location:../nilai.php");
    } else {
        // input data ke database
        mysqli_query($koneksi, "insert into tb_matrik values('', '$periode', '$guru', '$kriteria1', '$kriteria2', '$kriteria3', '$kriteria4')") or die(mysql_error());

        // redirect to input.php
        header("location:../nilai.php");
    }
}
