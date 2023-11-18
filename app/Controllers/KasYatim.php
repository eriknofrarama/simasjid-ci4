<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasYatim;
use App\Models\ModelAdmin;

class KasYatim extends BaseController
{

    public function __construct()
    {
        $this->ModelKasYatim = new ModelKasYatim();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Rekapitulasi Kas Yatim',
            'subjudul' => '',
            'menu' => 'kas-yatim',
            'submenu' => 'rekap-kas-yatim',
            'page' => 'kas-yatim/v_rekap_kas_yatim',
            'kas' => $this->ModelKasYatim->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function KasMasuk()
    {
        $data = [
            'judul' => 'Kas Yatim Masuk',
            'subjudul' => '',
            'menu' => 'kas-yatim',
            'submenu' => 'kas-yatim-masuk',
            'page' => 'kas-yatim/v_kas_yatim_masuk',
            'kas' => $this->ModelKasYatim->AllDataKasMasuk(),
        ];
        return view('v_template_admin', $data);
    }
    public function KasKeluar()
    {
        $data = [
            'judul' => 'Kas Yatim Keluar',
            'subjudul' => '',
            'menu' => 'Kas-yatim',
            'submenu' => 'kas-keluar',
            'page' => 'Kas-yatim/v_kas_yatim_keluar',
            'kas' => $this->ModelKasYatim->AllDataKasKeluar(),
        ];
        return view('v_template_admin', $data);
    }
    public function InsertKasMasuk()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'status' => 'Masuk',
        ];
        $this->ModelKasYatim->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('KasYatim/KasMasuk'));
    }
    // public function InsertKasKeluar()
    // {
    //     $data = [
    //         'tanggal' => $this->request->getPost('tanggal'),
    //         'ket' => $this->request->getPost('ket'),
    //         'kas_keluar' => $this->request->getPost('kas_keluar'),
    //         'kas_masuk' => 0,
    //         'status' => 'Keluar',
    //     ];
    //     $this->ModelKasYatim->InsertData($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
    //     return redirect()->to(base_url('KasYatim/KasKeluar'));
    // }

    public function InsertKasKeluar()
    {
        // Ambil saldo saat ini dari model (asumsikan Anda memiliki metode untuk ini)
        $saldoSaatIni = $this->ModelKasYatim->getCurrentBalance();

        // Dapatkan jumlah pengeluaran dari formulir
        $pengeluaran = $this->request->getPost('kas_keluar');

        // Hitung saldo baru setelah mengurangkan pengeluaran
        $saldoBaru = $saldoSaatIni - $pengeluaran;

        // Periksa apakah saldo baru lebih besar dari atau sama dengan nol
        if ($saldoBaru >= 0) {
            // Data valid, lanjutkan dengan memasukkan data pengeluaran
            $data = [
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('ket'),
                'kas_keluar' => $pengeluaran,
                'kas_masuk' => 0,
                'status' => 'Keluar',
            ];
            $this->ModelKasYatim->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        } else {
            // Tampilkan pesan kesalahan jika pengeluaran melebihi saldo yang tersedia
            session()->setFlashdata('pesan', 'Saldo tidak mencukupi untuk pengeluaran ini.');
        }

        return redirect()->to(base_url('KasYatim/KasKeluar'));
    }


    public function UpdateKasMasuk($id_kas_yatim)
    {
        $data = [
            'id_kas_yatim' => $id_kas_yatim,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
        ];
        $this->ModelKasYatim->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
        return redirect()->to(base_url('KasYatim/KasMasuk'));
    }
    public function UpdateKasKeluar($id_kas_yatim)
    {
        $data = [
            'id_kas_yatim' => $id_kas_yatim,
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('kas_keluar'),
        ];
        $this->ModelKasYatim->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!!');
        return redirect()->to(base_url('KasYatim/KasKeluar'));
    }
    public function DeleteKasMasuk($id_kas_yatim)
    {
        $data = [
            'id_kas_yatim' => $id_kas_yatim,
        ];
        $this->ModelKasYatim->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('KasYatim/KasMasuk'));
    }
    public function DeleteKasKeluar($id_kas_yatim)
    {
        $data = [
            'id_kas_yatim' => $id_kas_yatim,
        ];
        $this->ModelKasYatim->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('KasYatim/KasKeluar'));
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Kas Yatim',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-yatim',
            'page' => 'kas-yatim/v_laporan_kas_yatim',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'kas' => $this->ModelKasYatim->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kasMasuk' => $this->ModelKasYatim->getKasMasuk(),
            'kasKeluar' => $this->ModelKasYatim->getKasKeluar()
        ];

        $response = [
            'data' => view('kas-yatim/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
