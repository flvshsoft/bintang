<?php

namespace App\Models;

use CodeIgniter\Model;

class closingMutasiHOModel extends Model
{
    protected $table = 'closing_mutasi_ho';
    protected $primaryKey = 'id_closing_mutasi_ho';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_mutasi_ho', 'keterangan', 'id_user', 'type_mutasi', 'value', 'id_bank', 'id_tujuan', 'saldo'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
