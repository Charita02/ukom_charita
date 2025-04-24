<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Hitung Diskon</title>

    <!-- Mengimpor font Poppins dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Menggunakan font Poppins untuk seluruh body */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fce4ec; /* Warna pink pastel lembut */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #d81b60; /* Warna pink lebih gelap untuk teks */
            font-size: 2em;
            font-weight: 700; /* Menggunakan varian bold untuk judul */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1em;
            color: #444;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #d81b60; /* Fokus dengan warna pink */
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #d81b60; /* Tombol dengan warna pink */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.2em;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c2185b; /* Efek hover tombol */
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Aplikasi Hitung Diskon</h1>

        <form class="form-control" action="nota.php" method="POST">
            <label for="kode"><strong>Kode Barang :</strong></label>
            <input type="text" name="kode_barang" placeholder="Masukkan Kode Barang" required>

            <label for="nama"><strong>Nama Barang :</strong></label>
            <input type="text" name="nama_barang" placeholder="Masukkan Nama Barang" required>

            <label for="jumlah"><strong>Jumlah Barang :</strong></label>
            <input type="number" name="jumlah_beli" placeholder="Masukkan Jumlah Barang" required>

            <label for="harga"><strong>Harga Barang :</strong></label>
            <input type="number" name="harga" placeholder="Masukkan Harga Barang" required>

            <label for="diskon"><strong>Diskon (%) :</strong></label>
            <input type="number" name="diskon" placeholder="Masukkan Diskon (10%)" required>

            <button type="submit">Hitung Harga</button>
        </form>
    </div>

</body>
</html>
