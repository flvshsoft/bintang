<?php

namespace App\Models;

use CodeIgniter\Model;

class jenishargaModel extends Model
{
    protected $table = 'jenis_harga';
    protected $primaryKey = 'id_jenis_harga';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['remark_jenis_harga',  'created_by', 'id_branch'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}