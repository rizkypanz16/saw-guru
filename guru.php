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
                        <li class="breadcrumb-item active">Guru</li>
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
                            <h5 class="card-title"><strong>Form Tambah Guru</strong></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text lead" style="font-size: 15px;"><strong>Registrasi Guru Disini</strong></p>
                            <form action="http://localhost/saw/proses/input_guru.php" method="post" class="pb-4">
                                <div class="form-group mb-0">
                                    <!-- username -->
                                    <label for="nik" style="font-size: 13px;">NIK </label>
                                    <input type="text" name="nik" class="form-control form-control-sm">
                                </div>

                                <div class="form-group mb-0">
                                    <!-- username -->
                                    <label for="nama" style="font-size: 13px;">Nama Guru </label>
                                    <input type="text" name="nama" class="form-control form-control-sm">
                                </div>

                                <div class="form-group mb-0">
                                    <label for="jabatan" style="font-size: 13px;">Jabatan: </label>
                                    <select required id="jabatan" name="jabatan" class="form-control form-control-sm">
                                        <option selected disabled>-- Pilih Jabatan --</option>
                                        <?php
                                        include 'koneksi.php';
                                        $query = "SELECT * FROM tb_jabatan";
                                        $execute = $koneksi->query($query);
                                        if ($execute->num_rows > 0) {
                                            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value=\"$data[id_jabatan]\">$data[nama_jabatan]</option>";
                                            }
                                        } else {
                                            echo "<option value=\"\">Belum ada Jabatan</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <label for="kelas" style="font-size: 13px;">Guru Kelas: </label>
                                    <select required id="kelas" name="kelas" class="form-control form-control-sm">
                                        <option selected disabled>-- Pilih Kelas --</option>
                                        <?php
                                        include 'koneksi.php';
                                        $query = "SELECT * FROM tb_kelas";
                                        $execute = $koneksi->query($query);
                                        if ($execute->num_rows > 0) {
                                            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option value=\"$data[id_kelas]\">$data[nama_kelas]</option>";
                                            }
                                        } else {
                                            echo "<option value=\"\">Belum ada Kelas</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="role" value="1" hidden><br>
                                    <input type="submit" value="simpan" class="btn btn-primary btn-sm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- AKHIR COL -->
                <div class="col">
                    <div class="row">
                        <div class="card col-12">
                            <div class="card-header">
                                <h5 class="card-title"><strong>Daftar Guru Terdaftar</strong></h5>
                            </div>
                            <div class="card-body">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th># </th>
                                            <th>nik</th>
                                            <th>nama guru</th>
                                            <th>jabatan</th>
                                            <th>guru kelas</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "select * from tb_guru inner join tb_jabatan on tb_jabatan.id_jabatan = tb_guru.jabatan inner join tb_kelas on tb_kelas.id_kelas = tb_guru.kelas");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['nik']; ?></td>
                                                <td><?php echo $d['nama_guru']; ?></td>
                                                <td><?php echo $d['nama_jabatan']; ?></td>
                                                <td><?php echo $d['nama_kelas']; ?></td>
                                                <!-- <td><a href="http://localhost/saw/proses/hapus_guru.php?id_guru=<?= $d['id_guru'] ?>" class="btn btn-sm btn-danger">hapus</a></td> -->
                                                <td>
                                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModaledit<?= $d['id_guru'] ?>"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal<?= $d['id_guru'] ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR ROW -->
            <div class="row">

            </div>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from tb_guru");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <!-- Modal -->
                <div id="myModal<?= $d['id_guru'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form action="http://localhost/saw/proses/hapus_guru.php">
                                    <p class="lead">Apakah Anda Yakin Akan Menghapus Data ?</p>
                                    <input type="hidden" name="id_guru" value="<?= $d['id_guru'] ?>">
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
        </div>
        <!-- AKHIR CONTAINER -->

        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from tb_guru inner join tb_jabatan on tb_jabatan.id_jabatan = tb_guru.jabatan inner join tb_kelas on tb_kelas.id_kelas = tb_guru.kelas");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <!-- Modal -->
            <div id="myModaledit<?= $d['id_guru'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Guru</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <form action="http://localhost/saw/proses/update_guru.php" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="id_gurui" value="<?= $d['id_guru'] ?>">
                                <label for="nama" class="label">Nama Guru</label>
                                <input type="text" name="namai" value="<?= $d['nama_guru'] ?>" class="form-control"><br>

                                <label for="" class="label">Jabatan</label>
                                <select class="form-control" name="jabatani">
                                    <option selected value="<?= $d['jabatan'] ?>"><?= $d['nama_jabatan'] ?></option>
                                    <?php
                                    $pos = mysqli_query($koneksi, "SELECT * FROM tb_jabatan WHERE id_jabatan NOT IN (" . $d['jabatan'] . ") ");
                                    while ($f = mysqli_fetch_array($pos)) {
                                        echo '<option value="' . $f['id_jabatan'] . '">' . $f['nama_jabatan'] . '</option>';
                                    }
                                    ?>
                                </select><br>

                                <label for="" class="label">Kelas</label>
                                <select class="form-control" name="kelasi">
                                    <option selected value="<?= $d['kelas'] ?>"><?= $d['nama_kelas'] ?></option>
                                    <?php
                                    $pos1 = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id_kelas NOT IN (" . $d['kelas'] . ") ");
                                    while ($e = mysqli_fetch_array($pos1)) {
                                        echo '<option value="' . $e['id_kelas'] . '">' . $e['nama_kelas'] . '</option>';
                                    }
                                    ?>
                                </select>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="reset" class="btn btn-warning">
                            <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>


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