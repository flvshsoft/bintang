<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $usSoftDeletes = true;

    protected $allowedFields = ['username', 'id_branch', 'nama_user', 'password', 'level_user', 'status_user', 'tanggal_akses', 'gambar'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedFiled = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat    = 'datetime';

    protected $validationRules = [];

    protected $dynamicRules = [
        'insertData' => [
            'username' => 'required|alpha_space|is_unique[user.username, id_user, {id_user}]',
            'nama_user' => 'required|alpha_space',
            'password' => 'required|min_length[8]',

        ],
    ];
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Username sudah digunakan'
        ],
    ];
    protected $skipValidation = false;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    public function getRule(string $rule)
    {
        return $this->dynamicRules[$rule];
    }

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) return $data;

        $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password']);

        return $data;
    }
    //--------------------------------------------------------------------

}
