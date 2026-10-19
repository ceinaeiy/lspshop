<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Field yang diizinkan untuk diisi (mass assignment)
    protected $allowedFields = [
        'kode_produk',
        'nama_produk',
        'harga',
        'stok'
    ];

    // Aktifkan timestamp otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}