<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ModelPengurus;

class Pengurus extends BaseController
{

    public function __construct()
    {
        $this->ModelPengurus = new ModelPengurus();
    }


    public function index()
    {
        $data = [
            'judul' => 'Pengurus',
            'menu' => 'pengurus',
            'submenu' => '',
            'page' => 'v_pengurus',
            'pengurus' => $this->ModelPengurus->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    public function InsertData()
    {
        $data = [
            'nama_pengurus' => $this->request->getPost('nama_pengurus'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];
        $this->ModelPengurus->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        return redirect()->to(base_url('Pengurus'));
    }

    public function UpdateData($id_pengurus)
    {
        $data = [
            'id_pengurus' => $id_pengurus,
            'nama_pengurus' => $this->request->getPost('nama_pengurus'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];
        $this->ModelPengurus->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate !!!');
        return redirect()->to(base_url('Pengurus'));
    }
    public function DeleteData($id_pengurus)
    {
        $data = [
            'id_pengurus' => $id_pengurus,
        ];
        $this->ModelPengurus->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus !!!');
        return redirect()->to(base_url('Pengurus'));
    }
}
