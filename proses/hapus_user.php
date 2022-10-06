<?php 
include '../koneksi.php';
$id_user = $_GET['id_user'];
mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user='$id_user'")or die(mysql_error());
 
// redirect to input.php
header("location:../user.php");
?>