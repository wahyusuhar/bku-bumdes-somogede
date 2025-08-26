<?php 
include '../koneksi.php';

$id         = $_POST['id'];
$tanggal    = $_POST['tanggal'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];

$update = mysqli_query($koneksi, "UPDATE hutang SET 
    hutang_tanggal='$tanggal', 
    hutang_nominal='$nominal', 
    hutang_keterangan='$keterangan' 
    WHERE hutang_id='$id'") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Hutang</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data hutang berhasil diperbarui.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'hutang.php';
  });
</script>
</body>
</html>
