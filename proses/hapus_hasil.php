<?php 
include '../koneksi.php';
mysqli_query($koneksi, "TRUNCATE TABLE tb_matrik")or die(mysql_error());
 
// redirect to input.php
header("location:../hasil.php");
?>