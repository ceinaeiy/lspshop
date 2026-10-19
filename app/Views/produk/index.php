
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col">
        <h2 class="mb-3">Daftar Produk</h2>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <a href="/produk/create" class="btn btn-primary mb-3">
            Tambah Data Produk
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>

                <?php foreach ($produk as $p) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $p['kode_produk']; ?></td>
                        <td><?= $p['nama_produk']; ?></td>
                        <td>
                            Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                        </td>
                        <td><?= $p['stok']; ?></td>
                        <td>
                            <a
                                href="/produk/edit/<?= $p['id_produk']; ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="/produk/<?= $p['id_produk']; ?>"
                                method="post"
                                class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                            >
                                <?= csrf_field(); ?>

                                <input
                                    type="hidden"
                                    name="_method"
                                    value="DELETE"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
