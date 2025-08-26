<?php 
include '../koneksi.php';

$id      = $_POST['id'];
$nama    = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$nomor   = $_POST['nomor'];
$saldo   = $_POST['saldo'];

mysqli_query($koneksi, "UPDATE bank SET 
  bank_nama='$nama', 
  bank_pemilik='$pemilik', 
  bank_nomor='$nomor', 
  bank_saldo='$saldo' 
  WHERE bank_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data bank berhasil diperbarui.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'bank.php';
  });
</script>
</body>
</html>
