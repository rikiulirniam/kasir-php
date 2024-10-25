<?php

include_once("../config/config.php");

// Check If form submitted, insert or update form data into users table.
if (isset($_POST['submit']) || isset($_POST['edit'])) {
  // Mengambil data dari form
  $barcode    = $_POST['barcode'];
  // $newbarcode    = $_POST['newbarcode'];
  $nama       = $_POST['nama_barang'];
  $keterangan = $_POST['keterangan'];
  $stok       = $_POST['stok'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $id  = $_POST['id'];

  // Cek apakah ini adalah operasi update atau insert
  if (isset($_POST['edit'])) {
    // Update data
    $query = "UPDATE barang SET
                barcode = '$barcode',
                nama = '$nama',
                keterangan = '$keterangan',
                stok = '$stok',
                harga_beli = '$harga_beli',
                harga_jual = '$harga_jual'
              WHERE id = '$id'";

    $result = mysqli_query($mysqli, $query);

    // var_dump($barcode);
    // die();

    if ($result) {
      $_SESSION['info'] = [
        'status' => 'success',
        'message' => 'Berhasil memperbarui data'
      ];
      header('Location: ./index.php');
    } else {
      $_SESSION['info'] = [
        'status' => 'failed',
        'message' => mysqli_error($mysqli)
      ];
      header('Location: ./index.php');
    }
  } else if (isset($_POST['submit'])) {
    // Insert data
    $query = "INSERT INTO barang(
                barcode,
                nama, 
                keterangan,
                stok,
                harga_beli,
                harga_jual) VALUES(
                '$barcode',
                '$nama',
                '$keterangan',
                '$stok',
                '$harga_beli',
                '$harga_jual')";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
      $_SESSION['info'] = [
        'status' => 'success',
        'message' => 'Berhasil menambah data'
      ];
      header('Location: ./index.php');
    } else {
      $_SESSION['info'] = [
        'status' => 'failed',
        'message' => mysqli_error($mysqli)
      ];
      header('Location: ./addbarang.php');
    }
  }
}
