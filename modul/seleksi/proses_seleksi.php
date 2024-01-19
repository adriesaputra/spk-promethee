<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">PROMETHEE</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Promethee</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Seleksi Mobil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="padding-bottom: 20px">
                            <div>
                                <h4>Tabel Normalisasi Bobot Kriteria</h4>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="index.php?url=hasil_seleksi" method="POST">
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;">No</th>
                                            <th rowspan="2" style="vertical-align: middle;">Kriteria</th>
                                            <th rowspan="2" style="vertical-align: middle;">Bobot</th>
                                            <th rowspan="2" style="vertical-align: middle;">Jenis</th>
                                            <th width="100" rowspan="2" style="vertical-align: middle;">Tipe</th>
                                            <th colspan="2" style="text-align: center">Parameter</th>
                                        </tr>
                                        <tr>
                                            <th width="140" class="text-center">q</th>
                                            <th width="140" class="text-center">p</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $x= 1; 
                                        $query=mysqli_query($koneksi, "SELECT * FROM kriteria");
                                    ?>
                                       <?php while ($data_kriteria=mysqli_fetch_array($query)){ ?>
                                            <tr>
                                                <td><?php echo $x++ ?></td>
                                                <td><?php echo $data_kriteria["nama_kriteria"] ?></td>
                                                <td><?php echo $data_kriteria['bobot_kriteria'];?></td>
                                                <td><?php echo  $data_kriteria['jenis_kriteria'] ?></td>
                                                <td>
                                                    <select class=" form-control" name="tipe[<?php echo $data_kriteria['id_kriteria'] ?>]">
                                                        <option value="">Tipe</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" step="0.1" name="q[<?php echo  $data_kriteria['id_kriteria'] ?>]" placeholder="Parameter q" required>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" step="0.1" name="p[ $data_kriteria['id_kriteria']]" placeholder="Parameter p" required>
                                                </td>
                                            </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                <div class="col-lg-12" align="center">
                                    <button class="btn btn-lg btn-info"><i class="  fa fa-refresh"></i> Mulai Seleksi</button><br><br>
                                </div>
                            </form>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->
    </div>
</div>
</div>
</section>