<?php

namespace App\Models;

use CodeIgniter\Model;

class closingPengeluaranSalesModel extends Model
{
    protected $table = 'closing_pengeluaran_sales';
    protected $primaryKey = 'id_closing_pengeluaran_sales';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_pengeluaran_sales', 'keterangan', 'id_user', 'total_pengeluaran_sales'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
