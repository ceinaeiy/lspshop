<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h2 class="mb-3">Riwayat Transaksi</h2>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <a href="/transaksi/create" class="btn btn-success mb-3">
            Buat Transaksi Baru
        </a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Waktu Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; foreach ($transaksi as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($t['created_at'])); ?></td>
                        <td><?= $t['nama_produk']; ?></td>
                        <td><?= $t['jumlah']; ?></td>
                        <td>Rp <?= number_format($t['total_harga'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($transaksi)) : ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>