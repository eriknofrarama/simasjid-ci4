<div class="col-md-9">
    <div class="card">
        <div class="col-lg-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <!-- <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1512632578888-169bbbc64f33?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Informasi Jadwal Ceramah Masjid Raya</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1655438807359-97de261a90ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Laporan Keuangan Dan Kegiatan Masjid</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://media.istockphoto.com/id/1392234376/id/vektor/selamat-hari-raya-idul-fitri-desain-tipografi-ala-arab.webp?s=1024x1024&w=is&k=20&c=5fdD-WjLy8i45UXC9So4pdnj2JSqZygrUMefYYQ30P4=" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Saldo Kas Sosial Dan Kas Masjid</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div> -->

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1512632578888-169bbbc64f33?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" class="d-block w-100" alt="..." style="height: 390px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><b>SISTEM INFORMASI MASJID RAYA PAUH KAMBAR-BINTUNGAN TINGGI</b></h5>
                            <p><b>Masjid Tuo Dua Nagari, Nagari Pauh Kambar dan Bitungan Tinggi</b></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/460680/pexels-photo-460680.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 390px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><B>SUDAHKAH ANDA SHOLAT ???</B></h5>
                            <p><b>Sholatlah Sebelum Anda Di sholat</b></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn-cms.pgimgs.com/areainsider/2023/02/Alt-Text-Masjid-Agung-Karanganyar-Masjid-Ala-Timur-Tengah-Nan-Megah.png" class="d-block w-100" alt="..." style="height: 390px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><b>Sistem Informasi Keuangan dan Kegiatan</b></h5>
                            <p>Masjid Raya Pauh Kambar Bintunagan Tinggi</p>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card  card-outline card-success">
        <div class="card-header">
            <h3 class="card-title"> <b><?= $waktu['data']['lokasi'] ?></b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Shubuh</a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['subuh'] ?>
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Dzuhur</a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['dzuhur'] ?>
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Ashar</a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['ashar'] ?>
                        </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Maghrib</a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['maghrib'] ?>
                        </span>
                    </div>
                </li>

                <li class="item">
                    <div class="product-img">
                        <i class="far fa-clock fa-3x text-success"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title">Isya</a>
                        <span class="product-description">
                            <?= $waktu['data']['jadwal']['isya'] ?>
                        </span>
                    </div>
                </li>
            </ul>
            <div class="text-center">
                <b class="text-success"><?= $waktu['data']['jadwal']['tanggal'] ?></b>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <?php
    if ($kas_m == null) {
        $pemasukan_m[] = 0;
        $pengeluaran_m[] = 0;
    } else {
        foreach ($kas_m as $key => $value) {
            $pemasukan_m[] = $value['kas_masuk'];
            $pengeluaran_m[] = $value['kas_keluar'];
        }
    }
    $saldo_m = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

    if ($kas_s == null) {
        $pemasukan_s[] = 0;
        $pengeluaran_s[] = 0;
    } else {
        foreach ($kas_s as $key => $value) {
            $pemasukan_s[] = $value['kas_masuk'];
            $pengeluaran_s[] = $value['kas_keluar'];
        }
    }
    $saldo_s = array_sum($pemasukan_s) - array_sum($pengeluaran_s);
    ?>


</div>
<div class="col-md-12">
    <div class="card">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Saldo Kas Masjid</span>
                            <span class="info-box-number">
                                Rp.<?= number_format($saldo_m, 0) ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-heart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Saldo Kas Anak Yatim</span>
                            <span class="info-box-number">
                                Rp.<?= number_format($saldo_s, 0) ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->

                <!-- <div class="col-12 col-sm-6 col-md-3"> -->
                <!-- <div class="info-box mb-3"> -->
                <!-- <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-wave"></i></span> -->

                <!-- <div class="info-box-content">
                            <span class="info-box-text">Kas Keluar</span>
                            <span class="info-box-number">760</span>
                        </div> -->
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <footer class="text-center text-lg-start bg-light text-muted">


            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i> Masjid Raya Pauh Kambar Bintungan Tinggi
                            </h6>
                            <p>
                                Masjid Tuo 2 Nagari
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Kegiatan
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Ceramah Mingguan</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Ceramah Ba'da Sholat</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Malam Bina Iman dan Taqwa</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Revolusi Mental</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Festival
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Qurban</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Lomba Tahfidz</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">MTQ </a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Cerdas Cermat</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> Pariaman City, 25571, INA</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                masjidraya.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © <?= date('Y') ?> Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>

    <!-- /.row -->