<?php
include '../config/config.php';


if (isset($_POST['delete_brg'])) {

    $id = $_POST['id'];
    $query_detail = $mysqli->query("DELETE FROM detail_transaksi WHERE id_barang = '$id'");
    $query = $mysqli->query("DELETE FROM barang WHERE id = '$id'");
    header('location: /penjualan/barang/index.php');
} 