<?php 
include '../koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM hutang WHERE hutang_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hapus Hutang</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Data Dihapus!',
    text: 'Data hutang berhasil dihapus.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'hutang.php';
  });
</script>
</body>
</html>
