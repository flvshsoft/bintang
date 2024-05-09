<?php

namespace App\Models;

use CodeIgniter\Model;

class cutiModel extends Model
{
    protected $table = 'cuti';
    protected $primaryKey = 'id_cuti';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['remark_cuti',  'created_by', 'id_branch'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}