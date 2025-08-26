
<?php include 'header.php'; ?>




<div class="container-fluid">
<div class="row">

   <div class="col-md-12 col-lg-12" style="margin-top: -90px; ">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pemasukan_hari.png" style="width: 50px;height: auto">
                       </div>
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                           $tanggal = date('Y-m-d');
                           $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'");
                           $p = mysqli_fetch_assoc($pemasukan);
                           ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Pemasukan Hari Ini
                               <a href="bank.php"class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?> <span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pemasukan ini.png" style="width: 50px;height: auto">
                       </div>    
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                        $bulan = date('m');
                        $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                        <p style="margin: 0; font-size: 14px; color: #333;">
                               Pemasukan Bulan Ini
                               <a href="bank.php" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?><span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pemasukan_tahun.png" style="width: 54px;height: auto">
                       </div>
                       <div class="inner">
           
           
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                        $tahun = date('Y');
                        $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Pemasukan Tahun Ini
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?><span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pemasukan_baru.png" style="width: 50px;height: auto">
                       </div>
              
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                        $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Seluruh Pemasukan
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: .8rem; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?><span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
   <br>
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pengeluaran harian.png" style="width: 50px; height: auto">
                       </div>       
                       <div class="progress-detail" style="margin-left: 15px;">
                               <?php 
                              $tanggal = date('Y-m-d');
                              $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and transaksi_tanggal='$tanggal'");
                              $p = mysqli_fetch_assoc($pengeluaran);
                              ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Pengeluaran Harian
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style=" background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none; font-size: 12px;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?><span style="font-size: 1rem; font-weight: normal;">Supplier</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
           
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pengeluaran bulanan.png" style="width: 50px; height: auto">
                       </div>
              
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                           $bulan = date('m');
                           $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan'");
                           $p = mysqli_fetch_assoc($pengeluaran);
                           ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Pengeluaran Bulanan
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: 12px; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?> <span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
           
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/pengeluaran tahunan.png" style="width: 50px; height: auto">
                       </div>
                  
                       <div class="progress-detail" style="margin-left: 15px;">
                           <?php 
                           $tahun = date('Y');
                           $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and year(transaksi_tanggal)='$tahun'");
                           $p = mysqli_fetch_assoc($pengeluaran);
                           ?>
                           <p style="margin: 0; font-size: 14px; color: #333;">
                               Pengeluaran Tahunan
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: 12px; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?> <span style="font-size: 1rem; font-weight: normal;"></span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
           
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700"
               style="height: 90px; border-radius: 10px; overflow: hidden; background: #fff; box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
               
               <div class="card-body" style="padding: 15px; height: 100%; display: flex; align-items: center;">
                   <div class="progress-widget" style="display: flex; align-items: center;">
                       <div class="icon">
                       <img src="../gambar/dashboard/seluruh pengeluaran.png" style="width: 50px; height: auto">
                       </div>

                   
                       <div class="progress-detail" style="margin-left: 15px;">
                       <?php 
                        $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran'");
                        $p = mysqli_fetch_assoc($pengeluaran);
                        ?>
                           <p style="margin: 0; font-size: 13px; color: #333;">
                               Seluruh Pengeluaran 
                               <a href="{{ route('supplier.index') }}" class="small-box-footer"
                                  style="font-size: 12 px; background-color: #0040ff; color: #fff; padding: 2px 6px; border-radius: 4px; text-decoration: none;">
                                   Lihat <i class="fa fa-arrow-circle-right"></i>
                               </a>
                           </p>
                           <h3 style="font-size: 1.9rem; margin-top: 4px; margin-bottom: 0; color: #111; font-weight: bold;">
                           <?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?><span style="font-size: 1rem; font-weight: normal;">Supplier</span>
                           </h3>
                       </div>
                   </div>
               </div>
           </li>
           
           
           
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
 


    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Bulan</b></h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Tahun</b></h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              b
            </div>
          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


        <!-- Calendar -->
        <div class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>
        

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->





  
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


      <?php include 'footer.php'; ?>