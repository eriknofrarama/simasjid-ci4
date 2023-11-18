<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Tahun Qurban</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus"></i> Tambah</button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
            <?php endif; ?>

            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Tahun</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tahun as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <?= $value['tahun_h'] ?> H / <?= $value['tahun_m'] ?> M
                        </td>
                        <td>
                            <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal"
                                data-target="#modal-edit<?= $value['id_tahun'] ?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal"
                                data-target="#modal-delete<?= $value['id_tahun'] ?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.modal-tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Tahun/InsertData') ?>
                <div class="form-group">
                    <label>Tahun Hijriah</label>
                    <input type="number" min="1444" value="<?= date('Y') - 579 ?>" class="form-control" name="tahun_h"
                        required>
                </div>
                <div class="form-group">
                    <label>Tahun Masehi</label>
                    <input type="number" min="<?= date('Y') ?>" value="<?= date('Y') ?>" class="form-control"
                        name="tahun_m" required>
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
<!-- /.modal-dialog -->

<!-- /.modal-edit -->
<?php foreach ($tahun as $value) : ?>
<div class="modal fade" id="modal-edit<?= $value['id_tahun'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Tahun/UpdateData/' . $value['id_tahun']) ?>

                <div class="form-group">
                    <label>Tahun Hijriah</label>
                    <input type="number" min="1444" value="<?= $value['tahun_h'] ?>" class="form-control" name="tahun_h"
                        required>
                </div>
                <div class="form-group">
                    <label>Tahun Masehi</label>
                    <input type="number" min="<?= date('Y') ?>" value="<?= $value['tahun_m'] ?>" class="form-control"
                        name="tahun_m" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<!-- /.modal-delete -->
<div class="modal fade" id="modal-delete<?= $value['id_tahun'] ?>">
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
                <b><?= $value['id_tahun'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('Tahun/DeleteData/' . $value['id_tahun']) ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>