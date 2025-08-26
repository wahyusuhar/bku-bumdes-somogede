<?php include 'header.php'; ?>

<div class="content-wrapper">
<section class="content-header">
    <h1>
      Kategori
      <small>Data Kategori</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Kategori Transaksi Keuangan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Kategori
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal Tambah Kategori -->
<form action="kategori_act.php" method="post">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalTambahKategoriLabel">
    <div class="modal-dialog" role="document" style="max-width: 450px;">
      <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">

        <!-- Header -->
        <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">
            <i class="fa fa-folder-open"></i> Tambah Kategori
          </h4>
        </div>

        <!-- Body -->
        <div class="modal-body" style="background: #f9f9f9;">
          <div class="form-group">
            <label><strong>Nama Kategori</strong></label>
            <input type="text" name="kategori" class="form-control" placeholder="Masukkan nama kategori..." required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
          </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer" style="background: #f5f5f5; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
          <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">
            <i class="fa fa-times"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>

      </div>
    </div>
  </div>
</form>



            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%" style="background-color: #00c0ef; color: white;">NO</th>
                    <th  style="background-color: #00c0ef; color: white;">NAMA</th>
                    <th width="10%" style="background-color: #00c0ef; color: white;">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY kategori ASC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kategori']; ?></td>
                      <td>    
                        <?php 
                        if($d['kategori_id'] != 1){
                          ?> 
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_kategori_<?php echo $d['kategori_id'] ?>">
                          <i class="fa fa-pencil"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_kategori_<?php echo $d['kategori_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        }
                        ?>



                      <!-- Modal Edit Kategori -->
                        <div class="modal fade" id="edit_kategori_<?php echo $d['kategori_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editKategoriLabel_<?php echo $d['kategori_id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="max-width: 450px;">
                            <form action="kategori_update.php" method="post">
                              <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">

                                <!-- Modal Header -->
                                <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" id="editKategoriLabel_<?php echo $d['kategori_id'] ?>">
                                    <i class="fa fa-edit"></i> Edit Kategori
                                  </h4>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body" style="background: #f9f9f9;">
                                  <input type="hidden" name="id" value="<?php echo $d['kategori_id']; ?>">

                                  <div class="form-group">
                                    <label for="kategori_<?php echo $d['kategori_id']; ?>"><strong>Nama Kategori</strong></label>
                                    <input type="text" name="kategori" id="kategori_<?php echo $d['kategori_id']; ?>" class="form-control" value="<?php echo htmlspecialchars($d['kategori']); ?>" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                                  </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer" style="background: #f5f5f5; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                  <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Batal
                                  </button>
                                  <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan
                                  </button>
                                </div>

                              </div>
                            </form>
                          </div>
                        </div>

                              <!-- Modal Hapus Kategori -->
                              <div class="modal fade" id="hapus_kategori_<?php echo $d['kategori_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusKategoriLabel_<?php echo $d['kategori_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                  <div class="modal-content shadow" style="border-radius: 10px;">
                                    
                                    <div class="modal-body text-center" style="border-radius: 10px;">
                                      <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                                      <p class="mb-0">Yakin ingin menghapus <strong>kategori ini</strong>?</p>
                                    </div>
                                    
                                    <div class="modal-footer justify-content-center">
                                      <button type="button" class="btn btn-outline-secondary bg-blue  pull-left btn-sm" data-dismiss="modal">
                                        Batal
                                      </button>
                                      <a href="kategori_hapus.php?id=<?php echo $d['kategori_id'] ?>" class="btn btn-danger btn-sm">
                                        Hapus
                                      </a>
                                    </div>

                                  </div>
                                </div>
                              </div>


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