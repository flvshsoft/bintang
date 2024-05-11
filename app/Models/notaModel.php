<?php

namespace App\Models;

use CodeIgniter\Model;

class notaModel extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'id_nota';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_sales', 'id_branch', 'no_nota', 'id_partner', 'id_customer', 'total_beli', 'id_area', 'weeks', 'payment_method', 'created_by', 'pay', 'id_bank', 'tgl_bayar', 'status', 'status_closing'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $deletedField  = 'deleted_at';

    public function getLastIdNota()
    {
        // Ambil ID Nota terakhir dari database
        $lastIdNota = $this->db->table('nota')
            ->selectMax('id_nota')
            ->get()
            ->getRow();

        return $lastIdNota->id_nota ?? 0; // Mengembalikan ID Nota terakhir, atau 0 jika tidak ada
    }
}
