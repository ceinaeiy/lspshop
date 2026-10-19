<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Dashboard Sistem Informasi Toko</h2>
    </div>
</div>

<div class="row">
    <!-- Card Total Produk -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5 class="card-title">Total Item Produk</h5>
                <h2 class="display-5"><?= $total_produk; ?></h2>
                <p class="card-text">Macam barang yang terdaftar.</p>
            </div>
            <div class="card-footer bg-transparent border-white">
                <a href="/produk" class="text-white text-decoration-none">Lihat Detail ➔</a>
            </div>
        </div>
    </div>

    <!-- Card Total Stok -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success shadow">
            <div class="card-body">
                <h5 class="card-title">Total Stok Barang</h5>
                <h2 class="display-5"><?= $total_stok; ?></h2>
                <p class="card-text">Jumlah fisik barang di gudang.</p>
            </div>
            <div class="card-footer bg-transparent border-white">
                <a href="/laporan" class="text-white text-decoration-none">Lihat Laporan ➔</a>
            </div>
        </div>
    </div>

    <!-- Card Total Aset -->
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info shadow">
            <div class="card-body">
                <h5 class="card-title">Estimasi Nilai Aset</h5>
                <h2 class="display-6">Rp <?= number_format($total_aset, 0, ',', '.'); ?></h2>
                <p class="card-text">Total (Harga x Stok) seluruh barang.</p>
            </div>
            <div class="card-footer bg-transparent border-white">
                <small>Berdasarkan harga jual saat ini.</small>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>