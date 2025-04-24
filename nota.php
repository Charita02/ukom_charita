<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    if ($harga <= 0 || $diskon > 100) {
        echo "<script>alert('Harga / Diskon Tidak Valid!!');</script>";
        exit;
    }

    // Hitung Harga Diskon
    $jumlah_bayar = $harga * $jumlah_beli;
    $nilai_diskon = $harga * ($diskon / 100);
    $total_bayar = $jumlah_bayar - $nilai_diskon;

    //Masukkan data ke database
    $sql1 = "INSERT INTO barang (kode_barang, nama_barang, jumlah_beli, harga, jumlah_bayar, total_bayar) 
        VALUES ('$kode_barang', '$nama_barang', '$jumlah_beli', '$harga', '$jumlah_bayar', '$total_bayar')";

    $sql2 = "INSERT INTO nota (kode_barang, nama_barang, jumlah_beli, harga, diskon, total_bayar) 
        VALUES ('$kode_barang', '$nama_barang', '$jumlah_beli', '$harga', '$diskon', '$total_bayar')";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "<script>alert('Data Berhasil Disimpan Ke Database')</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan, Silahkan Cek Kodenya!');</script>";
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Diskon</title>
    <!-- Mengimpor font Poppins dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Mengatur body agar menggunakan font Poppins dan warna latar belakang */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fce4ec;
            /* Warna pink pastel lembut */
            margin: 0;
            padding: 0;
        }

        /* Styling untuk container nota */
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            font-family: monospace;
        }

        h1 {
            text-align: center;
            color: #d81b60;
            /* Warna pink lebih gelap untuk teks */
            font-size: 1.8em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            display: flex;
            font-size: 1.2em;
            color: #444;
            margin-bottom: 10px;
            justify-content: space-between;
            border-bottom: 1px dashed #000;
        }

        .note-info {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8bbd0;
            /* Warna pink pastel untuk latar belakang nota */
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .note-info strong {
            color: #d81b60;
            /* Warna pink lebih gelap untuk teks yang penting */
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #d81b60;
            /* Warna pink untuk tombol */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.2em;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c2185b;
            /* Efek hover pada tombol */
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Nota Pembelian</h1>

        <div class="note-info">
            <?php
            echo "<p><strong>Kode Barang:</strong> $kode_barang</p>";
            echo "<p><strong>Nama Barang:</strong> $nama_barang</p>";
            echo "<p><strong>Jumlah Beli:</strong> $jumlah_beli</p>";
            echo "<p><strong>Harga Satuan:</strong> Rp. " . number_format($harga, 2, ",", ".") . "</p>";
            echo "<p><strong>Jumlah Bayar:</strong> Rp. " . number_format($jumlah_bayar, 2, ",", ".") . "</p>";
            echo "<p><strong>Diskon:</strong> $diskon%</p>";
            echo "<p><strong>Nilai Diskon:</strong> Rp. " . number_format($nilai_diskon, 2, ",", ".") . "</p>";
            echo "<p><strong>Total Bayar:</strong> Rp. " . number_format($total_bayar, 2, ",", ".") . "</p>";
            ?>
        </div>

        <button onclick="window.print()">Cetak Nota Pembelian</button>
    </div>

</body>

</html>