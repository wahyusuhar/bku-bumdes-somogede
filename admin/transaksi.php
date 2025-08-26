<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Transaksi
      <small>Data Transaksi</small>
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
            <h3 class="box-title">Transaksi Pemasukan & Pengeluaran</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Transaksi
              </button>
            </div>
          </div>
          <div class="box-body">

                    <!-- Modal Tambah Transaksi -->
          <form action="transaksi_act.php" method="post">
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 500px;">
                <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">

                  <!-- Header -->
                  <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                      <i class="fa fa-money"></i> Tambah Transaksi
                    </h4>
                  </div>

                  <!-- Body -->
                  <div class="modal-body" style="background: #f9f9f9;">
                    <div class="form-group">
                      <label><strong>Tanggal</strong></label>
                      <input type="text" name="tanggal" required class="form-control datepicker2" style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                    </div>

                    <div class="form-group">
                      <label><strong>Jenis</strong></label>
                      <select name="jenis" class="form-control" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                        <option value="">- Pilih -</option>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label><strong>Kategori</strong></label>
                      <select name="kategori" class="form-control" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                        <option value="">- Pilih -</option>
                        <?php 
                        $kategori = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY kategori ASC");
                        while($k = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label><strong>Nominal</strong></label>
                      <input type="number" name="nominal" required class="form-control" placeholder="Masukkan Nominal" style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                    </div>

                    <div class="form-group">
                      <label><strong>Keterangan</strong></label>
                      <textarea name="keterangan" class="form-control" rows="3" style="border-radius: 15px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);"></textarea>
                    </div>

                    <div class="form-group">
                      <label><strong>Rekening Bank</strong></label>
                      <select name="bank" class="form-control" required style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                        <option value="">- Pilih -</option>
                        <?php 
                        $bank = mysqli_query($koneksi,"SELECT * FROM bank");
                        while($b = mysqli_fetch_array($bank)){
                        ?>
                        <option value="<?php echo $b['bank_id']; ?>"><?php echo $b['bank_nama']; ?></option>
                        <?php } ?>
                      </select>
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
                    <th width="1%" rowspan="2"style="background-color: #00c0ef; color: white;">NO</th>
                    <th width="10%" rowspan="2" class="text-center"style="background-color: #00c0ef; color: white;">TANGGAL</th>
                    <th rowspan="2" class="text-center"style="background-color: #00c0ef; color: white;">KATEGORI</th>
                    <th rowspan="2" class="text-center"style="background-color: #00c0ef; color: white;">KETERANGAN</th>
                    <th colspan="2" class="text-center"style="background-color: #00c0ef; color: white;">JENIS</th>
                    <th rowspan="2" width="10%" class="text-center"style="background-color: #00c0ef; color: white;">OPSI</th>
                  </tr>
                  <tr>
                    <th class="text-center"style="background-color: #16AB08FF; color: white;">PEMASUKAN</th>
                    <th class="text-center"style="background-color: #E80C17FF; color: white;">PENGELUARAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori order by transaksi_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
                      <td><?php echo $d['kategori']; ?></td>
                      <td><?php echo $d['transaksi_keterangan']; ?></td>
                      <td class="text-center">
                        <?php 
                        if($d['transaksi_jenis'] == "Pemasukan"){
                          echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                        }else{
                          echo "-";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($d['transaksi_jenis'] == "Pengeluaran"){
                          echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                        }else{
                          echo "-";
                        }
                        ?>
                      </td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_transaksi_<?php echo $d['transaksi_id'] ?>">
                          <i class="fa fa-pencil"></i>
                        </button>

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_transaksi_<?php echo $d['transaksi_id'] ?>">
                          <i class="fa fa-trash"></i>
                        </button>




                                     <!-- Modal Edit Transaksi -->


                        <form action="transaksi_update.php" method="post">
                        <div class="modal fade" id="edit_transaksi_<?php echo $d['transaksi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="max-width: 500px;">
                            <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">

                              <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">
                                  <i class="fa fa-money"></i> Tambah Transaksi
                                </h4>
                              </div>
                              <div class="modal-body">

                                <div class="form-group" style="width:100%; margin-bottom:20px;">
                                  <label>Tanggal</label>
                                  <input type="hidden" name="id" value="<?php echo $d['transaksi_id'] ?>">
                                  <input type="text" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" name="tanggal" required="required" class="form-control datepicker2" value="<?php echo $d['transaksi_tanggal'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Jenis</label>
                                  <select name="jenis" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" required="required">
                                    <option value="">- Pilih -</option>
                                    <option <?php if($d['transaksi_jenis'] == "Pemasukan"){echo "selected='selected'";} ?> value="Pemasukan">Pemasukan</option>
                                    <option <?php if($d['transaksi_jenis'] == "Pengeluaran"){echo "selected='selected'";} ?> value="Pengeluaran">Pengeluaran</option>
                                  </select>
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Kategori</label>
                                  <select name="kategori" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" required="required">
                                    <option value="">- Pilih -</option>
                                    <?php 
                                    $kategori = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY kategori ASC");
                                    while($k = mysqli_fetch_array($kategori)){
                                      ?>
                                      <option <?php if($d['transaksi_kategori'] == $k['kategori_id']){echo "selected='selected'";} ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori']; ?></option>
                                      <?php 
                                    }
                                    ?>
                                  </select>
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Nominal</label>
                                  <input type="number" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['transaksi_nominal'] ?>">
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Keterangan</label>
                                  <textarea name="keterangan" style="width:100%; border-radius: 14px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" rows="4"><?php echo $d['transaksi_keterangan'] ?></textarea>
                                </div>

                                <div class="form-group" style="width:100%;margin-bottom:20px">
                                  <label>Rekening Bank</label>
                                  <select name="bank" class="form-control" required="required" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                                    <option value="">- Pilih -</option>
                                    <?php 
                                    $bank = mysqli_query($koneksi,"SELECT * FROM bank");
                                    while($b = mysqli_fetch_array($bank)){
                                      ?>
                                      <option <?php if($d['transaksi_bank'] == $b['bank_id']){echo "selected='selected'";} ?> value="<?php echo $b['bank_id']; ?>"><?php echo $b['bank_nama']; ?></option>
                                      <?php 
                                    }
                                    ?>
                                  </select>
                                </div>


                              </div>

                 
                              <div class="modal-footer" style="background: #f5f5f5; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                                <button type="button" class="btn btn-default pull-left bg-red" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Simpan
                              </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

                      
                      

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_transaksi_<?php echo $d['transaksi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content"  style="border-radius: 10px;">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel" style="text-align: center;">Peringatan!</h4>
                              </div>
                              <div class="modal-body text-center" style="border-radius: 10px;">
                              <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                              <p class="mb-0">Yakin ingin menghapus <strong>Transaksi Ini???</strong>?</p>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary pull-left bg-blue btn-sm" data-dismiss="modal">Tutup</button>
                                <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id'] ?>" class="btn btn-secondary bg-red btn-sm">Hapus</a>
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