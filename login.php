<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Sistem Manajemen Keuangan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="./gambar/sistem/logo.png" rel="icon">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background-color: #f5f6fa;
    }

    .wrapper {
      display: flex;
      height: 100vh;
    }

    /* .left {
      flex: 1;
      background: url('./Arsha/assets/img/illustration/login-2.png') no-repeat center center;
      background-size: cover;
    
    } */

    .left {
  flex: 1;
  background: url('./Arsha/assets/img/illustration/login-2.png') no-repeat center center;
  background-size: contain; /* GANTI dari 'cover' ke 'contain' */
  background-repeat: no-repeat;
  background-position: center;
}


    .right {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background-color: #f8f9fd;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
      background: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      border-radius: 6px;
      height: 45px;
      font-size: 13px;
    }

    .btn-login {
      background-color: #1BC1E2FF;
      border: none;
      color: white;
      font-weight: 600;
      font-size: 16px;
      padding: 12px;
      border-radius: 6px;
      width: 100%;
      transition: 0.3s ease;
    }

    .btn-login:hover {
      background-color: #64DEF6FF
    }

    .form-check-label, .forgot-link {
      font-size: 14px;
      color: #666;
    }

    .forgot-link {
      float: right;
    }

    @media (max-width: 768px) {
      .wrapper {
        flex-direction: column;
      }
      .left {
        height: 200px;
      }
    }
  </style>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="wrapper">
  <div class="left"></div>

  <div class="right">
    <div class="login-box">
      <h2>Login</h2>
      <p style="color: orange; font-style: italic;">
                  <i class="fa fa-exclamation-triangle"></i> Untuk mengakses sistem, silakan login dengan username dan password yang telah diberikan oleh admin.
                </p>
   

      <form action="periksa_login.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
       <br>
          <!-- <a href="#" class="forgot-link">Lupa Password?</a> -->
           <br>
        </div>

        <button type="submit" class="btn btn-login">Log In</button>
      </form>
    </div>
  </div>
</div>

<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<?php
if (isset($_GET['alert'])) {
  $alert = htmlspecialchars($_GET['alert']);
  echo "<script>";
  switch ($alert) {
    case 'gagal':
      echo "Swal.fire({
              icon: 'error',
              title: 'Login Gagal',
              text: 'Username atau password salah.',
              customClass: {
                title: 'swal-title-md',
                popup: 'swal-popup-md',
                confirmButton: 'swal-confirm-md'
              }
            });";
      break;
    case 'logout':
      echo "Swal.fire({
              icon: 'success',
              title: 'Berhasil Logout',
              text: 'Anda telah keluar dari sistem.',
              customClass: {
                title: 'swal-title-md',
                popup: 'swal-popup-md',
                confirmButton: 'swal-confirm-md'
              }
            });";
      break;
    case 'belum_login':
      echo "Swal.fire({
              icon: 'warning',
              title: 'Akses Ditolak',
              text: 'Silakan login terlebih dahulu.',
              customClass: {
                title: 'swal-title-md',
                popup: 'swal-popup-md',
                confirmButton: 'swal-confirm-md'
              }
            });";
      break;
  }
  echo "</script>";
}
?>
</body>
</html>
