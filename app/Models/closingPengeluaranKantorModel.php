<?php

namespace App\Models;

use CodeIgniter\Model;

class closingPengeluaranKantorModel extends Model
{
    protected $table = 'closing_pengeluaran_kantor';
    protected $primaryKey = 'id_closing_pengeluaran_kantor';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_pengeluaran_kantor', 'remark', 'id_user', 'total_pengeluaran_kantor'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
