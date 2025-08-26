<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Piutang
      <small>Data Piutang</small>
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
            <h3 class="box-title">Catatan Piutang</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Piutang
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="piutang_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
                <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" style="text-align: center;">
                      <i class="fa fa-money"></i> Tambah Piutang
                    </h4>
                  </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" name="tanggal" required="required" class="form-control datepicker2" style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                      </div>

                      <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal .." style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                      </div>

                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="4"  style="border-radius: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);"></textarea>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary bg-red" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%"style="background-color: #00c0ef; color: white;">NO</th>
                    <th width="1%"style="background-color: #00c0ef; color: white;">KODE</th>
                    <th width="10%" class="text-center"style="background-color: #00c0ef; color: white;">TANGGAL</th>
                    <th class="text-center"style="background-color: #00c0ef; color: white;">KETERANGAN</th>
                    <th class="text-center"style="background-color: #00c0ef; color: white;">NOMINAL</th>
                    <th width="10%" class="text-center"style="background-color: #00c0ef; color: white;">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM piutang");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td>PTG-000<?php echo $d['piutang_id']; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['piutang_tanggal'])); ?></td>
                      <td><?php echo $d['piutang_keterangan']; ?></td>
                      <td class="text-center"><?php echo "Rp. ".number_format($d['piutang_nominal'])." ,-"; ?></td>
                      <td>    

                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_piutang_<?php echo $d['piutang_id'] ?>">
                        <i class="fa fa-pencil"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_piutang_<?php echo $d['piutang_id'] ?>">
                        <i class="fa fa-trash"></i>
                      </button>


                      <form action="piutang_update.php" method="post">
                        <div class="modal fade" id="edit_piutang_<?php echo $d['piutang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
                          <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                <h4 class="modal-title" id="exampleModalLabel">Edit piutang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['piutang_id'] ?>">
                                  <input type="text" style="width:100%; border-radius: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" name="tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['piutang_tanggal'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Nominal</label>
                                  <input type="number" style="width:100%; border-radius: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['piutang_nominal'] ?>">
                                </div>

                                <div class="form-group" style="width:100%">
                                  <label>Keterangan</label>
                                  <textarea name="keterangan" style="width:100%; border-radius: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" rows="4"><?php echo $d['piutang_keterangan'] ?></textarea>
                                </div>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary bg-red" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

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

                      <!-- modal hapus -->
                      <div class="modal fade" id="hapus_piutang_<?php echo $d['piutang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                      <div class="modal-content"  style="border-radius: 10px;">
                        
                            <div class="modal-body text-center" style="border-radius: 10px;">
                              <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                              <p class="mb-0">Yakin ingin menghapus <strong>Piutang ini</strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary bg-red" data-dismiss="modal">Tutup</button>
                              <a href="piutang_hapus.php?id=<?php echo $d['piutang_id'] ?>" class="btn btn-primary">Hapus</a>
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
<?php include 'footer.php'; ?>s