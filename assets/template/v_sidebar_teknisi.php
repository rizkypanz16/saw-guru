<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('dashboard') ?>/teknisi" class="brand-link">
            <img src="<?= base_url(); ?>assets/img/Logo-Provinsi-Jawa-Barat.jpg" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light blockquote">Sanditel Helpdesk</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- <div class="panel panel-default mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>assets/img/profile-photo.jpg" class="img-circle elevation-2 mr-2 ml-2" alt="User Image" width="35" height="35">
            </div>
            <div class="info text-white lead">
                <?= $this->session->userdata('nama') ?>
            </div>
        </div> -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-header ">TIKET</li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>tiket/teknisi" class="nav-link">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>Tiket</p>
                        </a>
                    </li>

                    <li class="nav-header ">REPORT</li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>report/teknisi" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</body>