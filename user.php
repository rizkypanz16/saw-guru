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
    ?>
</head>

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
                <li class="text-white mt-2">Hello, <?= $_SESSION['username'] ?></li>
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
                        <li class="breadcrumb-item"><a href="http://localhost/saw/beranda.php">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid mt-2 col-10">
            <!-- cek apakah sudah login -->






            <!-- ROW -->
            <div class="row">
                <!-- COL -->
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Form Registrasi User</strong></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text lead" style="font-size: 15px;"><strong>Registrasi User Untuk Login Disini</strong></p>
                            <form action="http://localhost/saw/proses/input_user.php" method="post">
                                <div class="form-group mb-0">
                                    <!-- username -->
                                    <label for="user" style="font-size: 13px;">Username </label>
                                    <input type="text" name="user" class="form-control form-control-sm">
                                </div>

                                <div class="form-group mb-0">
                                    <!-- password -->
                                    <label for="password" style="font-size: 13px;">password </label>
                                    <input type="password" name="password" class="form-control form-control-sm">
                                </div>

                                <div class="form-group mb-0">
                                    <!-- confirm -->
                                    <label for="confirm" style="font-size: 13px;">konfirmasi password </label>
                                    <input type="password" name="confirm" class="form-control form-control-sm">
                                </div>
                                <!-- confirm -->


                                <div class="form-group">
                                    <input type="text" name="role" value="1" hidden><br>
                                    <input type="submit" value="simpan" class="btn btn-success btn-sm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- AKHIR COL -->
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Daftar User Terdaftar</strong></h5>
                        </div>
                        <div class="card-body">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>no. </th>
                                        <th>username</th>
                                        <th>role</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>

                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from tb_user inner join tb_role on tb_role.id_role = tb_user.role");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['nama_user']; ?></td>
                                            <td><?php echo $d['nama_role']; ?></td>
                                            <td>
                                                <!-- <a href="http://localhost/saw/proses/hapus_user.php?id_user=<?= $d['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Akan Menghapus Data ?');">hapus</a> -->
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#resetPass<?= $d['id_user'] ?>"><i class="fas fa-key"></i></button>
                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModaledit<?= $d['id_user'] ?>"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal<?= $d['id_user'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- AKHIR ROW -->
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from tb_user inner join tb_role on tb_role.id_role = tb_user.role");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <!-- Modal -->
                <div id="myModal<?= $d['id_user'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form action="http://localhost/saw/proses/hapus_user.php">
                                    <p class="lead">Apakah Anda Yakin Akan Menghapus Data ?</p>
                                    <input type="hidden" name="id_user" value="<?= $d['id_user'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

            <!-- AKHIR ROW -->
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from tb_user inner join tb_role on tb_role.id_role = tb_user.role");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <!-- Modal -->
                <div id="resetPass<?= $d['id_user'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Reset Password</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form action="http://localhost/saw/proses/reset_pass.php" method="POST">
                                    <p class="lead">Apakah Anda Yakin Akan Me-reset Password ?</p>
                                    <input type="hidden" name="id_usera" value="<?= $d['id_user'] ?>">
                                    <input type="hidden" name="namaa" value="<?= $d['nama_user'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Reset</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

            <!-- AKHIR ROW -->
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from tb_user inner join tb_role on tb_role.id_role = tb_user.role");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <!-- Modal -->
                <div id="myModaledit<?= $d['id_user'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data User</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form action="http://localhost/saw/proses/update_user.php">
                                    <input type="hidden" name="id_user" value="<?= $d['id_user'] ?>">
                                    <label for="user" class="label">Username</label>
                                    <input type="text" name="user" value="<?= $d['nama_user'] ?>" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- AKHIR CONTAINER -->

        <!-- jQuery -->
        <script src=" assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
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

        <!-- Datatable -->
        <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables/jszip/jszip.min.js"></script>
        <script src="assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
        <script src="assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
        <script src="assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
        <script src="assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
        <script src="assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
        <script src="assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>

        <!-- Data table -->
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#dataTable').DataTable({
                    // buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                    // buttons: ['print', 'excel', 'pdf'],
                    dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-4'f>>" +
                        "<'row'<'col-md-12'tr>>" +
                        "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                    lengthMenu: [
                        [5, 10, 25, 50, 100, -1],
                        [5, 10, 25, 50, 100, "All"]
                    ],
                    columnDefs: [{
                        targets: -1,
                        orderable: false,
                        searchable: false
                    }]
                });

                table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
            });
        </script>

</body>

</html>