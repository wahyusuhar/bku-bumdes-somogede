<?php 
include '../koneksi.php';

$id = $_GET['id'];

// Update transaksi terkait
mysqli_query($koneksi, "UPDATE transaksi SET transaksi_bank='1' WHERE transaksi_bank='$id'");

// Hapus data bank
mysqli_query($koneksi, "DELETE FROM bank WHERE bank_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hapus Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data bank berhasil dihapus.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'bank.php';
  });
</script>
</body>
</html>
