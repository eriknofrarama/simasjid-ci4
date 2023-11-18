<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Peserta Qurban</h3>
            <span class="input-group-append">
                <button class="btn btn-primary" onclick="PrintLaporan()">View</button> <br>
            </span>
        </div>
        <div class="card-body" id="printarea">
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
    </div>
</div>
<script>
    function PrintLaporan(printarea) {
        var print = document.getElementById('printarea');
        newWin = window.open('', 'newWin', 'toolbar=no, width=1500, height=800, scrollbars=yes');
        newWin.document.write(print.innerHTML);
        newWin.document.close();
        newWin.focus();
        newWin.print();
        newWin.close();
    }
</script>