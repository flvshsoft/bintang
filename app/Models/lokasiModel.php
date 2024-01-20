<?php

namespace App\Models;

use CodeIgniter\Model;

class lokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['maps',  'nama_lokasi', 'created_by'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
