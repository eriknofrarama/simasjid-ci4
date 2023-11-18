<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data Peserta Qurban</h3>
        </div>
        <div class="card-body">
            <form id="form-laporan" action="<?= base_url('PesertaQurban/ViewLaporan') ?>" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tahun Masehi</label>
                            <select name="tahun_m" class="form-control">
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value['tahun_m'] ?>"><?= $value['tahun_m'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tahun Hijriah</label>
                            <select name="tahun_h" class="form-control">
                                <?php foreach ($tahun as $key => $value) : ?>
                                    <option value="<?= $value['tahun_h'] ?>"><?= $value['tahun_h'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary form-control">Tampilkan Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
            <div id="laporan-container"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Mengirim permintaan AJAX saat form dikirim
            $('#form-laporan').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        // Menampilkan loading spinner atau pesan "Loading" jika diperlukan
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            // Menampilkan data laporan pada kontainer
                            $('#laporan-container').html(response.data);
                        } else {
                            // Menampilkan pesan error jika terjadi masalah saat memuat data laporan
                            $('#laporan-container').html(
                                'Error occurred while fetching the data. Please try again.');
                        }
                    },
                    error: function() {
                        // Menampilkan pesan error jika terjadi masalah saat mengirim permintaan AJAX
                        $('#laporan-container').html(
                            'Error occurred while fetching the data. Please try again.');
                    }
                });
            });
        });
    </script>

</div>