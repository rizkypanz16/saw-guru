<?php
session_start();
if ($_SESSION['status'] != NULL) {
    header("location: beranda.php");
} else {
    header("location: login.php");
}
    //membuat metode redirect dengan kode 301
    // header("location: beranda.php", true, 301);
    //membuat kode di bawah header tidak diproses oleh website sehingga lebih aman
    // exit();
