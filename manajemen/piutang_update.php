<?php 
include '../koneksi.php';
$id        = $_POST['id'];
$tanggal   = $_POST['tanggal'];
$nominal   = $_POST['nominal'];
$keterangan= $_POST['keterangan'];

// Proses update data
mysqli_query($koneksi, "UPDATE piutang SET piutang_tanggal='$tanggal', piutang_nominal='$nominal', piutang_keterangan='$keterangan' WHERE piutang_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Update Berhasil</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Data Diperbarui!',
    text: 'Data piutang berhasil diperbarui.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'piutang.php';
  });
</script>
</body>
</html>
