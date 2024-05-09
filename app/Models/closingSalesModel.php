<?php

namespace App\Models;

use CodeIgniter\Model;

class closingSalesModel extends Model
{
    protected $table = 'closing_sales';
    protected $primaryKey = 'id_cs';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_nota',  'id_sales', 'id_branch', 'week', 'kredit', 'cash'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}