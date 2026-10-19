<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();

        // Menghitung total macam/item produk
        $totalProduk = $produkModel->countAll();

        // Melakukan query manual (Query Builder) untuk menjumlahkan total stok dan nilai aset
        $db = \Config\Database::connect();
        $query = $db->query("SELECT SUM(stok) as total_stok, SUM(harga * stok) as total_aset FROM produk");
        $row = $query->getRow();

        $data = [
            'title'        => 'Dashboard Toko',
            'total_produk' => $totalProduk,
            'total_stok'   => $row->total_stok ?? 0,
            'total_aset'   => $row->total_aset ?? 0
        ];

        return view('dashboard/index', $data);
    }
}