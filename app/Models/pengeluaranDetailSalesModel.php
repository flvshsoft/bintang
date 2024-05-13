<?php

namespace App\Models;

use CodeIgniter\Model;

class pengeluaranDetailSalesModel extends Model
{
    protected $table = 'pengeluaran_detail_sales';
    protected $primaryKey = 'id_pengeluaran_detail_sales';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_pengeluaran_sales', 'id_branch', 'id_user', 'ket_pengeluaran', 'nominal', ''];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}