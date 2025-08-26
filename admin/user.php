<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pengguna
      <small>Data Pengguna</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Pengguna</h3>
            <a href="user_tambah.php" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Pengguna Baru</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%" style="background-color: #00c0ef; color: white;">NO</th>
                    <th style="background-color: #00c0ef; color: white;">NAMA</th>
                    <th style="background-color: #00c0ef; color: white;">USERNAME</th>
                    <th style="background-color: #00c0ef; color: white;">LEVEL</th>
                    <th width="15%" style="background-color: #00c0ef; color: white;">FOTO</th>
                    <th width="10%" style="background-color: #00c0ef; color: white;">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM user");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['user_nama']; ?></td>
                      <td><?php echo $d['user_username']; ?></td>
                      <td><?php echo $d['user_level']; ?></td>
                      <td>
                        <center>
                          <?php if($d['user_foto'] == ""){ ?>
                            <img src="../gambar/sistem/user.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/user/<?php echo $d['user_foto'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
  <a class="btn btn-warning btn-sm" href="user_edit.php?id=<?php echo $d['user_id'] ?>">
    <i class="fa fa-pencil"></i>
  </a>
  <?php if($d['user_id'] != 1){ ?>
    <!-- Tombol buka modal -->
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user_<?php echo $d['user_id'] ?>">
      <i class="fa fa-trash"></i>
    </button>

    <!-- Modal hapus -->
    <div class="modal fade" id="hapus_user_<?php echo $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" style="border-radius: 10px;">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel" style="text-align: center;">Peringatan!</h4>
          </div>
          <div class="modal-body text-center" style="border-radius: 10px;">
            <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
            <p class="mb-0">Yakin ingin menghapus data pengguna dengan nama <strong><?php echo $d['user_nama']; ?></strong>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-left bg-blue btn-sm" data-dismiss="modal">Tutup</button>
            <a href="user_hapus.php?id=<?php echo $d['user_id'] ?>" class="btn btn-secondary bg-red btn-sm">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</td>


                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>