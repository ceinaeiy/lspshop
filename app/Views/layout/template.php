<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Sistem Informasi Toko' ?></title>

    <!-- Bootstrap CSS CDN -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Toko SMK</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
             <li class="nav-item">
                 <a class="nav-link" href="/">Dashboard</a>
             </li>
         
             <li class="nav-item">
                 <a class="nav-link" href="/produk">Kelola Produk</a>
             </li>
         
             <!-- Tambahkan baris ini -->
             <li class="nav-item">
                 <a class="nav-link text-warning fw-bold" href="/transaksi">
                     Kasir / Transaksi
                 </a>
             </li>
             <!-- =================== -->
         
             <li class="nav-item">
                 <a class="nav-link" href="/laporan">Laporan</a>
             </li>
            </ul>
        </div>
    </div>
    </nav>

    <!-- Area Konten Utama -->
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS CDN -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>

