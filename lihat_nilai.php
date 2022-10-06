<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN Sukamenak 09</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">
    <?php
    session_start();

    if ($_SESSION['status'] != "login") {
        header("location:login.php?pesan=belum_login");
    }
    $periode = $_GET['periode'];
    if ($periode == NULL) {
        header("location:nilai.php");
    }
    ?>
</head>

<?php

// Koneksi

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("saw") or die(mysql_error());

//Buat array bobot { C1 = 35%; C2 = 25%; C3 = 25%; dan C4 = 15%.}
$bobot = array(0.30, 0.30, 0.20, 0.20);

//Buat fungsi tampilkan nama
function getNama($id)
{
    $q = mysql_query("SELECT * FROM tb_guru where id_guru = '$id'");
    $d = mysql_fetch_array($q);
    return $d['nama_guru'];
}
function getPeriode($id)
{
    $q = mysql_query("SELECT * FROM tb_periode where id_periode = '$id'");
    $d = mysql_fetch_array($q);
    return $d['nama_periode'];
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class=" navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/beranda.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/user.php" class="nav-link">User</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/jabatan.php" class="nav-link">Jabatan</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/kelas.php" class="nav-link">Kelas</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/guru.php" class="nav-link">Guru</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/periode.php" class="nav-link">Periode</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/saw/nilai.php" class="nav-link">Penilaian</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- LOGOUT -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="http://localhost/saw/proses/logout.php" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <div class="container-fluid mt-2 col-10">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="http://localhost/saw/nilai.php">Back</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid mt-2 col-10">
            <!-- cek apakah sudah login -->
            <h5 class="mb-4">Hasil Penilaian
                <?php $periode = $_GET['periode'];

                echo "" . getPeriode($periode) . "";
                ?>
            </h5>

            <!-- ROW -->
            <div class="row">
                <!-- COL -->
                <div class="col-12">
                    <div class="card col-12">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Tabel Matrik Awal</strong></h5>
                            <form action="http://localhost/saw/print_laporan.php">
                                <input type="hidden" name="periode" value="<?= $_GET['periode'] ?>">
                                <button type="submmit" class="btn btn-sm btn-info float-right"><i class="fas fa-file-pdf"></i> Download PDF</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <?php
                            $periode = $_GET['periode'];
                            $sql = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru  WHERE periode = '" . $periode . "'");
                            //Buat tabel untuk menampilkan hasil
                            echo "
                                <table class=\"table\">
                                <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Kualitas Pengajaran</td>
                                <td>Kedisiplinan</td>
                                <td>Penilaian Teman Sejawat</td>
                                <td>Penilaian Administrasi</td>
                                <td>jumlah poin</td>
                                </tr>
                                ";
                            $no = 1;
                            while ($dt = mysql_fetch_array($sql)) {
                                $jumlah = ($dt['kriteria1']) + ($dt['kriteria2']) + ($dt['kriteria3']) + ($dt['kriteria4']);
                                echo "<tr>
                                <td>$no</td>
                                <td>" . getNama($dt['guru']) . "</td>
                                <td>$dt[kriteria1]</td>
                                <td>$dt[kriteria2]</td>
                                <td>$dt[kriteria3]</td>
                                <td>$dt[kriteria4]</td>
                                <td>$jumlah</td>
                                </tr>";
                                $no++;
                            }
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
                <!-- AKHIR COL -->
                <div class="col-12">
                    <div class="card col-12">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Tabel Matrik Normalisasi</strong></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            //Lakukan Normalisasi dengan rumus pada langkah 2
                            //Cari Max atau min dari tiap kolom Matrik
                            $crMax = mysql_query("SELECT max(kriteria1) as maxK1, 
                                max(kriteria2) as maxK2,
                                max(kriteria3) as maxK3,
                                max(kriteria4) as maxK4 
                            FROM tb_matrik");
                            $max = mysql_fetch_array($crMax);

                            //Hitung Normalisasi tiap Elemen
                            $sql2 = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru  WHERE periode = '" . $periode . "'");
                            //Buat tabel untuk menampilkan hasil
                            echo "
                                    <table class=\"table\">
                                    <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Kualitas Pengajaran</td>
                                    <td>Kedisiplinan</td>
                                    <td>Penilaian Teman Sejawat</td>
                                    <td>Penilaian Administrasi</td>
                                    </tr>
                                    ";
                            $no = 1;
                            while ($dt2 = mysql_fetch_array($sql2)) {
                                echo "<tr>
                                <td>$no</td>
                                <td>" . getNama($dt2['guru']) . "</td>
                                <td>" . round($dt2['kriteria1'] / $max['maxK1'], 2) . "</td>
                                <td>" . round($dt2['kriteria2'] / $max['maxK2'], 2) . "</td>
                                <td>" . round($dt2['kriteria3'] / $max['maxK3'], 2) . "</td>
                                <td>" . round($dt2['kriteria4'] / $max['maxK4'], 2) . "</td>
                                </tr>";
                                $no++;
                            }
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
                <!-- AKHIR COL -->
                <div class="col-12">
                    <div class="card col-6">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Tabel Perangkingan</strong></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            //Proses perangkingan dengan rumus langkah 3
                            $sql3 = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru  WHERE periode = '" . $periode . "'");
                            // echo '<pre>', var_dump(mysql_fetch_array($sql3)), '</pre>';
                            // die;


                            //Buat tabel untuk menampilkan hasil
                            echo "
                                <table class=\"table\">
                                <tr>
                                <td>no</td>
                                <td>Nama</td>
                                <td>total poin</td>
                                <td>SAW</td>
                                <td>keterangan</td>
                                </tr>
                                ";

                            //Kita gunakan rumus (Normalisasi x bobot)
                            while ($dt3 = mysql_fetch_array($sql3)) {
                                $jumlah = ($dt3['kriteria1']) + ($dt3['kriteria2']) + ($dt3['kriteria3']) + ($dt3['kriteria4']);
                                $poin = round(
                                    (($dt3['kriteria1'] / $max['maxK1']) * $bobot[0]) +
                                        (($dt3['kriteria2'] / $max['maxK2']) * $bobot[1]) +
                                        (($dt3['kriteria3'] / $max['maxK3']) * $bobot[2]) +
                                        (($dt3['kriteria4'] / $max['maxK4']) * $bobot[3]),
                                    3
                                );

                                $data[] = array(
                                    'nama' => getNama($dt3['guru']),
                                    'jumlah' => $jumlah,
                                    'poin' => $poin
                                );
                            }

                            if (empty($data)) {
                                echo "data kosong <br>";
                            } else {

                                //mengurutkan data
                                foreach ($data as $key => $isi) {
                                    $nama[$key] = $isi['nama'];
                                    $jlh[$key] = $isi['jumlah'];
                                    $poin1[$key] = $isi['poin'];
                                }
                                array_multisort($poin1, SORT_DESC, $jlh, SORT_DESC, $data);
                                $no = 1;
                                $h = "juara";
                                $juara = 1;
                                $hr = 1;

                                foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $item['nama'] ?></td>
                                        <td><?php echo $item['jumlah'] ?></td>
                                        <td><?php echo $item['poin'] ?></td>
                                        <td><?php echo "$h $juara" ?></td>
                                    </tr>
                            <?php
                                    $no++;
                                    if ($no >= 4) {
                                        $h = "  ";
                                        $juara = " ";
                                    } else {
                                        $juara++;
                                    }
                                }
                                echo "</table>";
                            };
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- AKHIR ROW -->

        </div>
        <!-- AKHIR CONTAINER -->


        <!-- jQuery -->
        <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="assets/AdminLTE/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="assets/AdminLTE/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="assets/AdminLTE/plugins/moment/moment.min.js"></script>
        <script src="assets/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="assets/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/AdminLTE/dist/js/adminlte.js"></script>
</body>

</html>