<?php
include '../config/config.php';

$kd = $_GET['kd'];

if (isset($_GET['kd'])) {
  $query = $mysqli->query("
  SELECT * FROM penjualan WHERE kd_transaksi = '$kd'");
  $res =  $query->fetch_all(MYSQLI_ASSOC)[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>SMK Tunas Harapan Pati | Penjualan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    name="viewport" />
  <!-- Bootstrap 3.3.7 -->
  <link
    rel="stylesheet"
    href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="../asset/bower_components/font-awesome/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link
    rel="stylesheet"
    href="../asset/bower_components/Ionicons/css/ionicons.min.css" />
  <!-- DataTables -->
  <link
    rel="stylesheet"
    href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css" />
  <link
    rel="stylesheet"
    href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- Google Font -->
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
</head>
<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
  }


  @media print {

    #nota {
      border: solid 1px black;
      box-shadow: 2px 2px 2px 2px black;
      width: 400px;
      padding: 0 1.5em 1.5em;
    }

    #nota>h3 {
      font-style: bold;
      text-align: center;
    }

    hr {
      border: 1px solid black;
    }

    .transaksi {
      width: 100%;
    }

    td {
      padding-top: 1em;
    }
  }
</style>

<body>
  <div id="nota">
    <h3>Tunas Harapan Store</h3>
    <hr />
    <table class="transaksi">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jumlah</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query_detail = $mysqli->query("
                                    SELECT detail_transaksi.*, barang.nama AS nama_barang, barang.harga_jual 
                                    FROM detail_transaksi
                                    JOIN barang ON detail_transaksi.id_barang = barang.id
                                    WHERE detail_transaksi.kd_transaksi = '$kd'
                                    ORDER BY detail_transaksi.id DESC");
        while ($row = mysqli_fetch_array($query_detail)) {

        ?>
          <tr class="det_trn">
            <td class="brg"><?= $row['nama_barang'] ?></td>
            <td class="jumlah"><?= $row['jumlah'] ?> unit</td>
            <td class="harga"><?= rupiah($row['harga_jual']) ?></td>
          </tr>

        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3">
            <hr />
          </td>
        </tr>
        <tr>
          <td colspan="2">Total Belanja </td>
          <td colspan="1"><?= rupiah($res['total_belanja']) ?></td>
        </tr>
        <tr>
          <td colspan="2">Total Bayar </td>
          <td colspan="1"><?= rupiah(val: $res['total_bayar']) ?></td>
        </tr>
        <tr>
          <td colspan="2">Kembalian </td>
          <td colspan="1"><?= rupiah($res['total_bayar'] - $res['total_belanja']) ?></td>
        </tr>
        <tr>
          <td colspan="3">
            <hr>
          </td>
        </tr>
      </tfoot>
    </table>
    <a href="http://localhost/penjualan">Kembali</a>
  </div>

  <script>
    window.print();
  </script>

</body>

</html>