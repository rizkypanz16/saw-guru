
<?php
include '../koneksi.php';

$id_user = $_POST['id_usera'];
$nama = md5($_POST['namaa']);

mysqli_query($koneksi, "update tb_user set password='$nama' where id_user='$id_user'");


// redirect to input.php
header("location:../user.php");
