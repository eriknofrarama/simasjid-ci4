<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Laporan Data Kegiatan</h3>


            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <div>Bulan</div>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">--Bulan--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <div>Tahun</div>
                        <div class="col-10 input-group">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Tahun</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                            <span class="input-group-append">
                                <button class="btn btn-primary" onclick="ViewLaporan()">View</button> <br>
                                <button class="btn btn-success" onclick="PrintLaporan()"><i
                                        class="fas fa-print"></i>Print</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" id="printarea">
                <div class="text-center">
                    <p>
                    <h4><b><?= $masjid['nama_masjid'] ?></b></h4>
                    <p><?= $masjid['alamat'] ?><br>
                        <b>Laporan Data Kegiatan</b>
                    </p>
                </div>
                <div class="Tabel">

                </div>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script>
function ViewLaporan() {
    let bulan = $('#bulan').val();
    let tahun = $('#tahun').val();
    if (bulan == '') {
        alert('Bulan Belum Dipilih !!!');
    } else if (tahun == '') {
        alert('Tahun Belum Dipilih !!!')
    } else {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Agenda/ViewLaporan') ?>",
            data: {
                bulan: bulan,
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