<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>

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
                        <th>Nama User</th>
                        <th>E-Mail</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_user'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['password'] ?></td>
                        <td><?= $value['level'] ?></td>
                        <td>

                            <button class="btn btn-flat btn-sm btn-warning" data-toggle="modal"
                                data-target="#modal-edit<?= $value['id_user'] ?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-flat btn-sm btn-danger" data-toggle="modal"
                                data-target="#modal-delete<?= $value['id_user'] ?>"><i
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
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="modal-edit<?= $value['id_user'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('User/UpdateData/' . $value['id_user']) ?>

                <label>Nama User</label>
                <input class="form-control" name="nama_user" value="<?= $value['nama_user'] ?>" required>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input class="form-control" name="email" value="<?= $value['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" value="<?= $value['password'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input class="form-control" name="level" value="<?= $value['level'] ?>" required>
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
<div class="modal fade" id="modal-delete<?= $value['id_user'] ?>">
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
                <b><?= $value['nama_user'] ?></b>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?= base_url('User/DeleteData/' . $value['id_user']) ?>" class="btn btn-danger">Delete</a>
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
                <?php echo form_open('User/InsertData') ?>

                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama_user" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input class="form-control" name="level">
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