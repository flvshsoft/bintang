<?php

namespace App\Models;

use CodeIgniter\Model;

class notadetailModel extends Model
{
    protected $table = 'nota_detail';
    protected $primaryKey = 'id_nota_detail';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['id_nota', 'id_branch', 'id_sales_detail', 'id_product', 'id_jenis_harga', 'diskon_penjualan', 'satuan_penjualan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';

    public function getLastIdNotaDetail()
    {
        $lastIdNotaDetail = $this->db->table('nota_detail')
            ->selectMax('id_nota_detail')
            ->get()
            ->getRow();
        return $lastIdNotaDetail->id_nota_detail ?? 0;
    }
}
