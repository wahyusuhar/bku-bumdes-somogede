<?php 
include '../koneksi.php';
$id = $_GET['id'];

// Proses hapus data
mysqli_query($koneksi, "DELETE FROM piutang WHERE piutang_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Dihapus</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Data Dihapus!',
    text: 'Data piutang berhasil dihapus.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'piutang.php';
  });
</script>
</body>
</html>
