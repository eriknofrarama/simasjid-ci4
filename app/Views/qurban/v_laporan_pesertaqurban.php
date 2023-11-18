<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Laporan Peserta Qurban</h3>
        </div>

        <form target="__blank" action="<?= base_url('PesertaQurban/ViewLaporanQurban/') ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Qurban</label>
                    <div class="col-sm-3">
                        <select name="tahuncetak" class="form-control select2">
                            <?php foreach ($tahun as $row) { ?>
                                <option value=" <?= $row->id_tahun ?>"><?= $row->tahun_m ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button target class="btn btn-primary" type="submit">Lihat Laporan</button>
                </div>
        </form>
        <!-- /.card-header -->

        <!-- <div class="col-sm-12" id="printarea">
                <div class="text-center">
                    <p>
                    <h4><b><?= $masjid['nama_masjid'] ?></b></h4>
                    <p><?= $masjid['alamat'] ?><br>
                        <b>Laporan Peserta Qurban</b>
                    </p>
                </div>
                <div class=" Tabel">

                </div>
            </div> -->

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script>
    function ViewLaporan() {
        let tahun = $('#tahun').val();
        if (tahun == '') {
            alert('Tahun Belum Dipilih !!!')
        } else {
            $.ajax({
                type: "POST",
                // url: "<?= base_url('KasMasjid/ViewLaporan') ?>",
                url: "<?= base_url('PesertaQurban/ViewLaporanQurban/') ?>",
                data: {
                    tahun: tahun,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.Tabel').html(response.data);
                    }
                }
            });
        }
    }

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