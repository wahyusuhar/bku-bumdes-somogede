<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Bank
      <small>Data bank</small>
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
            <h3 class="box-title">Data Akun Bank</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Bank
              </button>
            </div>
          </div>
          <div class="box-body">
       

          
            <!-- Modal -->
            <form action="bank_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 500px;">
              <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
                  
                  <!-- Header -->
                  <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                      <i class="fa fa-money"></i> Tambah Bank
                    </h4>
                  </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama bank</label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Nama bank .." style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                      </div>

                      <div class="form-group">
                        <label>Nama Pemilik Rekening</label>
                        <input type="text" name="pemilik" class="form-control" placeholder="Nama pemiliki rekening bank .." style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                      </div>

                      <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="text" name="nomor" class="form-control" placeholder="Nomor rekening bank .." style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
                      </div>

                      <div class="form-group">
                        <label>Saldo Awal</label>
                        <input type="number" name="saldo" required="required" class="form-control" placeholder="Saldo bank .."style="border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);">
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
                    <th width="1%" style="background-color: #00c0ef; color: white; text-align: center">NO</th>
                    <th style="background-color: #00c0ef; color: white; text-align: center">NAMA BANK</th>
                    <th style="background-color: #00c0ef; color: white; text-align: center">PEMILIK REKENING</th>
                    <th style="background-color: #00c0ef; color: white; text-align: center">NOMOR REKENING</th>
                    <th style="background-color: #00c0ef; color: white; text-align: center">SALDO</th>
                    <th width="10%" style="background-color: #00c0ef; color: white; text-align: center">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM bank");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><?php echo $no++; ?></td>
                  <td style="text-align: center; vertical-align: middle;"><?php echo $d['bank_nama']; ?></td>
                  <td style="text-align: center; vertical-align: middle;"><?php echo $d['bank_pemilik']; ?></td>
                  <td style="text-align: center; vertical-align: middle;"><?php echo $d['bank_nomor']; ?></td>
                  <td style="text-align: center; vertical-align: middle;"><?php echo "Rp. ".number_format($d['bank_saldo'])." ,-"; ?></td>
                  <td>
   
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_bank_<?php echo $d['bank_id'] ?>">
                          <i class="fa fa-pencil"></i>
                        </button>

                        <?php 
                        if($d['bank_id'] != 1){
                          ?>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_bank_<?php echo $d['bank_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php
                        }
                        ?>
                        
                        

                        <form action="bank_update.php" method="post">
                          <div class="modal fade" id="edit_bank_<?php echo $d['bank_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="max-width: 500px;">
                          <div class="modal-content box box-primary" style="border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.2);">
                          <div class="modal-header bg-blue" style="border-top-left-radius:10px; border-top-right-radius:10px;">
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">
                                  <i class="fa fa-money"></i> Edit Bank
                                </h4>
                              </div>
                                <div class="modal-body">

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama bank</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama bank .." value="<?php echo $d['bank_id']; ?>">
                                    <input type="text" name="nama" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" required="required" class="form-control" placeholder="Nama bank .." value="<?php echo $d['bank_nama']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Pemilik Rekening</label>
                                    <input type="text" name="pemilik" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" placeholder="Nama pemiliki rekening bank .." value="<?php echo $d['bank_pemilik']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nomor Rekening</label>
                                    <input type="text" name="nomor" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" class="form-control" placeholder="Nomor rekening bank .." value="<?php echo $d['bank_nomor']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Saldo Awal</label>
                                    <input type="number" name="saldo" style="width:100%; border-radius: 25px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" required="required" class="form-control" placeholder="Saldo bank .." value="<?php echo $d['bank_saldo']; ?>">
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
                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_bank_<?php echo $d['bank_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content"  style="border-radius: 10px;">
                          
                              <div class="modal-body text-center" style="border-radius: 10px;">
                              <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                              <p class="mb-0">Yakin ingin menghapus <strong>Transaksi Ini???</strong>?</p>
                              <p>Semua data yang berhubungan dengan akun bank ini akan terhapus.</p>
                            </div>
                            
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary  pull-left bg-blue btn-sm" data-dismiss="modal">Tutup</button>
                                <a href="bank_hapus.php?id=<?php echo $d['bank_id'] ?>" class="btn btn-secondary bg-red btn-sm">Hapus</a>
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