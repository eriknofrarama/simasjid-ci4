<div class="row">
    <?php foreach ($kelompok as $key => $value) { ?>
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#tambah-peserta<?= $value['id_kelompok'] ?>"><i class="fas fa-plus"></i> Tambah
                        peserta</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Biaya</th>
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
                        <td>Rp.<?= number_format($pesertaRow['biaya'], 0) ?></td>
                        <td>
                            <a href="<?= base_url('PesertaQurban/DeletePeserta/' . $value['id_tahun'] . '/' . $pesertaRow['id_peserta']) ?>"
                                onclick="return confirm('Hapus Peserta?')">
                                <i class="fas fa-times text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr class="text-primary">
                        <td></td>
                        <td><b>Total Biaya: </b></td>
                        <td>Rp. <?= number_format($biaya, 0) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#delete-kelompok<?= $value['id_kelompok'] ?>"><i class="fas fa-trash"></i>
                    Delete Kelompok</button>
            </div>
        </div>
    </div>
    <?php } ?>
</div>