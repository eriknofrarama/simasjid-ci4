<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ModelAgenda;
use App\Models\ModelAdmin;

class Agenda extends BaseController
{

    public function __construct()
    {
        $this->ModelAgenda = new ModelAgenda();
        $this->ModelAdmin = new ModelAdmin();
    }


    public function index()
    {
        $data = [
            'judul' => 'Agenda',
            'menu' => 'agenda',
            'submenu' => '',
            'page' => 'v_agenda',
            'agenda' => $this->ModelAgenda->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function InsertData()
    {
        $data = [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
        ];
        $this->ModelAgenda->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('Agenda'));
    }

    public function UpdateData($id_agenda)
    {
        $data = [
            'id_agenda' => $id_agenda,
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
        ];
        $this->ModelAgenda->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!!');
        return redirect()->to(base_url('Agenda'));
    }
    public function DeleteData($id_agenda)
    {
        $data = [
            'id_agenda' => $id_agenda,
        ];
        $this->ModelAgenda->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus !!!');
        return redirect()->to(base_url('Agenda'));
    }
    public function Laporan()
    {
        $data = [
            'judul' => 'Laporan Agenda Kegiatan',
            'menu' => 'laporan-agenda',
            'submenu' => 'laporan-agenda',
            'page' => 'agenda/v_laporan_agenda',
            'masjid' => $this->ModelAdmin->ViewSetting(),
        ];
        return view('v_template_admin', $data);
    }

    public function ViewLaporan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'agenda' => $this->ModelAgenda->AllDataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('agenda/v_data_laporan', $data),
        ];

        echo json_encode($response);
    }
}
