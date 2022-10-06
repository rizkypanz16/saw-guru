<?php
include '../koneksi.php';

$id_kelas = $_POST['id_kelasi'];
$nama_kelas = strtoupper($_POST['kelasi']);

mysqli_query($koneksi, "update tb_kelas set nama_kelas='$nama_kelas' where id_kelas='$id_kelas'");


// redirect to input.php
header("location:../kelas.php");
