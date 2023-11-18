<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\ModelKasMasjid;
use App\Models\ModelKasyatim;
use App\Models\ModelRekening;
use DateTime;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasyatim = new ModelKasyatim();
        $this->ModelRekening = new ModelRekening();
    }
    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();
        $url = 'https://api.myquran.com/v1/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $waktu = json_decode(file_get_contents($url), true);

        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'waktu' => $waktu,
            'kas_m' => $this->ModelKasMasjid->AllData(),
            'kas_s' => $this->ModelKasyatim->AllData(),
        ];
        return view('v_template', $data);
    }
    public function Agenda()
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_Agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];
        return view('v_template', $data);
    }
    public function PesertaQurban()
    {
        $setting = $this->ModelAdmin->ViewSetting();
        $tahunaktif = $setting['tahunaktif'];
        $data = [
            'judul' => 'Peserta Qurban Tahun ' . date($tahunaktif),
            'page' => 'front-end/v_peserta_qurban',
            'kelompok' => $this->ModelHome->AllDataKelompokAktif($tahunaktif),
        ];
        return view('v_template', $data);
    }
    // public function AllDataKelompokTahunDepan()
    // {
    //     return $this->db->table('tbl_kelompok')
    //         ->join('tabel_tahun', 'tabel_tahun.id_tahun = tbl_kelompok.id_tahun', 'left')
    //         ->where('tabel_tahun.tahun_m', date('Y') + 1)
    //         ->get()->getResultArray();
    // }
    // public function PesertaQurbanTahunDepan()
    // {
    //     $data = [
    //         'judul' => 'Peserta Qurban Tahun ' . (date('2024') - 579) . ' H / ' . date('2024') . ' M',
    //         'page' => 'front-end/v_peserta_qurban_tahun_depan',
    //         'kelompok' => $this->ModelHome->AllDataKelompokTahunDepan(),
    //     ];
    //     return view('v_template', $data);
    // }


    public function RekapKasMasjid()
    {
        $data = [
            'judul' => 'Rekap Kas Masjid',
            'page' => 'front-end/v_rekap_kas',
            'kas' => $this->ModelHome->AllDataKasMasjid(),
        ];
        return view('v_template', $data);
    }
    public function RekapKasyatim()
    {
        $data = [
            'judul' => 'Rekap Kas yatim',
            'page' => 'front-end/v_rekap_kas',
            'kas' => $this->ModelHome->AllDataKasyatim(),
        ];
        return view('v_template', $data);
    }
    public function RekapMasjid()
    {
        $data = [
            'judul' => 'Rekap Kas Masjid',
            'page' => 'front-end/v_rekap_kas',
            'kas' => $this->ModelHome->AllDataKelompok(),
        ];
        return view('v_template', $data);
    }

    public function Donasi()
    {
        $data = [
            'judul' => 'Donasi',
            'page' => 'front-end/v_donasi',
            'rek' => $this->ModelRekening->AllData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('v_template', $data);
    }

    public function KirimDonasi()
    {
        if ($this->validate([
            'bukti' => [
                'label' => 'Bukti Transfer',
                'rules'  => 'uploaded[bukti]|max_size[bukti,1500]|mime_in[bukti,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Belum Di Pilih',
                    'max_size' => '{field} Max 1500 KB',
                    'mime_in' => ' Format {field} Wajib JPG, PNG JPEG',

                ]
            ],
        ])) {
            $bukti = $this->request->getFile('bukti');
            $nama_file = $bukti->getRandomName();
            $data = [
                'id_rekening' => $this->request->getpost('id_rekening'),
                'nama_bank' => $this->request->getpost('nama_bank'),
                'no_rek' => $this->request->getpost('no_rek'),
                'nama_pengirim' => $this->request->getpost('nama_pengirim'),
                'jumlah' => $this->request->getpost('jumlah'),
                'jenis_donasi' => $this->request->getpost('jenis_donasi'),
                'bukti' => $nama_file,
                'tgl' => date('Y-m-d')
            ];
            $bukti->move('bukti', $nama_file);
            $this->ModelHome->InsertDonasi($data);
            session()->setFlashdata('pesan', 'Terima Kasih ! Bukti Transaksi Sudah Dikirim !!!');
            return redirect()->to(base_url('Home/Donasi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Donasi'))->withInput('validation ', \Config\Services::validation());
        }
    }
}
