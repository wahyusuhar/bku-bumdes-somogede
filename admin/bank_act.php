<?php 
include '../koneksi.php';

$nama    = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$nomor   = $_POST['nomor'];
$saldo   = $_POST['saldo'];

mysqli_query($koneksi, "INSERT INTO bank VALUES (NULL, '$nama', '$pemilik', '$nomor', '$saldo')") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data bank berhasil ditambahkan.',
    showConfirmButton: false,
    timer: 2000
  }).then(() => {
    window.location.href = 'bank.php';
  });
</script>
</body>
</html>
