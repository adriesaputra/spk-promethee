
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Nilai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Nilai</li>
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
            <div class="card-header">
              <h3 class="card-title"> <a href="?module=input_nilai">Tambah Data</a></h3>
            </div>
            <!-- /.card-header -->

            <?php
				if(isset($_GET['aksi']) == 'delete'){
					$id_nilai = $_GET['id_nilai'];
					$cek = mysqli_query($koneksi, "SELECT * FROM nilai  WHERE id_nilai='$id_nilai'");
					if(mysqli_num_rows($cek) == 0){
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data tidak ditemukan.</div>';
					}else{
						$delete = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");
						if($delete){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
						}else{
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
						}
					}
				}
			?>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Nama Alternatif</th>
					<th>Kriteria</th>
					<th>Nilai</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM nilai, alternatif, kriteria WHERE nilai.id_alternatif=alternatif.id_alternatif AND nilai.id_kriteria=kriteria.id_kriteria") or die(mysqli_error($koneksi));
					$no = 1;
					while($row = mysqli_fetch_array($sql)){
				?>
						
						<tr>
							
							<td><?php echo $angka++ ?></td>
							<td><?php echo $row['nama_alternatif'];?></td>
							<td><?php echo $row['nama_kriteria'];?></td>
							<td><?php echo $row['nilai'];?></td>
							<td>
								
								<a href="?module=edit_nilai&id_nilai=<?php echo $row['id_nilai']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i></a>
								<a href="?module=data_nilai&aksi=delete&id_nilai=<?php echo $row['id_nilai']; ?>" title="Hapus Data" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i></a>
							</td>
						</tr>
						
						<?php
						$no++;
					
				}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Alternatif</th>
						<th>Kriteria</th>
						<th>Nilai</th>
						<th>aksi</th>
					</tr>
				</tfoot>
				</table>
				</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --

	