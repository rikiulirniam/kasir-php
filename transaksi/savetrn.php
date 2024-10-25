<?php
// Include library FPDF
require('fpdf/fpdf.php');
require('../config/config.php'); // File koneksi ke database

// Buat instance baru dari FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Set font untuk judul
$pdf->SetFont('Arial', 'B', 16);

// Buat judul
$pdf->Cell(0, 10, 'Riwayat Penjualan', 0, 1, 'C');
$pdf->Cell(0, 10, 'Tunas Harapan Store', 0, 1, 'C');
$pdf->Ln(10); // Line break (spasi kosong setelah judul)

// Set font untuk tabel
$pdf->SetFont('Arial', 'B', 8);

// Header tabel
$pdf->Cell(30, 10, 'Kode', 1);
$pdf->Cell(30, 10, 'Tanggal', 1);
$pdf->Cell(30, 10, 'Nama Pembeli', 1);
$pdf->Cell(30, 10, 'Jumlah barang', 1);
$pdf->Cell(30, 10, 'Total Belanja', 1);
$pdf->Cell(30, 10, 'Total Bayar', 1);
$pdf->Ln(); // Pindah baris untuk isi tabel

// Mengambil data dari database
$result = mysqli_query($mysqli, "SELECT * FROM penjualan");


// Set font untuk isi tabel
$pdf->SetFont('Arial', '', 8);

// Mengisi tabel dengan data dari database
while ($data = mysqli_fetch_array($result)) {
    $id = $data['kd_transaksi'];
    $cur_juml = 0;

    $query_det = $mysqli->query("SELECT * FROM detail_transaksi WHERE kd_transaksi = '$id'");
    $res = $query_det->fetch_all(MYSQLI_ASSOC);

    // var_dump($res);
    foreach ($res as $dt) {
        $cur_juml += $dt['jumlah'];
    }

    $pdf->Cell(30, 10, $data['kd_transaksi'], 1);
    $pdf->Cell(30, 10, $data['tgl_transaksi'], 1);
    $pdf->Cell(30, 10, $data['nama_pembeli'], 1);
    $pdf->Cell(30, 10, $cur_juml, 1);
    $pdf->Cell(30, 10, rupiah($data['total_belanja']), 1);
    $pdf->Cell(30, 10, rupiah($data['total_bayar']), 1);
    $pdf->Ln();
}

// Output PDF ke browser (langsung download)
$pdf->Output('D', 'Riwayat_Penjualan.pdf');

// Setelah mendownload, arahkan ke halaman lain (catatan: tidak bisa dilakukan setelah output PDF)
// Redirect ini tidak akan berhasil karena header HTTP sudah dikirim dengan PDF, jadi lakukan pengalihan di frontend atau lewat tautan.
