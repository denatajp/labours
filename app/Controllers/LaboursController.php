<?php

namespace App\Controllers;

use App\Models\LaboursModel;
use App\Models\LoginModel;
use App\Models\MelamarModel;
use App\Models\MenawarkanModel;
use App\Models\AdminModel;

class LaboursController extends BaseController
{
    protected $modelPekerjaan, $modelPengguna, $modelMelamar, $modelMenawarkan, $modelAdmin;

    public function __construct()
    {
        $this->modelPekerjaan = new LaboursModel();
        $this->modelPengguna = new LoginModel();
        $this->modelMelamar = new MelamarModel();
        $this->modelMenawarkan = new MenawarkanModel();
        $this->modelAdmin = new AdminModel();
    }

    public function index()
    {
        return view('index');
    }

    public function home()
    {
        if (session()->has('username')) {

            $nik = session()->get('user');

            if ($nik['statusVerifikasi'] == 'belum verifikasi') {
                return view('loginpending');
            }
            if ($nik['statusVerifikasi'] == 'Ditolak') {
                return view('loginfail');
            }

            $data =
                [
                    'title' => 'Home | Labours',
                    'pekerjaan' => $this->modelPekerjaan
                        ->select(['pekerjaan.*', 'menawarkan.statusPosting'])
                        ->join('menawarkan', 'menawarkan.kodePekerjaan = pekerjaan.kodePekerjaan')
                        ->where(['menawarkan.statusPosting' => 'Belum ada pekerja'])
                        ->findAll(),
                ];
            if (session()->getFlashdata('deskripsi')) {
                $data['deskripsi'] = session()->getFlashdata('deskripsi');
            }
            // dd($data);
            return view('home', $data);
        }

        return redirect()->to(base_url('/login'));
    }

    public function search() 
    {
        $keyword = $this->request->getGet('keyword');

        $data =
                [
                    'title' => 'Home | Labours',
                    'pekerjaan' => $this->modelPekerjaan
                        ->select(['pekerjaan.*', 'menawarkan.statusPosting'])
                        ->join('menawarkan', 'menawarkan.kodePekerjaan = pekerjaan.kodePekerjaan')
                        ->where(['menawarkan.statusPosting' => 'Belum ada pekerja'])
                        ->where(['pekerjaan.namaPekerjaan' => $keyword])
                        ->findAll(),
                ];
        return view('home', $data);
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

        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'is_image' => 'Yang anda masukkan bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/signup')->withInput();
        }
        $imgUser = $this->request->getFile('foto');
        $imgUser->move('userImg');

        $fotoUser = $imgUser->getName();
        $this->modelPengguna->insert([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'umur' => $this->request->getVar('umur'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'statusVerifikasi' => 'belum verifikasi',
            'nomor_telepon' => $this->request->getVar('telepon'),
            'foto' => $fotoUser
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
        $cekAdmin = $this->modelAdmin->cekLogin($data);

        if ($cekAdmin > 0) {
            session()->set('admin', $cekAdmin);
            return redirect()->to(base_url('/admin'));
        }

        if ($cek > 0) {
            session()->set('username', $cek['nama']);
            session()->set('nik', $cek['nik']);
            session()->set('user', $cek);
            return redirect()->to(base_url('/home'));
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function simpan()
    {
        if (session()->has('username')) {
            helper('form');
            if (!$this->request->is('post')) {
                return view('tambahpekerjaan');
            }
            if (!$this->validate([
                'foto' => [
                    'rules' => 'uploaded[foto]|is_image[foto]',
                    'errors' => [
                        'uploaded' => 'Pilih gambar terlebih dahulu',
                        'is_image' => 'Yang anda masukkan bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to('/tambahPekerjaan')->withInput();
            }
            $imgJob = $this->request->getFile('foto');
            $imgJob->move('imgJob');

            $namaJob = $imgJob->getName();
            $this->modelPekerjaan->insert([
                'namaPekerjaan' => $this->request->getVar('nama'),
                'waktuPekerjaan' => $this->request->getVar('waktu'),
                'alamat' => $this->request->getVar('alamat'),
                'deskripsiPekerjaan' => $this->request->getVar('deskripsi'),
                'foto' => $namaJob
            ]);

            $kode = $this->modelPekerjaan->getInsertID();

            /* Tambah ke tabel menawarkan juga */
            $this->modelMenawarkan->insert([
                'NIK' => session()->get('nik'),
                'kodePekerjaan' => $kode,
                'statusPosting' => 'Belum ada pekerja'
            ]);

            return view('/suksesAddKerja');
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function lamar($kodePekerjaan)
    {
        if (session()->has('username')) {
            $data =
                [
                    'pekerjaan' => $this->modelPekerjaan->getPekerjaan($kodePekerjaan),
                    'email' => $this->modelPengguna->where(['nik' => session()->get('nik')])->first(),
                ];
            return view('lamar-pekerjaan', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function prosesLamar($kode)
    {
        $data =
            [
                'nik' => session()->get('nik'),
                'kodePekerjaan' => $kode,
                'telepon' => $this->request->getVar('telepon'),
                'status' => 'kirim',
                'penilaian' => '-',
                'pengalaman' => $this->request->getVar('pengalaman')
            ];
        $this->modelMelamar->tambahMelamar($data);
        return redirect()->to(base_url('/home'));
    }

    public function postinganSaya()
    {
        if (session()->has('username')) {
            $nik = session()->get('nik');
            $data = [
                'title' => 'Post | Labours',
                'dataMelamar' => $this->modelMelamar
                    ->select(['melamar.*', 'pekerjaan.*', 'menawarkan.*', 'pengguna.*', 'pekerjaan.foto AS fotoPekerjaan'])
                    ->join('pekerjaan', 'pekerjaan.kodePekerjaan = melamar.kodePekerjaan')
                    ->join('menawarkan', 'menawarkan.kodePekerjaan = melamar.kodePekerjaan')
                    ->join('pengguna', 'menawarkan.NIK = pengguna.nik')
                    ->where(['melamar.nik' => $nik])
                    ->findAll(),

                'dataPostingan' => $this->modelMenawarkan
                    ->select(['menawarkan.*', 'pekerjaan.*'])
                    ->join('pekerjaan', 'pekerjaan.kodePekerjaan = menawarkan.kodePekerjaan')
                    // ->join('melamar', 'melamar.kodePekerjaan = menawarkan.kodePekerjaan')
                    ->where(['menawarkan.NIK' => $nik])
                    ->findAll(),

                'pelamarDiterima' => $this->modelMenawarkan
                    ->select(['menawarkan.*', 'pekerjaan.*', 'melamar.penilaian AS nilai', 'melamar.nik AS nikPelamar', 'pengguna.*'])
                    ->join('pekerjaan', 'pekerjaan.kodePekerjaan = menawarkan.kodePekerjaan')
                    ->join('melamar', 'melamar.kodePekerjaan = pekerjaan.kodePekerjaan')
                    ->join('pengguna', 'pengguna.nik = melamar.nik')
                    ->where(['menawarkan.NIK' => $nik, 'melamar.status' => 'Diterima'])
                    ->findAll(),

                'pelamarSelesai' => $this->modelMenawarkan
                    ->select(['menawarkan.*', 'pekerjaan.*', 'melamar.penilaian AS nilai', 'melamar.nik AS nikPelamar', 'pengguna.*'])
                    ->join('pekerjaan', 'pekerjaan.kodePekerjaan = menawarkan.kodePekerjaan')
                    ->join('melamar', 'melamar.kodePekerjaan = pekerjaan.kodePekerjaan')
                    ->join('pengguna', 'pengguna.nik = melamar.nik')
                    ->where(['menawarkan.NIK' => $nik, 'melamar.status' => 'Selesai'])
                    ->findAll()
                // 'dataPostingan' => $this->modelMenawarkan
                //     ->select(['menawarkan.*', 'pekerjaan.*', 'melamar.nik AS nikPelamar', 'pengguna.nama AS namaPelamar'])
                //     ->join('pekerjaan', 'pekerjaan.kodePekerjaan = menawarkan.kodePekerjaan')
                //     ->join('melamar', 'melamar.kodePekerjaan = pekerjaan.kodePekerjaan')
                //     ->join('pengguna', 'pengguna.nik = melamar.nik')
                //     ->where(['menawarkan.NIK' => $nik, 'melamar.status' => 'Diterima'])
                //     ->findAll()
            ];
            // dd($data);
            return view('postinganSaya', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function penilaian($kodePekerjaan)
    {
        if (session()->has('username')) {
            $data =
                [
                    'dataPenilaian' => $this->modelMelamar
                        ->select(['melamar.*', 'pengguna.nama', 'pekerjaan.foto', 'pekerjaan.kodePekerjaan', 'pekerjaan.namaPekerjaan', 'pengguna.nama AS namaPelamar'])
                        ->join('pengguna', 'pengguna.nik = melamar.nik')
                        ->join('pekerjaan', 'pekerjaan.kodePekerjaan = melamar.kodePekerjaan')
                        ->where(['melamar.kodePekerjaan' => $kodePekerjaan, 'melamar.status' => 'Diterima'])
                        ->first()
                ];
            // dd($data);
            return view('penilaian', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function prosesNilai($kodePekerjaan)
    {
        $nilai = $this->request->getVar('nilai');
        $this->modelMelamar->set('status', 'Selesai');
        $this->modelMelamar->set('penilaian', $nilai);
        $this->modelMelamar->where(['kodePekerjaan' => $kodePekerjaan, 'status' => 'Diterima']);
        $this->modelMelamar->update();

        $this->modelMenawarkan->set('statusPosting', 'Selesai');
        $this->modelMenawarkan->where('kodePekerjaan', $kodePekerjaan);
        $this->modelMenawarkan->update();

        return redirect()->to(base_url('home'));
    }

    public function listPelamar($kodePekerjaan)
    {
        if (session()->has('username')) {

            /*              Mencegah user yang bukan pemosting pekerjaan melihat data pelamar               */
            $akses = $this->modelMenawarkan->where(['kodePekerjaan' => $kodePekerjaan])->first();
            if (session()->get('nik') != $akses['NIK']) {
                return redirect()->to(base_url('/home'));
            }
            /* -------------------------------------------------------------------------------------------- */

            $data =
                [
                    'title' => 'List Pelamar | Labours',
                    'dataPelamar' => $this->modelMelamar
                        ->select(['melamar.*', 'menawarkan.*', 'pengguna.*', 'melamar.pengalaman AS pengalaman'])
                        ->join('menawarkan', 'menawarkan.kodePekerjaan = melamar.kodePekerjaan')
                        ->join('pengguna', 'pengguna.nik = melamar.nik')
                        ->where(['melamar.kodePekerjaan' => $kodePekerjaan, 'status' => 'kirim'])
                        ->findAll()
                ];


            return view('listPelamar', $data);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function prosesPelamar($kodePekerjaan)
    {
        if ($_POST['submit'] == 'terima') {
            $this->modelMelamar->set('status', 'Diterima');
            $this->modelMelamar->where(['kodePekerjaan' => $kodePekerjaan, 'nik' => $_POST['nik']]);
            $this->modelMelamar->update();

            $this->modelMenawarkan->set('statusPosting', 'Sudah ada pekerja');
            $this->modelMenawarkan->where(['kodePekerjaan' => $kodePekerjaan]);
            $this->modelMenawarkan->update();
        } else if ($_POST['submit'] == 'tolak') {
            $this->modelMelamar->set('status', 'Ditolak');
            $this->modelMelamar->where(['kodePekerjaan' => $kodePekerjaan, 'nik' => $_POST['nik']]);
            $this->modelMelamar->update();
        }
        return redirect()->to(base_url('/listpelamar/' . $kodePekerjaan));
    }

    public function hapus($kodePekerjaan)
    {
        $pekerjaan = $this->modelPekerjaan->getPekerjaan($kodePekerjaan);
        unlink('imgJob/' . $pekerjaan['foto']);
        $this->modelPekerjaan->delete($kodePekerjaan);
        return redirect()->to(base_url('/home'));
    }

    public function edit($kodePekerjaan)
    {
        if (!$this->request->is('post')) {
            $data =
                [
                    'title' => 'Edit Pekerjaan | Labours',
                    'pekerjaan' => $this->modelPekerjaan->getPekerjaan($kodePekerjaan)
                ];
            return view('editPekerjaan', $data);
        }

        $this->modelPekerjaan->save([
            'kodePekerjaan' => $kodePekerjaan,
            'namaPekerjaan' => $this->request->getVar('nama'),
            'waktuPekerjaan' => $this->request->getVar('waktu'),
            'alamat' => $this->request->getVar('alamat'),
            'deskripsiPekerjaan' => $this->request->getVar('deskripsi'),
        ]);
        return redirect()->to(base_url('/home'));
    }

    public function profil()
    {
        $data =
            [
                'user' => $this->modelPengguna->getUser(session()->get('nik'))
            ];
        // dd($data);
        return view('profil', $data);
    }

    public function admin()
    {
        if (session()->has('admin')) {
            return view('admin');
        } else {
            redirect()->to(base_url('login'));
        }
    }

    public function verifikasi()
    {
        if (session()->has('admin')) {
            $userModel = new LoginModel();
            $user = $userModel->select(['nama', 'umur', 'email', 'nomor_telepon', 'foto'])
                ->where(['statusVerifikasi' => 'belum verifikasi'])->findall();
            $data = [
                'title' => 'Sign Up',
                'user' => $user
            ];
            return view('verifikasi', $data);
        } else if (session()->has('username')) {
            return redirect()->to(base_url('home'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function verif()
    {
        if (session()->has('admin')) {
            $userModel = new LoginModel();
            $userModel->set('statusVerifikasi', 'Terverifikasi');
            $userModel->where('nama', $_POST['btnVerif']);
            $userModel->update();
            return redirect()->to(base_url('verifikasi'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function tolak()
    {
        if (session()->has('admin')) {
            $userModel = new LoginModel();
            $userModel->set('statusVerifikasi', 'Ditolak');
            $userModel->where('nama', $_POST['btnTolak']);
            $userModel->update();
            return redirect()->to(base_url('verifikasi'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
