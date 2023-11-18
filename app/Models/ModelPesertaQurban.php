<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesertaQurban extends Model
{
    public function AllDataKelompok($id_tahun)
    {
        return $this->db->table('tbl_kelompok')
            ->where('id_tahun', $id_tahun)
            ->get()->getResultArray();
    }

    public function DeleteKelompok($data)
    {
        $this->db->table('tbl_kelompok')
            ->where('id_kelompok', $data['id_kelompok'])
            ->delete($data);
    }

    public function InsertKelompok($data)
    {
        $this->db->table('tbl_kelompok')->insert($data);
    }
    public function InsertPeserta($data)
    {
        $this->db->table('tbl_peserta_kelompok')->insert($data);
    }
    public function DeletePeserta($data)
    {
        $this->db->table('tbl_peserta_kelompok')
            ->where('id_peserta', $data['id_peserta'])
            ->delete($data);
    }
    public function AllDataBulanan($tahun_m, $tahun_h)
    {
        return $this->db->table('tbl_peserta_kelompok')
            ->where('tahun_m', $tahun_m)
            ->where('tahun_h', $tahun_h)
            ->get()->getResultArray();
    }
    public function getPesertaByTahun($tahun_m, $tahun_h)
    {
        return $this->db->table('tbl_peserta_kelompok')
            ->where('tahun_m', $tahun_m)
            ->where('tahun_h', $tahun_h)
            ->get()->getResultArray();
    }
}
