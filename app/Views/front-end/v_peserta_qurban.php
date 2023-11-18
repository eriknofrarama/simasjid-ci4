<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Peserta Qurban</h3>
            <div class="card-tools"></div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            use CodeIgniter\Database\SQLite3\Table;

            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="row">
                <?php foreach ($kelompok as $key => $value) { ?>
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><?= $value['nama_kelompok'] ?></h3>
                                <div class="card-tools"></div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Peserta</th>
                                        <th>No. HP</th>
                                    </tr>
                                    <?php
                                    $db = \config\Database::connect();
                                    $peserta = $db->table('tbl_peserta_kelompok')
                                        ->where('id_kelompok', $value['id_kelompok'])
                                        ->get()->getResultArray();
                                    $no = 1;

                                    foreach ($peserta as $key => $peserta_item) {
                                    ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <th><?= $peserta_item['nama_peserta'] ?></th>
                                            <th><?= $peserta_item['no_hp'] ?></th>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>