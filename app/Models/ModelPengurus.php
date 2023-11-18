<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengurus extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_pengurus')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_pengurus')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_pengurus')
            ->where('id_pengurus', $data['id_pengurus'])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_pengurus')
            ->where('id_pengurus', $data['id_pengurus'])
            ->delete($data);
    }
}
