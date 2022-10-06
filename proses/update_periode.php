<?php
include '../koneksi.php';

$id_periode = $_POST['id_periodei'];
$nama_periode = strtoupper($_POST['periodei']);
$tgl_periode = $_POST['tanggali'];

if ($tgl_periode == NULL) {
    header("location:../periode.php");
} else {
    mysqli_query($koneksi, "update tb_periode set nama_periode='$nama_periode', tgl_periode='$tgl_periode' where id_periode='$id_periode'");
    // redirect to input.php
    header("location:../periode.php");
}
