<?php 
include '../koneksi.php';

$tanggal    = $_POST['tanggal'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "INSERT INTO piutang VALUES (NULL, '$tanggal', '$nominal', '$keterangan')")
    or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Input Berhasil</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data piutang berhasil disimpan.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'piutang.php';
  });
</script>
</body>
</html>
