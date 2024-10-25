<?php
include '../config/config.php';

if (isset($_POST['add_detail'])) {
    var_dump($_POST);
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMK Tunas Harapan Pati | Penjualan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>TH</b>PT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SMK</b>Tunas Harapan Pati</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../asset/dist/img/avatar5.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Riki Ulir Niam</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../asset/dist/img/avatar5.png" class="img-circle" alt="User Image">

                                    <p>
                                        Riki Ulir Niam - Web Programmer
                                        <small>Nomer Absen 39</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../asset/dist/img/avatar5.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Riki Ulir Niam</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu</li>
                    <!-- <li><a href="siswa.php"><i class="fa fa-book"></i> <span>Data Siswa</span></a></li>
        <li><a href="kelas.php"><i class="fa fa-book"></i> <span>Data Kelas</span></a></li> -->
                    <li><a href="../barang/index.php"><i class="fa fa-book"></i> <span>Data Barang</span></a></li>
                    <li><a href="../transaksi/datatransaksi.php"><i class="fa fa-book"></i> <span>Data
                                Transaksi</span></a>
                    </li>
                    <li><a href="../transaksi/index.php"><i class="fa fa-plus"></i> <span>Buat Transaksi</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Data Transaksi
                    <small>SMK Tunas Harapan Pati</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-"></i> Data Transaksi</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Riwayat Transaksi Transaksi</h3>
                    </div>


                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="padding: 1em;" width="15%" class="">Kode Transaksi</th>
                                    <th style="padding: 1em;" width="15%" class="">Tanggal</th>
                                    <th style="padding: 1em;" width="10%" class="">Nama Pembeli</th>
                                    <th style="padding: 1em;" width="10%" class="">Jumlah Barang</th>
                                    <th style="padding: 1em;" width="20%" class="">Total Belanja</th>
                                    <th style="padding: 1em;" width="15%" class="">Total Bayar</th>
                                    <th style="padding: 1em;" width="15%" class="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: left;">
                                <?php
                                $result = mysqli_query($mysqli, "SELECT * FROM penjualan ");
                                while ($data = mysqli_fetch_array($result)) {
                                    $id = $data['kd_transaksi'];
                                    $cur_juml = 0;

                                    $query_det = $mysqli->query("SELECT * FROM detail_transaksi WHERE kd_transaksi = '$id'");
                                    $res = $query_det->fetch_all(MYSQLI_ASSOC);

                                    // var_dump($res);
                                    foreach ($res as $dt) {
                                        $cur_juml += $dt['jumlah'];
                                    }

                                ?>
                                    <tr>
                                        <td style="padding: 1em;"><?php echo $data['kd_transaksi'] ?></td>
                                        <td style="padding: 1em;"><?php echo $data['tgl_transaksi'] ?></td>
                                        <td style="padding: 1em;"><?php echo $data["nama_pembeli"] ?></td>
                                        <td style="padding: 1em;"><?php echo $cur_juml ?></td>
                                        <td style="padding: 1em;"><?php echo rupiah($data["total_belanja"]) ?></td>
                                        <td style="padding: 1em;"><?php echo rupiah($data["total_bayar"]) ?></td>
                                        <td class="">
                                            <form action="prosestransaksi.php" method="POST">
                                                <input type="hidden" name="kd" value="<?= $data['kd_transaksi'] ?>" />
                                                <input type="hidden" name="nama" value="<?= $data['nama_pembeli'] ?>" />

                                                <button type="submit" name="detail_trn"
                                                    class="btn btn-warning">Detail</button>
                                                <button type="submit" name="delete_trn"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                    </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="1" style="display: flex; justify-content: end; padding: 2em 5em 0 0 ;">
                                        <a href="savetrn.php" class="btn btn-primary">Simpan</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>


                <!-- /.box-body -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../asset/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../asset/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

        function fetchData() {
            var barcode = $('#barcode').val();

            if (barcode !== '') {
                // Kirim permintaan AJAX ke PHP
                $.ajax({
                    url: 'fetch_barang.php', // File PHP untuk mengambil data
                    type: 'POST',
                    data: {
                        barcode: barcode
                    },
                    success: function(response) {
                        var data = JSON.parse(response);

                        // Jika barang ditemukan, isi input nama_barang dan harga
                        if (data.success) {
                            $('#nama_barang').val(data.nama);
                            $('#harga').val(data.harga);
                        } else {
                            alert('Barang tidak ditemukan');
                            $('#nama_barang').val('');
                            $('#harga').val('');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan');
                    }
                });
            }
        }
    </script>
</body>

</html>