<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/filter/filter.js""></script>
  <title>Internship System</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel=" stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons 
    -->
    <link rel="stylesheet" href="<?php echo base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body onload="window.print()" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-sm">
                    <!-- Custom tabs (Charts with tabs)-->
                    <?= $this->renderSection('mainkonten') ?>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url('assets') ?>/dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets') ?>/dist/js/pages/dashboard3.js"></script>
</body>

</html>