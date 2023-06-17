<?php

namespace App\Controllers;

use App\Models\LaboursModel;
use App\Models\LoginModel;
use App\Models\MelamarModel;

class LaboursController extends BaseController
{
    protected $modelPekerjaan, $modelPengguna, $modelMelamar;

    public function __construct()
    {
        $this->modelPekerjaan = new LaboursModel();
        $this->modelPengguna = new LoginModel();
        $this->modelMelamar = new MelamarModel();
    }

    public function home()
    {
        if (session()->has('username')) {

            $data =
                [
                    'title' => 'Home | Labours',
                    'pekerjaan' => $this->modelPekerjaan->dataPekerjaan()
                ];
            if (session()->getFlashdata('deskripsi')) {
                $data['deskripsi'] = session()->getFlashdata('deskripsi');
            }
            return view('home', $data);
        }

        return redirect()->to(base_url('/login'));
    }

    public function deskripsi($kode)
    {
        $pekerjaan = $this->modelPekerjaan->getPekerjaan($kode);
        session()->setFlashdata('deskripsi', $pekerjaan);
        return redirect()->to(base_url('home'));
    }

    public function signup()
    {
        helper('form');
        if (!$this->request->is('post')) {
            return view('signup');
        }

        $this->modelPengguna->insert([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'statusVerifikasi' => 'belum'
        ]);

        return view('signupsuccess');
    }

    public function signUpSuccess()
    {
        return view('signupsuccess');
    }

    public function login()
    {
        if (!$this->request->is('post')) {
            return view('login');
        }

        $data = $this->request->getPost(['email', 'password']);
        $cek = $this->modelPengguna->cekLogin($data);

        if ($cek > 0) {
            session()->set('username', $cek['nama']);
            session()->set('nik', $cek['nik']);
            return redirect()->to(base_url('/home'));
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function lamar($kodePekerjaan)
    {
        $data = $this->modelPekerjaan->getPekerjaan($kodePekerjaan);
        return view('lamar-pekerjaan', $data);
    }

    public function prosesLamar($kode)
    {
        $data =
            [
                'nik' => session()->get('nik'),
                'kodePekerjaan' => $kode,
                'telepon' => $this->request->getPost('telepon'),
                'status' => 'kirim',
                'penilaian' => '-'
            ];
        $this->modelMelamar->tambahMelamar($data);
    }

    public function postinganSaya()
    {
        $nik = session()->get('nik');
        $data = [
            'title' => 'Post | Labours',
            'dataMelamar' => $this->modelMelamar
                ->select(['melamar.*',' pekerjaan.jenisPekerjaan', 'pekerjaan.deskripsiPekerjaan', 'pekerjaan.waktuPekerjaan', 'pekerjaan.sampul'])
                ->join('pekerjaan', 'pekerjaan.kodePekerjaan = melamar.kodePekerjaan')
                ->where(['nik' => $nik])
                ->findAll(),
        ];
        // dd($data);
        return view('postinganSaya', $data);
    }

    public function penilaian()
    {
        return view('penilaian');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
