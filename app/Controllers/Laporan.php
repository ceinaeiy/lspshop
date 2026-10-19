<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Laporan extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    // Menampilkan halaman data laporan sebelum dicetak
    public function index()
    {
        $data = [
            'title'  => 'Laporan Stok Produk',
            'produk' => $this->produkModel->findAll()
        ];

        return view('laporan/index', $data);
    }

    // Menampilkan format halaman cetak (tanpa navbar/layout utama)
    public function cetak_produk()
    {
        $data = [
            'title'  => 'Cetak Laporan Produk',
            'produk' => $this->produkModel->findAll()
        ];

        return view('laporan/cetak_produk', $data);
    }
}