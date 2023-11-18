<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasyatim extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kas_yatim')
            ->get()->getResultArray();
    }

    public function AllDataKasMasuk()
    {
        return $this->db->table('tbl_kas_yatim')
            ->where('status', 'Masuk')
            ->get()->getResultArray();
    }
    public function AllDataKasKeluar()
    {
        return $this->db->table('tbl_kas_yatim')
            ->where('status', 'Keluar')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kas_yatim')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_kas_yatim')
            ->where('id_kas_yatim', $data['id_kas_yatim'])
            ->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_kas_yatim')
            ->where('id_kas_yatim', $data['id_kas_yatim'])
            ->delete($data);
    }
    public function AllDataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_kas_yatim')
            ->where('month(tanggal)', $bulan)
            ->where('year(tanggal)', $tahun)
            ->get()->getResultArray();
    }

    public function getKasMasuk()
    {
        $query = $this->db->table('tbl_kas_yatim')
            ->selectSum('kas_masuk')
            ->get()
            ->getResult();
        return $query[0] ?? null;
    }

    public function getKasKeluar()
    {
        $query = $this->db->table('tbl_kas_yatim')
            ->selectSum('kas_keluar')
            ->get()
            ->getResult();
        return $query[0] ?? null;
    }

    protected $table = 'tbl_kas_yatim'; // Sesuaikan dengan nama tabel Anda

    public function getCurrentBalance()
    {
        // Ambil saldo saat ini dari tabel atau data lain yang sesuai dengan aplikasi Anda
        // Misalnya, jika saldo disimpan dalam tabel terpisah, Anda bisa melakukan query di sini
        $query = $this->db->table($this->table)->selectSum('kas_masuk')->selectSum('kas_keluar')->get();
        $result = $query->getRow();

        // Hitung saldo saat ini dengan mengurangkan total kas keluar dari total kas masuk
        $saldo = ($result->kas_masuk ?? 0) - ($result->kas_keluar ?? 0);

        return $saldo;
    }
}
