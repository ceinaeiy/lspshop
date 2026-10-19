<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-8">
        <h2 class="my-3">Kasir - Transaksi Baru</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="/transaksi/save" method="post">
                    <?= csrf_field(); ?>

                    <div class="mb-3">
                        <label for="id_produk" class="form-label">Pilih Produk</label>

                        <select class="form-select" id="id_produk" name="id_produk" required>
                            <option value="">-- Pilih Produk --</option>

                            <?php foreach ($produk as $p) : ?>
                                <option value="<?= $p['id_produk']; ?>">
                                    <?= $p['nama_produk']; ?>
                                    (Stok: <?= $p['stok']; ?> | Harga: Rp <?= number_format($p['harga'], 0, ',', '.'); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Beli</label>

                        <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                    </div>

                    <button type="submit" class="btn btn-success">Proses Pembayaran</button>
                    <a href="/transaksi" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>