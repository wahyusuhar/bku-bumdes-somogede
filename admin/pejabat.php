<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Pejabat
      <small>Data Sekretaris & Bendahara</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pejabat</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Data Sekretaris & Bendahara</h3>
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambahPejabat">
                <i class="fa fa-plus"></i> &nbsp Tambah Pejabat
              </button>
            </div>
          </div>

          <!-- Modal Tambah Pejabat -->
          <form action="pejabat_act.php" method="post">
            <div class="modal fade" id="modalTambahPejabat" tabindex="-1" role="dialog" aria-labelledby="modalTambahPejabatLabel">
              <div class="modal-dialog" role="document" style="max-width: 450px;">
                <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
                  
                  <!-- Header -->
                  <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Pejabat</h4>
                  </div>

                  <!-- Body -->
                  <div class="modal-body" style="background: #f9f9f9;">
                    <div class="form-group">
                      <label><strong>Jabatan</strong></label>
                      <select name="jabatan" class="form-control" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label><strong>Nama Lengkap</strong></label>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..." required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
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





          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="5%" style="background-color: #00c0ef; color: white;">No</th>
                    <th style="background-color: #00c0ef; color: white;">Jabatan</th>
                    <th style="background-color: #00c0ef; color: white;">Nama</th>
                    <th width="15%" style="background-color: #00c0ef; color: white;">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no = 1;
                  $data = mysqli_query($koneksi, "SELECT * FROM pejabat ORDER BY jabatan");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $d['jabatan']; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td class="text-center">
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_<?php echo $d['id'] ?>">
                          <i class="fa fa-edit"></i>
                        </button>

                        <!-- Tombol Hapus -->
                        <button type="button" class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#hapus_<?php echo $d['id'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>

                      <!-- Modal Edit -->
                    <div class="modal fade" id="edit_<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_<?php echo $d['id']; ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document" style="max-width: 450px;">
                        <form action="pejabat_update.php" method="POST">
                          <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">

                            <!-- Modal Header -->
                            <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" id="editModalLabel_<?php echo $d['id']; ?>">
                                <i class="fa fa-edit"></i> Edit Pejabat
                              </h4>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body" style="background: #f9f9f9;">
                              <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                              <div class="form-group">
                                <label for="jabatan_<?php echo $d['id']; ?>"><strong>Jabatan</strong></label>
                                <select name="jabatan" id="jabatan_<?php echo $d['id']; ?>" class="form-control" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                                  <option value="Sekretaris" <?php echo ($d['jabatan'] == 'Sekretaris') ? 'selected' : ''; ?>>Sekretaris</option>
                                  <option value="Bendahara" <?php echo ($d['jabatan'] == 'Bendahara') ? 'selected' : ''; ?>>Bendahara</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="nama_<?php echo $d['id']; ?>"><strong>Nama Lengkap</strong></label>
                                <input type="text" name="nama" id="nama_<?php echo $d['id']; ?>" class="form-control" value="<?php echo htmlspecialchars($d['nama']); ?>" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
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

                      <!-- Modal Hapus -->
                      <div class="modal fade" id="hapus_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel_<?php echo $d['id'] ?>" aria-hidden="true" >
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content"  style="border-radius: 10px;">
                        
                            <div class="modal-body text-center" style="border-radius: 10px;">
                              <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                              <p class="mb-0">Yakin ingin menghapus <strong>pejabat ini</strong>?</p>
                            </div>
                            <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-outline-secondary  pull-left bg-blue btn-sm" data-dismiss="modal">
                                Batal
                              </button>
                              <a href="pejabat_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-danger btn-sm">
                                Hapus
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>


                  <?php } ?>
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
