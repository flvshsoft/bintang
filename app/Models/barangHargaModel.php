<?php

namespace App\Models;

use CodeIgniter\Model;

class barangHargaModel extends Model
{
    protected $table = 'barang_harga';
    protected $primaryKey = 'id_barang_harga';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $usSoftDeletes = true;
    protected $allowedFields = ['id_product', 'id_jenis_harga', 'harga_aktif', 'created_by'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}