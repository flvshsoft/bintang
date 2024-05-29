<?php

namespace App\Models;

use CodeIgniter\Model;

class closingNeracaModel extends Model
{
    protected $table = 'closing_neraca';
    protected $primaryKey = 'id_closing_neraca';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'week_neraca', '', 'id_user', 'id_bank', 'saldo', '', ''];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
