<?php  
//error_reporting(0);
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK METODE PROMETHEE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="images/logo.png" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- Tambahkan link stylesheet jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?module=home" class="nav-link">Home</a>
      </li>
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?module=home" class="brand-link">
      <img src="images/logo.png" alt="AdminLTE Logo" width="70px">
      <span class="brand-text font-weight-light"></span>
      <small>METODE PROMETHEE</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?module=edit_user&id=<?php echo $_SESSION['id']; ?>" class="d-block"><?php echo $_SESSION["nama"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?module=data_kriteria" class="nav-link">
            <i class=" nav-icon fas fa-walking"></i>
              <p>Kriteria</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="?module=data_subkriteria" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>Sub Kriteria</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=data_alternatif" class="nav-link">
            <i class=" nav-icon fas fa-user-astronaut"></i>
              <p>Alternatif</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=data_preferensi" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
              <p>Preferensi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=data_nilai" class="nav-link">
            <i class="nav-icon fas fa-stopwatch-20"></i>
              <p>Nilai</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=promethee" class="nav-link">
            <i class="nav-icon fas fa-subscript"></i>
              <p>PROMETHEE</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=data_user" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
            <i class=" nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <?php  
        $module=$_GET["module"];
        
            switch ($module) {
              default:
                # code...
                ?>
                <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <?php  
                              $mysql=mysqli_fetch_array(mysqli_query($koneksi,"select count(id_kriteria) as jumlah from kriteria"));
                            ?>
                            <h3><?php echo $mysql['jumlah'] ?></h3>

                            <p>Kriteria</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="?module=data_kriteria" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                             <?php  
                              $mysql=mysqli_fetch_array(mysqli_query($koneksi,"select count(id_alternatif) as jumlah from alternatif"));
                            ?>
                            <h3><?php echo $mysql['jumlah'] ?></h3>

                            <p>Alternatif</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="?module=data_alternatif" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                             <?php  
                              $mysql=mysqli_fetch_array(mysqli_query($koneksi,"select count(id_nilai) as jumlah from nilai"));
                            ?>
                            <h3><?php echo $mysql['jumlah'] ?></h3>

                            <p>Nilai</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="?module=data_nilai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                             <?php  
                              $mysql=mysqli_fetch_array(mysqli_query($koneksi,"select count(id_nf) as jumlah from net_flow"));
                            ?>
                            <h3><?php echo $mysql['jumlah'] ?></h3>
                            <p>Hasil</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                          <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                              <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">GRAFIK HASIL PERHITUNGAN METODE PROMETHEE</a></li>
                      
                            </ul>
                          </div><!-- /.card-header -->
                          <div class="card-body">
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1" align="center">
                                <?php include "grafik.php"; ?>
                              </div>
                            </div>
                            <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                      </div>
                      <!-- /.col -->
                    </div>
                <?php 
                break;
                
                case "data_kriteria" :
                        include "modul/kriteria/data_kriteria.php";
                break;
                case "data_alternatif" :
                        include "modul/alternatif/data_alternatif.php";
                break;
                case "data_nilai" :
                        include "modul/nilai/data_nilai.php";
                break;
                case "data_user" :
                        include "modul/user/data_user.php";
                break;
                case "input_alternatif" :
                        include "modul/alternatif/input_alternatif.php";
                break;
                case "input_kriteria" :
                        include "modul/kriteria/input_kriteria.php";
                break;
                case "input_nilai" :
                        include "modul/nilai/input_nilai.php";
                break;
                case "input_user" :
                        include "modul/user/input_user.php";
                break;
                case "edit_alternatif" :
                        include "modul/alternatif/edit_alternatif.php";
                break;
                case "edit_kriteria" :
                        include "modul/kriteria/edit_kriteria.php";
                break;
                case "edit_nilai" :
                        include "modul/nilai/edit_nilai.php";
                break;
                case "waspas" :
                        include "modul/waspas/waspas.php";
                break;
                case "edit_user" :
                        include "modul/user/edit_user.php";
                break;
                case "data_subkriteria" :
                        include "modul/subkriteria/data_subkriteria.php";
                break;
                case "input_subkriteria" :
                        include "modul/subkriteria/input_subkriteria.php";
                break;
                case "edit_subkriteria" :
                        include "modul/subkriteria/edit_subkriteria.php";
                break;
                case "data_preferensi" :
                        include "modul/preferensi/data_preferensi.php";
                break;
                case "input_preferensi" :
                        include "modul/preferensi/input_preferensi.php";
                break;
                case "edit_preferensi" :
                        include "modul/preferensi/edit_preferensi.php";
                break;
                case "promethee" :
                        include "modul/promethee/promethee.php";
                break;
            }
        ?>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- isi utama disini -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://adminlte.io">Beta_Dwi Anisa Maulana</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.4.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Combobox Bertingkat -->
<script src="plugins/query.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 1000);
</script>

<script type="text/javascript">
  $(document).ready(function(){
        $.ajax({
            type: 'POST',
            url: "get_kriteria.php",
            cache: false, 
            success: function(msg){
              $("#kriteria").html(msg);
            }
        });
 
        $("#kriteria").change(function(){
        var kriteria = $("#kriteria").val();
            $.ajax({
              type: 'POST',
                url: "get_subkriteria.php",
                data: {kriteria: kriteria},
                cache: false,
                success: function(msg){
                  $("#subkriteria").html(msg);
                }
            });
        });
     });
</script>

 <!-- Tambahkan link script jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Tambahkan link script jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $(document).ready(function() {
        // Inisialisasikan datepicker pada elemen dengan class datepicker
        $('.datepicker').datepicker({
          dateFormat: 'yy-mm-dd', // Format tanggal yang diinginkan (sesuaikan dengan format yang diinginkan)
          changeMonth: true,
          changeYear: true,
          yearRange: '-100:+0' // Rentang tahun yang ingin ditampilkan, misalnya 100 tahun ke belakang dari tahun sekarang
        });
      });
    </script>
</body>
</html>
