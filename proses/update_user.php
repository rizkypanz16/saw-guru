<?php
include '../koneksi.php';

$id_user = $_GET['id_user'];
$nama_user = $_GET['user'];

mysqli_query($koneksi, "update tb_user set nama_user='$nama_user' where id_user='$id_user'");


// redirect to input.php
header("location:../user.php");
