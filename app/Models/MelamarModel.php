<?php

namespace App\Models;

use CodeIgniter\Model;

class MelamarModel extends Model
{
    protected $table = "melamar";
    protected $allowedFields = ['nik', 'kodePekerjaan', 'status', 'penilaian', 'created_at', 'updated_at', 'telepon'];
    protected $primaryKey = 'kodePekerjaan';
    protected $useTimestamps = true;

    public function dataMelamar()
    {
        return $this->findAll();
    }

    public function tambahMelamar($data)
    {
        $this->insert([
            'nik' => $data['nik'],
            'kodePekerjaan' => $data['kodePekerjaan'],
            'status' => $data['status'],
            'penilaian' => $data['penilaian'],
            'telepon' => $data['telepon']
        ]);
    }

}