<?= $this->extend('viewlaporan/layout_laporan') ?>

<?= $this->section('mainkonten') ?>
<!-- Main content -->
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table align="center" width="92%" align="center" style="border-collapse: collapse">
        <tr>
          <td>
            <table align="center" width="91%" style="border-collapse: collapse">
              <tr>
                <td width="10%" colspan="2" align="center">
                  <i class="fas fa-mosque" style="padding: 5px; width: 160px; height: 80px; font-size: 80px; line-height: 80px; color: green;"></i>
                </td>

                <td colspan="2" width="90%" align="center">
                  <h2>Masjid Raya Pauh Kambar Bintungan Tinggi</h2>
                  <h4>Kecamatan Nan Sabaris Nagari Pauh Kambar</h4>
                  <h4>Nan Sabaris, Padang Pariaman, Sumatera Barat</h4>
                </td>
              </tr>
              <br />
              <tr>
                <td colspan="7">
                  <hr />
                </td>
              </tr>
              <tr>
                <td colspan="7" align="center">
                  <h4>Laporan Data Peserta Qurban</h4>
                </td>
              </tr>
            </table>
            <br>
            <div class="card-body">
              <?php

              use CodeIgniter\Database\SQLite3\Table;
              ?>
              <div class="row">
                <?php foreach ($kelompok as $key => $value) { ?>
                  <div class="col-md-6">
                    <div class="card card-outline card-success">
                      <div class="card-header">
                        <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-borderless">
                          <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <!-- <th>Biaya</th> -->
                            <th></th>
                          </tr>
                          <?php
                          $db = \config\Database::connect();
                          $pesertaQuery = $db->table('tbl_peserta_kelompok')
                            ->where('id_kelompok', $value['id_kelompok'])
                            ->get();
                          $peserta = $pesertaQuery->getResultArray();
                          $no = 1;
                          $biaya = 0; // Inisialisasi $biaya sebelum perulangan

                          foreach ($peserta as $pesertaRow) {
                            $biayaQuery = $db->table('tbl_peserta_kelompok')
                              ->where('id_kelompok', $pesertaRow['id_kelompok'])
                              ->select('tbl_peserta_kelompok.id_kelompok')
                              ->groupBy('tbl_peserta_kelompok.id_kelompok')
                              ->selectSum('tbl_peserta_kelompok.biaya');
                            $biayaRow = $biayaQuery->get()->getRowArray();
                            $biaya = $biayaRow ? $biayaRow['biaya'] : 0;
                          ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $pesertaRow['nama_peserta'] ?></td>
                              <td><?= $pesertaRow['alamat'] ?></td>
                              <td><?= $pesertaRow['no_hp'] ?></td>
                              <td>Rp.<?= number_format($pesertaRow['biaya'], 0) ?></td>
                            </tr>
                          <?php } ?>
                          <tr class="text-primary">
                            <td></td>
                            <td colspan="4"><b>Total Biaya: </b></td>
                            <td>Rp. <?= number_format($biaya, 0) ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <table align="center" width="80%" border="0">
              <tr>
                <td width="70%">&nbsp &nbsp</td>
                <td align="left">
                  <br>



            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<!-- /.content -->

<?= $this->endSection() ?>