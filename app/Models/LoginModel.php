<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = "pengguna";
    protected $allowedFields = ['nik', 'nama', 'umur', 'email', 'password', 'statusVerifikasi'];
    protected $primaryKey = 'nik';

    public function cekLogin($data)
    {
        return $this->where(['email' => $data['email'], 'password' => $data['password']])->first();
    }

}