<div class="col-md-12">
    <?php
    if ($kas == null) {
        $pengeluaran[] = 0;
    } else {
        foreach ($kas as $key => $value) {
            $pengeluaran[] = $value['kas_keluar'];
        }
    }
    ?>
    <div class="alert alert-danger alert-dismissible">
        <h5><i class="icon fas fa-info"></i> Total Pengeluaran Kas yatim</h5>
        <h3> Rp. <?= number_format(array_sum($pengeluaran), 0) ?> </h3>
    </div>
</div>


<div class="col-md-12">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Data Kas yatim Keluar</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i class=" fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table" id="example1">
                <thead>
                    <tr class="text-center">
                        <th width=" 50px">No</th>
                        <th width=" 100px">Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($kas as $key => $value) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['tanggal'] ?></td>
                        <td><?= $value['ket'] ?></td>
                        <td><?= $value['kas_keluar'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $value['id_kas_yatim'] ?>"><i class=" fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete<?= $value['id_kas_yatim'] ?>"><i class=" fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<!-- /.modal-tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Kas Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Kasyatim/InsertKasKeluar') ?>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input name="ket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah(Rp.)</label>
                    <input type="number" min="0" value="0" name="kas_keluar" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($kas as $key => $value) { ?>
    <!-- /.modal-edit -->
    <div class="modal fade" id="modal-edit<?= $value['id_kas_yatim'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Edit Kas Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Kasyatim/UpdateKasKeluar/' . $value['id_kas_yatim']) ?>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= $value['tanggal'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input name="ket" value="<?= $value['ket'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah(Rp.)</label>
                        <input type="number" min="0" name="kas_keluar" value="<?= $value['kas_keluar'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<?php foreach ($kas as $key => $value) { ?>
    <!-- /.modal-delete -->
    <div class="modal fade" id="modal-delete<?= $value['id_kas_yatim'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Delete Kas Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Yakin Hapus Data <b><?= $value['ket'] ?></b> ??
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                    <a href="<?= base_url('Kasyatim/DeleteKasKeluar/' . $value['id_kas_yatim']) ?>" class="btn btn-danger">Yes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>