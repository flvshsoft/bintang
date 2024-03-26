<?php

namespace App\Models;

use CodeIgniter\Model;

class customerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['nama_customer',  'no_hp_customer', 'alamat_customer', 'id_branch'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
