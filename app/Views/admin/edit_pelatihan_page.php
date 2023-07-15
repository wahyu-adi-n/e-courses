<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../thirdparty/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/thirdparty/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand " href="/admin">
                <span><?= $title; ?></span>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/dashboard') ? "active" : ""; ?>">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/pelatihan') ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="/admin/pelatihan">
                    <i class="fas fa-user"></i>
                    <span>Daftar User</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/pelatihan') ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="/admin/pelatihan">
                    <i class="fas fa-wrench"></i>
                    <span>Daftar Pelatihan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/pelatihan') ? "active" : ""; ?>">
                <a class="nav-link collapsed" href="/admin/pelatihan">
                    <i class="fas fa-wrench"></i>
                    <span>Daftar Pelatihan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?= session()->get("nama"); ?></b>
                                    <br><?= session()->get("email"); ?></span>
                                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->

                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post" class="user">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-light btn-block" value="Logout">
                                    </div>

                                </form>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $header; ?></h1>
                    </div>

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Pelatihan</h6>
                                    <a href="/admin/pelatihan" class="badge badge-primary badgepill mt-3">Back</a>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="/admin/pelatihan/edit/<?= $pelatihan['kode_pelatihan']; ?>" method="post">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="kode_pelatihan" id="kode_pelatihan" value="<?= $pelatihan['kode_pelatihan']; ?>" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="nama_pelatihan" id="nama_pelatihan" value="<?= $pelatihan['nama_pelatihan']; ?>" required placeholder="Ubah Nama Pelatihan">
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Ubah Deskripsi Pelatihan" required><?= $pelatihan['deskripsi']; ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" oninput="setEndDateMin()" placeholder="Ubah Tanggal Mulai Pelatihan" value="<?= $pelatihan['tgl_mulai']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" value="<?= $pelatihan['tgl_selesai']; ?>" placeholder="Ubah Tanggal Selesai Pelatihan" required>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" value="<?= $pelatihan['lokasi']; ?>" name="lokasi" id="lokasi" placeholder="Ubah Lokasi Pelatihan" required>
                                            </div>

                                            <div class="mb-3">
                                                <select class="form-control" name="kode_instruktur" id="kode_instruktur" required>
                                                    <option value="<?= $pelatihan['kode_instruktur']; ?>"><?= $pelatihan['kode_instruktur']; ?></option>
                                                    <option value="0">Saab</option>
                                                    <option value="1">Mercedes</option>
                                                    <option value="2">Audi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Ubah Data Pelatihan">
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= $title; ?> 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/thirdparty/jquery/jquery.min.js"></script>
    <script src="/thirdparty/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/thirdparty/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/thirdparty/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="/thirdparty/datatables/jquery.dataTables.min.js"></script>
    <script src="/thirdparty/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    <script>
        function setEndDateMin() {
            var startDate = document.getElementById("tgl_mulai").value;
            document.getElementById("tgl_selesai").setAttribute("min", startDate);
        }
    </script>

</body>

</html>