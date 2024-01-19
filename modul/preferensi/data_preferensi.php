
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
              <h3 class="card-title"> <a href="?module=input_preferensi">Tambah Data</a></h3>
            </div>
            <!-- /.card-header -->

            <?php
				if(isset($_GET['aksi']) == 'delete'){
					$id_preferensi = $_GET['id_preferensi'];
					$cek = mysqli_query($koneksi, "SELECT * FROM preferensi  WHERE id_preferensi='$id_preferensi'");
					if(mysqli_num_rows($cek) == 0){
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data tidak ditemukan.</div>';
					}else{
						$delete = mysqli_query($koneksi, "DELETE FROM preferensi WHERE id_preferensi='$id_preferensi'");
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
					<th>Alternatif 1</th>
					<th>Alternatif 2</th>
					<th>Kriteria</th>
					<th>Nilai</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM preferensi, kriteria WHERE preferensi.id_kriteria=kriteria.id_kriteria") or die(mysqli_error($koneksi));
					$no = 1;
					while($row = mysqli_fetch_array($sql)){
				?>
						
						<tr>
							
							<td><?php echo $angka++ ?></td>
							<td>
								<?php 
									$sql_alt1=mysqli_query($koneksi, "SELECT nama_alternatif FROM alternatif WHERE id_alternatif='$row[alternatif1]'");
									$alt1=mysqli_fetch_array($sql_alt1);
									echo $alt1["nama_alternatif"];
								?>	
							</td>
							<td>
								<?php 
									$sql_alt2=mysqli_query($koneksi, "SELECT nama_alternatif FROM alternatif WHERE id_alternatif='$row[alternatif2]'");
									$alt2=mysqli_fetch_array($sql_alt2);
									echo $alt2["nama_alternatif"];
								?>	
							</td>
							<td><?php echo $row['nama_kriteria'];?></td>
							<td><?php echo $row['nilai'];?></td>
							<td>
								<a href="?module=edit_preferensi&id_preferensi=<?php echo $row['id_preferensi']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i></a>
								
								<a href="?module=data_preferensi&aksi=delete&id_preferensi=<?php echo $row['id_preferensi']; ?>" title="Hapus Data" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i></a>
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
					<th>Alternatif 1</th>
					<th>Alternatif 2</th>
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

	