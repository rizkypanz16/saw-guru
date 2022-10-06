<?php
include '../koneksi.php';

$nik = $_POST['nik'];
$nama = ucwords($_POST['nama']);
$jabatan = $_POST['jabatan'];
$kelas = $_POST['kelas'];

if ($nik != NULL) {
    if ($nama != NULL) {
        if ($jabatan != NULL) {
            if ($kelas != NULL) {
                // input data ke database
                mysqli_query($koneksi, "insert into tb_guru values('','$nik', '$nama', '$jabatan', '$kelas')") or die(mysql_error());

                // redirect to input.php
                header("location:../guru.php");
            } else {
                // redirect to input.php
                header("location:../guru.php");
            }
        } else {
            // redirect to input.php
            header("location:../guru.php");
        }
    } else {
        // redirect to input.php
        header("location:../guru.php");
    }
} else {
    // redirect to input.php
    header("location:../guru.php");
}
