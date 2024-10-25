<?php
include '../config/config.php';

$kd_transaksi = $_GET['kd'];
if ($kd_transaksi) {
    $query = $mysqli->query("SELECT * FROM penjualan WHERE kd_transaksi = '$kd_transaksi'");
    $now_penjualan = $query->fetch_assoc();
} else {
    header('location: ../index.php');
}

if (isset($_POST['add_detail'])) {
    // var_dump($_POST);

    $barcode = $_POST['barcode'];
    $query_brg = $mysqli->query("SELECT * FROM barang WHERE barcode = '$barcode'");
    $barang = $query_brg->fetch_assoc();
    $barang_id = $barang["id"] ?? null;

    // Cek apakah barang sudah ada di detail_transaksi
    $query_detail = $mysqli->query("SELECT * FROM detail_transaksi WHERE id_barang = '$barang_id' AND kd_transaksi = '$kd_transaksi'");

    if ($query_detail && $query_detail->num_rows > 0) {
        // Jika ada barang dengan id dan kd_transaksi yang sama, update jumlah
        $cur_detail = $query_detail->fetch_assoc();
        $jumlah_added = $cur_detail['jumlah'] + 1;

        // Update jumlah di detail_transaksi
        $query = $mysqli->query("UPDATE detail_transaksi SET jumlah = '$jumlah_added' WHERE id_barang = '$barang_id' AND kd_transaksi = '$kd_transaksi'");

        if (!$query) {
            echo "Error: " . $mysqli->error;
        }
    } else {
        // Jika tidak ada, insert data baru
        if ($barang_id) {
            $query = $mysqli->query("INSERT INTO detail_transaksi (id_barang, kd_transaksi, jumlah) VALUES ('$barang_id', '$kd_transaksi', '1')");
        }

        // if (!$query) {
        //     echo "Error: " . $mysqli->error;
        // }
    }
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
    <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">

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
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Form Detail Transaksi
                    <small>SMK Tunas Harapan Pati</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-Penjualan"></i> Penjualan</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Identitas</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3 style="margin: 1em;">Kode Transaksi : <?= $_GET['kd'] ?></h3>
                            </div>
                            <div class="col-xs-6 text-right">
                                <h3 style="margin: 1em;">Nama Pembeli : <?= $now_penjualan['nama_pembeli'] ?></h3>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- </div> -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Barang</h3>
                    </div>

                    <br><br>

                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="25%" class="">Nama Barang</th>
                                    <th width="25%" class="">Harga</th>
                                    <th width="25%" class="">Jumlah</th>
                                    <th width="25%" class="">Sub Total</th>
                                    <!-- <th width="10%" class="">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query dengan JOIN antara tabel detail_transaksi dan barang
                                $result = mysqli_query($mysqli, "
                                    SELECT detail_transaksi.*, barang.nama AS nama_barang, barang.harga_jual 
                                    FROM detail_transaksi
                                    JOIN barang ON detail_transaksi.id_barang = barang.id
                                    WHERE detail_transaksi.kd_transaksi = '$kd_transaksi'
                                    ORDER BY detail_transaksi.id DESC
                                ");

                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr class="">
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <!-- Menampilkan nama barang dari tabel barang -->
                                        <td><?php echo rupiah($data['harga_jual']); ?></td>
                                        <!-- Menampilkan harga jual dari tabel barang -->

                                        <!-- Kolom jumlah yang bisa diedit dengan double click -->
                                        <td ondblclick="editJumlah(this, <?= $data['id']; ?>)">
                                            <span><?php echo $data['jumlah']; ?></span>
                                            <input type="number" class="edit-input" value="<?php echo $data['jumlah']; ?>"
                                                onblur="saveJumlah(this, <?= $data['id']; ?>)" style="display:none;">
                                        </td>

                                        <td><?php echo rupiah($data['jumlah'] * $data['harga_jual']); ?></td>
                                        <!-- Contoh perhitungan
                                        <td>
                                            <form action="prosestransaksi.php?kd=<?= $kd_transaksi ?>" method="POST"
                                                class="text-center">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                <input type="hidden" name="kd" value="<?= $kd_transaksi ?>">
                                                <input type="hidden" name="nama" value="<?= $_GET['nama'] ?>">

                                            
                                            </form>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <div
                                            style="display: flex;  justify-content: space-between; padding: 20px 45px 0 20px;">
                                            <input type="hidden" name="kd" value="<?= $_GET['kd'] ?>">
                                            <a type="submit" href="./datatransaksi.php"
                                                class="btn btn-warning">Kembali</a>

                                            <div class="sum d-flex">
                                                <span style="padding-inline: 1em; border-right: 1px solid black;">Total Belanja : <?= rupiah($now_penjualan['total_belanja']) ?></span>
                                                <span style="padding-inline: 1em; border-right: 1px solid black;">Total Bayar : <?= rupiah($now_penjualan['total_bayar']) ?></span>
                                                <span style="padding-inline: 1em;">Kembalian : <?= rupiah($now_penjualan['total_bayar'] - $now_penjualan['total_belanja']) ?></span>
                                                <span><a class="btn btn-primary" href="http://localhost/penjualan/transaksi/nota.php?kd=<?= $now_penjualan['kd_transaksi'] ?>">Print</a></span>
                                            </div>
                                        </div>
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
                            // alert('Barang tidak ditemukan');
                            $('#nama_barang').val('Data tidak ditemukan');
                            $('#harga').val('Data tidak ditemukan');
                        }
                    },
                    error: function() {
                        console.log('Terjadi kesalahan');
                    }
                });
            }
        }


        function editJumlah(element, id) {
            let span = element.querySelector('span');
            let input = element.querySelector('input');

            span.style.display = 'none'; // Sembunyikan teks
            input.style.display = 'block'; // Tampilkan input
            input.focus(); // Fokuskan pada input
        }

        // Fungsi untuk menyimpan perubahan jumlah menggunakan AJAX
        function saveJumlah(element, id) {
            let value = element.value; // Ambil nilai input

            // Kembalikan input menjadi teks biasa setelah edit selesai
            let span = element.previousElementSibling;
            span.textContent = value;
            span.style.display = 'block';
            element.style.display = 'none';

            // Kirim data perubahan ke server menggunakan AJAX
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "prosestransaks.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText); // Tampilkan respon dari server
                }
            };
            xhr.send("id=" + id + "&jumlah=" + value); // Kirim ID dan jumlah baru ke server
        }
    </script>
</body>

</html>