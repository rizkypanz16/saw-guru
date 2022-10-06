
<?php
include '../koneksi.php';

$id_matrik = $_POST['id_matriki'];
$guru = $_POST['gurui'];
$periode = $_POST['periodei'];
$kriteria1 = $_POST['kriteria1'];
$kriteria2 = $_POST['kriteria2'];
$kriteria3 = $_POST['kriteria3'];
$kriteria4 = $_POST['kriteria4'];

mysqli_query($koneksi, "update tb_matrik set kriteria1='$kriteria1', kriteria2='$kriteria2', kriteria3='$kriteria3', kriteria4='$kriteria4' where id_matrik='$id_matrik'");


// redirect to input.php
header("location:../nilai.php");
