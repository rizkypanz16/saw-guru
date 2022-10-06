
<?php
include '../koneksi.php';

$id_guru = $_POST['id_gurui'];
$nama = ucwords($_POST['namai']);
$jabatan = $_POST['jabatani'];
$kelas = $_POST['kelasi'];

mysqli_query($koneksi, "update tb_guru set nama_guru='$nama', jabatan='$jabatan', kelas='$kelas' where id_guru='$id_guru'");


// redirect to input.php
header("location:../guru.php");
