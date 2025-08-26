<?php 
include '../koneksi.php';

$tanggal     = $_POST['tanggal'];
$nominal     = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];

// Query tambah data
mysqli_query($koneksi, "INSERT INTO hutang VALUES (NULL,'$tanggal','$nominal','$keterangan')") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Hutang</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Data Tersimpan!',
    text: 'Data hutang berhasil ditambahkan.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'hutang.php';
  });
</script>
</body>
</html>
