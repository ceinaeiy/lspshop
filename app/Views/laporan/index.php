<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h2 class="mb-3">Laporan Stok Produk</h2>

        <!-- Tombol Cetak yang mengarah ke tab baru -->
        <a href="/laporan/cetak_produk" target="_blank" class="btn btn-secondary mb-3">
            🖨️ Cetak Laporan (Print / PDF)
        </a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Nilai Aset (Harga x Stok)</th>
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
                        <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr class="table-active fw-bold">
                    <td colspan="5" class="text-end">Total Nilai Aset Keseluruhan:</td>
                    <td>Rp <?= number_format($grand_total, 0, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<?= $this->endSection() ?>