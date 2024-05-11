<?php

namespace App\Models;

use CodeIgniter\Model;

class notaPutihSaveSalesmanModel extends Model
{
    protected $table = 'nota_putih_salesman_save';
    protected $primaryKey = 'id_save_nota_putih_salesman';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_branch',  'id_nota', 'id_user', 'id_partner', 'minggu_nota_putih', 'total_beli'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';
}
