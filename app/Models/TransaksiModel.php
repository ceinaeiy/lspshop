<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'id_produk',
        'jumlah',
        'total_harga'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk mengambil data transaksi beserta nama produk (JOIN)
    public function getTransaksiLengkap()
    {
        return $this->db->table('transaksi')
            ->join('produk', 'produk.id_produk = transaksi.id_produk')
            ->orderBy('transaksi.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}