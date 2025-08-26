<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-lock text-blue"></i> Ganti Password
      <small>Perbarui kata sandi akun anda</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Ganti Password</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-md-6 col-md-offset-3">

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "sukses"){
            echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <i class='fa fa-check-circle'></i> Password anda berhasil diganti!
                  </div>";
          }
        }
        ?>

        <div class="box box-primary" style="border-top: 3px solid #3c8dbc; border-radius: 6px;">
          <div class="box-header with-border text-center">
            <h3 class="box-title text-bold"><i class="fa fa-key"></i> Form Ganti Password</h3>
          </div>
          <div class="box-body">
            <form action="gantipassword_act.php" method="post">
              <div class="form-group has-feedback">
                <label><i class="fa fa-lock"></i> Password Baru</label>
                <input type="password" class="form-control" placeholder="Masukkan password baru ..." name="password" required minlength="5">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-flat">
                  <i class="fa fa-save"></i> Simpan Perubahan
                </button>
              </div>
            </form>
          </div>
        </div>

      </section>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>
