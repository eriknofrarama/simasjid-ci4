<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Kepengurusan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus"></i> Tambah


                </button>

            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            use Kint\Zval\Value;

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengurus</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengurus as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_pengurus'] ?></td>
                        <td><?= $value['jabatan'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['no_hp'] ?></td>
                        <td>

                            <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal"
                                data-target="#modal-edit<?= $value['id_pengurus'] ?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal"
                                data-target="#modal-delete<?= $value['id_pengurus'] ?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- /.modal-edit -->
<?php foreach ($pengurus as $key => $value) { ?>
<div class="modal fade" id="modal-edit<?= $value['id_pengurus'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Pengurus/UpdateData/' . $value['id_pengurus']) ?>

                <label>Nama Pengurus</label>
                <input class="form-control" name="nama_pengurus" value="<?= $value['nama_pengurus'] ?>" required>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input class="form-control" name="jabatan" value="<?= $value['jabatan'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" name="alamat" value="<?= $value['alamat'] ?>" required>
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input class="form-control" name="no_hp" value="<?= $value['no_hp'] ?>" required>
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
<div class="modal fade" id="modal-delete<?= $value['id_pengurus'] ?>">
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
                <b><?= $value['nama_pengurus'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('Pengurus/DeleteData/' . $value['id_pengurus']) ?>"
                    class="btn btn-danger">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<?php } ?>


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
                <?php echo form_open('Pengurus/InsertData') ?>

                <div class="form-group">
                    <label>Nama Pengurus</label>
                    <input name="nama_pengurus" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input name="jabatan" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input class="form-control" name="no_hp">
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