<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSalesmanProductModel extends Model
{
    protected $table = 'closing_salesman_product';
    protected $primaryKey = 'id_closing_salesman_product';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_salesman_product', 'id_product', 'satuan_product', 'jumlah_kredit', 'total_kredit', 'jumlah_cash', 'total_cash', 'total_cash_kredit', 'id_user'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
