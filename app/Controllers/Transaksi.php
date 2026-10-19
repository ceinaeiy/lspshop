<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\ProdukModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $produkModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->produkModel = new ProdukModel();
    }

    // Menampilkan riwayat transaksi
    public function index()
    {
        $data = [
            'title'     => 'Riwayat Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksiLengkap()
        ];

        return view('transaksi/index', $data);
    }

    // Menampilkan form kasir
    public function create()
    {
        $data = [
            'title' => 'Kasir - Transaksi Baru',

            // Mengambil data produk yang stoknya lebih dari 0 untuk dipilih di dropdown
            'produk' => $this->produkModel->where('stok >', 0)->findAll()
        ];

        return view('transaksi/create', $data);
    }

    // Memproses penyimpanan transaksi dan potong stok
    public function save()
    {
        $id_produk = $this->request->getVar('id_produk');
        $jumlah_beli = $this->request->getVar('jumlah');

        // 1. Cari tahu harga dan stok produk saat ini
        $produk = $this->produkModel->find($id_produk);

        // 2. Cek apakah stok mencukupi
        if ($produk['stok'] < $jumlah_beli) {
            session()->setFlashdata('error', 'Stok produk tidak mencukupi!');
            return redirect()->back();
        }

        // 3. Hitung total harga otomatis
        $total_harga = $produk['harga'] * $jumlah_beli;

        // 4. Simpan ke tabel transaksi
        $this->transaksiModel->save([
            'id_produk'   => $id_produk,
            'jumlah'      => $jumlah_beli,
            'total_harga' => $total_harga
        ]);

        // 5. Kurangi stok di tabel produk (Update Stok)
        $sisa_stok = $produk['stok'] - $jumlah_beli;

        $this->produkModel->save([
            'id_produk' => $id_produk,
            'stok'      => $sisa_stok
        ]);

        session()->setFlashdata('pesan', 'Transaksi berhasil disimpan. Stok telah dikurangi.');

        return redirect()->to('/transaksi');
    }
}