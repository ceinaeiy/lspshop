<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-8">
        <h2 class="my-3">Form Ubah Data Produk</h2>

        <form action="/produk/update/<?= $produk['id_produk']; ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk</label>
                <input type="text" class="form-control"
                    id="kode_produk" name="kode_produk"
                    value="<?= $produk['kode_produk']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control"
                    id="nama_produk" name="nama_produk"
                    value="<?= $produk['nama_produk']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control"
                    id="harga" name="harga"
                    value="<?= $produk['harga']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control"
                    id="stok" name="stok"
                    value="<?= $produk['stok']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="/produk" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>