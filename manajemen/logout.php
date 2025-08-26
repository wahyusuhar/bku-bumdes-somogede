<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil Logout',
  text: 'Anda telah keluar dari sistem.',
  showConfirmButton: false,
  timer: 2000
}).then(() => {
  window.location.href = '../index.php';
});
</script>

</body>
</html>
