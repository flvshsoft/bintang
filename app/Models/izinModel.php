<?php

namespace App\Models;

use CodeIgniter\Model;

class izinModel extends Model
{
    protected $table = 'izin';
    protected $primaryKey = 'id_izin';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['remark_izin',  'created_by'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}