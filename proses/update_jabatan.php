<?php
include '../koneksi.php';

$id_jabatan = $_POST['id_jabatani'];
$nama_jabatan = ucwords($_POST['jabatani']);

mysqli_query($koneksi, "update tb_jabatan set nama_jabatan='$nama_jabatan' where id_jabatan='$id_jabatan'");


// redirect to input.php
header("location:../jabatan.php");
