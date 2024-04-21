<?php

namespace App\Models;

use CodeIgniter\Model;

class areaModel extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_nama_area',  'nama_area', 'id_branch'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
