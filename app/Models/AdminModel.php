<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $allowedFields = ['username', 'password'];
    protected $primaryKey = 'username';

    public function cekLogin($data)
    {
        return $this->where(['username' => $data['email'], 'password' => $data['password']])->first();
    }


}