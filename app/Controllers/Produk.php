<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        // Instansiasi model agar bisa digunakan di semua method
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Produk',
            'produk' => $this->produkModel->findAll(), // Mengambil semua data
        ];

        return view('produk/index', $data);
    }

    
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Produk'
        ];
    
        return view('produk/create', $data);
    }
    
    public function save()
    {
        // Simpan data produk
        $this->produkModel->save([
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga'       => $this->request->getVar('harga'),
            'stok'        => $this->request->getVar('stok')
        ]);
    
        // Tampilkan pesan berhasil
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
    
        // Kembali ke halaman daftar produk
        return redirect()->to('/produk');
    }

    
    public function edit($id)
    {
        $data = [
            'title'  => 'Form Ubah Data Produk',
            'produk' => $this->produkModel->find($id)
        ];
    
        return view('produk/edit', $data);
    }
    
    public function update($id)
    {
        $this->produkModel->save([
            'id_produk'   => $id,
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga'       => $this->request->getVar('harga'),
            'stok'        => $this->request->getVar('stok')
        ]);
    
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
    
        return redirect()->to('/produk');
    }
    
    public function delete($id)
    {
    $this->produkModel->delete($id);

    session()->setFlashdata('pesan', 'Data berhasil dihapus.');

    return redirect()->to('/produk');
    }
    
}