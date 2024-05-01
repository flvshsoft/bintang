<?php

namespace App\Models;

use CodeIgniter\Model;

class pengeluaranSalesModel extends Model
{
    protected $table = 'pengeluaran_sales';
    protected $primaryKey = 'id_pengeluaran_sales';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_sales', 'id_branch', 'id_area', 'id_partner', 'id_user', 'keterangan_pengeluaran_sales', '', 'minggu_pengeluaran_sales'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
