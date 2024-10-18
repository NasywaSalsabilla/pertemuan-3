<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pencatatan Data Penjualan</title>
</head>
<body>
    <h2>Sistem Pencatatan Data Penjualan</h2>
    <form method="post">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required><br>

        <label>Harga per Produk:</label>
        <input type="number" name="harga_produk" required><br>

        <label>Jumlah Terjual:</label>
        <input type="number" name="jumlah_terjual" required><br>

        <input type="submit" name="submit" value="Tambah Penjualan">
    </form>

    <?php
    // Array untuk menyimpan data transaksi
    $dataPenjualan = [];

    // Memeriksa apakah form sudah di-submit
    if (isset($_POST['submit'])) {
        // Mengambil data dari form
        $namaProduk = $_POST['nama_produk'];
        $hargaProduk = $_POST['harga_produk'];
        $jumlahTerjual = $_POST['jumlah_terjual'];

        // Menghitung total untuk produk yang dijual
        $total = $hargaProduk * $jumlahTerjual;

        // Menyimpan data transaksi dalam array asosiatif
        $transaksi = [
            'nama_produk' => $namaProduk,
            'harga_produk' => $hargaProduk,
            'jumlah_terjual' => $jumlahTerjual,
            'total' => $total
        ];

        // Menambahkan transaksi ke array penjualan
        array_push($dataPenjualan, $transaksi);
    }

    // Fungsi untuk menghitung total penjualan dari semua transaksi
    function hitungTotalPenjualan($dataPenjualan) {
        $totalPenjualan = 0;
        foreach ($dataPenjualan as $transaksi) {
            $totalPenjualan += $transaksi['total'];
        }
        return $totalPenjualan;
    }

    // Menampilkan laporan penjualan jika ada data
    if (!empty($dataPenjualan)) {
        echo "<h3>Laporan Penjualan:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Nama</th><th>Harga Per Produk</th><th>Jumlah Terjual</th><th>Total</th></tr>";

        foreach ($dataPenjualan as $transaksi) {
            echo "<tr>";
            echo "<td>" . $transaksi['nama_produk'] . "</td>";
            echo "<td>" . $transaksi['harga_produk'] . "</td>";
            echo "<td>" . $transaksi['jumlah_terjual'] . "</td>";
            echo "<td>" . $transaksi['total'] . "</td>";
            echo "</tr>";
        }

        // Menampilkan total keseluruhan
        echo "<tr><td colspan='3'><strong>Total Penjualan</strong></td>";
        echo "<td><strong>" . hitungTotalPenjualan($dataPenjualan) . "</strong></td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>