<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class ModelTahun extends Model
{
    public function AllData()
    {
        return $this->db->table('tabel_tahun')
            ->get()->getResultArray();
    }

    public function DetailData($id_tahun)
    {
        return $this->db->table('tabel_tahun')
            ->where('id_tahun', $id_tahun)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tabel_tahun')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tabel_tahun')
            ->where('id_tahun', $data['id_tahun'])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tabel_tahun')
            ->where('id_tahun', $data['id_tahun'])
            ->delete($data);
    }

    public function Selecttahun()
    {
        $query =  $this->db->table('tabel_tahun')
            ->select('tahun_m, id_tahun')
            // ->orderBy('tahun_m', 'DESC')
            ->get()->getResult();
        return $query ?? null;
    }
}
