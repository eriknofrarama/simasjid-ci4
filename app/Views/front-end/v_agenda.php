<?php
// Mengurutkan array $agenda berdasarkan field 'tanggal' secara menurun
$timestamps = array_column($agenda, 'tanggal');
array_multisort($timestamps, SORT_DESC, $agenda);
?>

<div class="col-md-12">
    <div class="card card-success card-outline">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?> Bulan <?= date('F Y') ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <?php foreach ($agenda as $key => $value) { ?>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon"><i class="fas fa-bullhorn text-success fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kegiatan</span>
                                <span class="info-box-number"><?= $value['nama_kegiatan'] ?></span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 0%"></div>
                                </div>
                                <span class="progress-description">
                                    <i class="fas fa-calendar-alt text-success"></i>
                                    <?= date('d F Y', strtotime($value['tanggal'])) ?>
                                    <i class="fas fa-clock text-success"></i> <?= $value['jam'] ?>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>