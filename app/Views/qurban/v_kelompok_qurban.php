<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Peserta Qurban</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Kelompok</button>
            </div>
        </div>
        <div class="card-body">
            <?php

            use CodeIgniter\Database\SQLite3\Table;

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <div class="row">
                <?php foreach ($kelompok as $key => $value) { ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-peserta<?= $value['id_kelompok'] ?>"><i class="fas fa-plus"></i> Tambah peserta</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
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
                                            <td><?= $pesertaRow['alamat'] ?></td>
                                            <td><?= $pesertaRow['no_hp'] ?></td>
                                            <td>Rp.<?= number_format($pesertaRow['biaya'], 0) ?></td>
                                            <td>
                                                <a href="<?= base_url('PesertaQurban/DeletePeserta/' . $value['id_tahun'] . '/' . $pesertaRow['id_peserta']) ?>" onclick="return confirm('Hapus Peserta?')">
                                                    <i class="fas fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="text-primary">
                                        <td></td>
                                        <td colspan="4"><b>Total Biaya: </b></td>
                                        <td>Rp. <?= number_format($biaya, 0) ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-kelompok<?= $value['id_kelompok'] ?>"><i class="fas fa-trash"></i>
                                    Delete Kelompok</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Delete Kelompok -->
<?php foreach ($kelompok as $value) { ?>
    <div class="modal fade" id="delete-kelompok<?= $value['id_kelompok'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Menghapus Data ? <br>
                    <b><?= $value['nama_kelompok'] ?></b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('PesertaQurban/DeleteKelompok/'  . $tahun['id_tahun'] . '/' . $value['id_kelompok']) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<?php } ?>

<!-- Modal: Tambah Kelompok -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelompok</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('PesertaQurban/InsertKelompok') ?>

                <input value="<?= $tahun['id_tahun'] ?>" name="id_tahun" hidden>

                <div class="form-group">
                    <label>Nama Kelompok</label>
                    <input class="form-control" name="nama_kelompok" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>

<!-- Modal: Tambah Peserta Kelompok -->
<?php foreach ($kelompok as $value) { ?>
    <div class="modal fade" id="tambah-peserta<?= $value['id_kelompok'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Peserta <?= $value['nama_kelompok'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('PesertaQurban/InsertPeserta') ?>
                    <input value="<?= $tahun['id_tahun'] ?>" name="id_tahun" hidden>
                    <input value="<?= $value['id_kelompok'] ?>" name="id_kelompok" hidden>
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input class="form-control" name="nama_peserta" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input class="form-control" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input value="0" min="0" type="number" class="form-control" name="biaya" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>