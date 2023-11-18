<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPesertaQurban;
use App\Models\ModelTahun;
use App\Models\ModelAdmin;

class PesertaQurban extends BaseController
{


    public function __construct()
    {
        $this->ModelPesertaQurban = new ModelPesertaQurban();
        $this->ModelTahun = new ModelTahun();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Peserta Qurban',
            'menu' => 'qurban',
            'submenu' => 'peserta-qurban',
            'page' => 'qurban/v_tahun_qurban',
            'tahun' => $this->ModelTahun->AllData(),
        ];
        return view('v_template_admin', $data);
    }


    public function DeleteKelompok($id_tahun, $id_kelompok)
    {
        $data = [
            'id_kelompok' => $id_kelompok,
        ];
        $this->ModelPesertaQurban->DeleteKelompok($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di delete !!!');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }
    public function InsertKelompok()
    {
        $id_tahun = $this->request->getPost('id_tahun');
        $data = [
            'id_tahun' => $id_tahun,
            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
        ];
        $this->ModelPesertaQurban->InsertKelompok($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }
    public function InsertPeserta()
    {
        $id_tahun = $this->request->getPost('id_tahun');
        $id_kelompok = $this->request->getPost('id_kelompok');
        $data = [
            'id_kelompok' => $id_kelompok,
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'alamat' => $this->request->getPost('alamat'), // Added alamat field
            'no_hp' => $this->request->getPost('no_hp'),
            'biaya' => $this->request->getPost('biaya'),
        ];
        $this->ModelPesertaQurban->InsertPeserta($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }

    public function DeletePeserta($id_tahun, $id_peserta)
    {
        $data = [
            'id_peserta' => $id_peserta,
        ];
        $this->ModelPesertaQurban->DeletePeserta($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di delete !!!');
        return redirect()->to(base_url('PesertaQurban/KelompokQurban/' . $id_tahun));
    }

    public function ViewLaporan()
    {
        $tahun_m = $this->input->post('tahun_m');
        $tahun_h = $this->input->post('tahun_h');

        // Lakukan pemrosesan data laporan sesuai dengan kebutuhan Anda
        // Contoh: Ambil data peserta dari model

        $peserta = $this->peserta_model->getPesertaByTahun($tahun_m, $tahun_h);

        // Buat tabel laporan dengan menggunakan HTML
        $html = '<table class="table table-bordered">';
        $html .= '<thead><tr><th>No</th><th>Nama Peserta</th><th>Biaya</th><th></th></tr></thead>';
        $html .= '<tbody>';
        $no = 1;
        $totalBiaya = 0;
        foreach ($peserta as $pesertaRow) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . $pesertaRow['nama_peserta'] . '</td>';
            $html .= '<td>Rp. ' . number_format($pesertaRow['biaya'], 0) . '</td>';
            $html .= '<td><a href="' . base_url('PesertaQurban/DeletePeserta/' . $value['id_tahun'] . '/' . $pesertaRow['id_peserta']) . '" onclick="return confirm(\'Hapus Peserta?\')"><i class="fas fa-times text-danger"></i></a></td>';
            $html .= '</tr>';

            $totalBiaya += $pesertaRow['biaya'];
        }
        $html .= '</tbody>';
        $html .= '<tfoot><tr class="text-primary"><td colspan="2" class="text-right"><b>Total Biaya:</b></td><td>Rp. ' . number_format($totalBiaya, 0) . '</td><td></td></tr></tfoot>';
        $html .= '</table>';

        // Siapkan respons JSON untuk dikirim kembali ke frontend
        $response = array(
            'status' => 'success',
            'data' => $html,
            'total_biaya' => 'Rp. ' . number_format($totalBiaya, 0)
        );

        // Mengatur tipe konten respons sebagai JSON
        header('Content-Type: application/json');

        // Mengeluarkan respons dalam format JSON
        echo json_encode($response);
    }

    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Peserta Qurban',
            'menu' => 'laporan-kas',
            'submenu' => 'laporan-kas-masjid',
            'page' => 'qurban/v_laporan_pesertaqurban',
            'masjid' => $this->ModelAdmin->ViewSetting(),
            'tahun' => $this->ModelTahun->Selecttahun(),

        ];
        return view('v_template_admin', $data);
    }

    public function KelompokQurban($id_tahun)
    {
        $tahun = $this->ModelTahun->DetailData($id_tahun);
        $data = [
            'judul' => 'Peserta Qurban Tahun ' . $tahun['tahun_h'] . ' H / ' . $tahun['tahun_m'] . ' M ',
            'menu' => 'qurban',
            'submenu' => 'peserta-qurban',
            'page' => 'qurban/v_kelompok_qurban',
            'tahun' => $tahun,
            'kelompok' => $this->ModelPesertaQurban->AllDataKelompok($id_tahun),
        ];
        return view('v_template_admin', $data);
    }
    public function ViewLaporanQurban()
    {
        $id_tahun = $this->request->getPost('tahuncetak');
        $tahun = $this->ModelTahun->DetailData($id_tahun);
        $data = [
            'judul' => 'Laporan Peserta Qurban Tahun ' . $tahun['tahun_h'] . ' H / ' . $tahun['tahun_m'] . ' M ',
            'menu' => 'qurban',
            'submenu' => 'peserta-qurban',
            'page' => 'viewlaporan/laporan_qurban',
            'tahun' => $tahun,
            'kelompok' => $this->ModelPesertaQurban->AllDataKelompok($id_tahun),
        ];
        return view('v_template_admin', $data);
    }
}
