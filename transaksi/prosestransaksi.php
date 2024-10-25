<?php
include "../config/config.php";

if (isset($_POST['add_transaksi'])) {
    $nama_pembeli = $_POST['nama_pembeli'];


    $result = $mysqli->query("SELECT kd_transaksi FROM penjualan ORDER BY kd_transaksi DESC LIMIT 1");
    $res = $result->fetch_assoc();


    if ($res) {
        $kd_before = $res['kd_transaksi'];
        $kd_num_bef = (int) substr($kd_before, 3);
    } else {
        $kd_num_bef = 0;
    }

    $kd_num = $kd_num_bef + 1;

    $kd_transaksi = "TRN" . str_pad($kd_num, 4, "0", STR_PAD_LEFT);

    $query = $mysqli->query("INSERT INTO penjualan (kd_transaksi,nama_pembeli) VALUES ('$kd_transaksi', '$nama_pembeli') ");

    if ($query) {
        header("location:adddetail.php?kd=$kd_transaksi&nama=$nama_pembeli");
    }
}


if (isset($_POST['save_trn'])) {
    $kd = $_POST['kd'];
    $nama = $_POST['nama'];

    // $now = date();
    $now = new DateTime();
    $tgl_transaksi = $now->format('Y-m-d');    // MySQL datetime format

    $query_get_detail = $mysqli->query("SELECT * FROM detail_transaksi JOIN barang ON detail_transaksi.id_barang = barang.id WHERE kd_transaksi = '$kd' ");
    $details = $query_get_detail->fetch_all(MYSQLI_ASSOC);


    $total_belanja = 0;
    $total_bayar += $_POST['total_bayar'];

    foreach ($details as $detail) {
        $id = $detail['id'];
        $total_belanja += $detail['jumlah'] * $detail['harga_jual'];
    }

    if ($total_belanja > $total_bayar) {

        header("location:adddetail.php?kd=$kd&nama=$nama&tdkcukub");
    } else {

        $query_put_trn = $mysqli->query("UPDATE penjualan SET tgl_transaksi = '$tgl_transaksi', total_belanja='$total_belanja', total_bayar='$total_bayar' WHERE kd_transaksi='$kd'");
        header("location:nota.php?kd=$kd");
    }

    // header('location:')
}


// Memeriksa apakah formulir dikirimkan
if (isset($_POST['delete_det_data'])) {
    // Mendapatkan nilai ID dan KD dari form
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $kd = isset($_POST['kd']) ? $_POST['kd'] : null;
    $nama = $_POST['nama'];


    // Memastikan bahwa $id dan $kd tidak kosong
    if ($id && $kd) {
        // Menggunakan prepared statement untuk menghindari SQL injection
        $stmt = $mysqli->prepare("DELETE FROM detail_transaksi WHERE id = ?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            // Jika penghapusan berhasil, arahkan kembali ke halaman sebelumnya
            header("Location: detailtransaksi.php?kd=" . urlencode($kd) . "&nama=$nama");
            exit();
        } else {
            // Jika terjadi error saat eksekusi query
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "ID atau KD tidak valid.";
    }
}
if (isset($_POST['delete_det'])) {
    // Mendapatkan nilai ID dan KD dari form
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $kd = isset($_POST['kd']) ? $_POST['kd'] : null;
    $nama = $_POST['nama'];


    // Memastikan bahwa $id dan $kd tidak kosong
    if ($id && $kd) {
        // Menggunakan prepared statement untuk menghindari SQL injection
        if ($_POST['jumlah'] > 1) {
            $jumlah = $_POST['jumlah'] - 1;
            $stmt = $mysqli->prepare("UPDATE detail_transaksi SET jumlah='$jumlah' WHERE id = $id ");
        } else {
            $stmt = $mysqli->prepare("DELETE FROM detail_transaksi WHERE id = ?");
            $stmt->bind_param('i', $id);
        }


        if ($stmt->execute()) {
            // Jika penghapusan berhasil, arahkan kembali ke halaman sebelumnya
            header("Location: adddetail.php?kd=" . urlencode($kd) . "&nama=$nama");
            exit();
        } else {
            // Jika terjadi error saat eksekusi query
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "ID atau KD tidak valid.";
    }
}

if (isset($_POST['delete_trn'])) {
    // Mendapatkan nilai ID dan KD dari form
    $kd = $_POST['kd'];

    // Memastikan bahwa $id dan $kd tidak kosong
    if ($kd) {
        $query_det = $mysqli->query("DELETE FROM detail_transaksi WHERE kd_transaksi = '$kd'");
        $query = $mysqli->query("DELETE FROM penjualan WHERE kd_transaksi = '$kd'");
        header("location: datatransaksi.php");
    } else {
        echo "ID atau KD tidak valid.";
    }
}

if (isset($_POST['detail_trn'])) {
    // Mendapatkan nilai ID dan KD dari form
    $kd = $_POST['kd'];
    $nama = $_POST['nama'];

    // Memastikan bahwa $id dan $kd tidak kosong
    if ($kd) {
        header("location: detailtransaksi.php?kd=$kd&nama=$nama");
    } else {
        echo "KD tidak valid.";
    }
}


if (isset($_POST['edit_jumlah'])) {
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Query untuk mengupdate jumlah barang berdasarkan id_barang
    $query = $mysqli->query("UPDATE detail_transaksi SET jumlah='$jumlah' WHERE id_barang='$id_barang'");

    // Redirect kembali ke halaman transaksi setelah update berhasil
    if ($query) {
        // Mengambil parameter tambahan dari URL, jika tersedia
        $kd_transaksi = $_GET['kd'];
        $nama = isset($_GET['nama']) ? $_GET['nama'] : ''; // Cek jika 'nama' ada di URL

        // Menyiapkan URL untuk redirect
        $redirect_url = "adddetail.php?kd=" . urlencode($kd_transaksi) . "&nama=" . urlencode($nama);
        header("Location: $redirect_url");
        exit();
    } else {
        echo "Gagal memperbarui jumlah.";
    }
}
