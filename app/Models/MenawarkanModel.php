<?php

namespace App\Models;

use CodeIgniter\Model;

class MenawarkanModel extends Model
{
    protected $table = "menawarkan";
    protected $allowedFields = ['NIK', 'kodePekerjaan', 'created_at', 'updated_at', 'statusPosting'];
    protected $primaryKey = 'kodePekerjaan';
    protected $useTimestamps = true;

    public function dataPekerjaan()
    {
        return $this->findAll();
    }

    public function getPekerjaan($kode)
    {
        return $this->where(['kodePekerjaan' => $kode])->first();
    }

}