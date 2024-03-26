<?php

namespace App\Models;

use CodeIgniter\Model;

class bankModel extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'id_bank';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $skipValidation = false;
    protected $allowedFields = ['payment_code',  'nama_bank', 'created_by', 'saldo', 'id_branch'];


    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert = ['setDefaultValues'];
    protected function setDefaultValues(array $data)
    {
        // Atur nilai 'payment_code' ke NULL jika tidak ada
        if (!isset($data['payment_code'])) {
            $data['payment_code'] = null;
        }
        return $data;
    }
}
