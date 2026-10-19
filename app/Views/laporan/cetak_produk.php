<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h2>SISTEM INFORMASI TOKO SMK</h2>
        <p>Jl. Pendidikan No. 1, Kota Belajar</p>
        <hr>
        <h3>LAPORAN STOK DAN ASET PRODUK</h3>
        <p>Tanggal Cetak: <?= date('d M Y H:i:s'); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Subtotal Aset</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            $grand_total = 0;

            foreach ($produk as $p) :
                $subtotal = $p['harga'] * $p['stok'];
                $grand_total += $subtotal;
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['kode_produk']; ?></td>
                    <td><?= $p['nama_produk']; ?></td>
                    <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                    <td><?= $p['stok']; ?></td>
                    <td class="text-right">
                        Rp <?= number_format($subtotal, 0, ',', '.'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <th colspan="5" class="text-right">TOTAL NILAI ASET:</th>
                <th class="text-right">
                    Rp <?= number_format($grand_total, 0, ',', '.'); ?>
                </th>
            </tr>
        </tfoot>
    </table>

    <br><br>

    <div style="float: right; text-align: center;">
        <p>Mengetahui,</p>
        <br><br><br>
        <p><strong>Kepala Toko / Admin</strong></p>
    </div>

    <!-- Script otomatis memunculkan dialog print -->
    <script>
        window.print();
    </script>
</body>
</html>