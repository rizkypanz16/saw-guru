<?php
include '../koneksi.php';

$username = $_POST['user'];
$password = md5($_POST['password']);
$confirm = md5($_POST['confirm']);
$role = $_POST['role'];

if ($username != NULL) {
    if ($password != NULL) {
        if ($confirm != NULL) {
            if ($password != $confirm) {
                header("location:../user.php?pesan=gagal");
            } else {
                // input data ke database
                mysqli_query($koneksi, "insert into tb_user values('','$username', '$password', '$role')") or die(mysql_error());

                // redirect to input.php
                header("location:../user.php");
            };
        }
    }
} else {
    // redirect to input.php
    header("location:../user.php");
}
