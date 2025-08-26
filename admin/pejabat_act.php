<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'pejabat.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];

    $simpan = mysqli_query($koneksi, "INSERT INTO pejabat (jabatan, nama) VALUES ('$jabatan', '$nama')");

    if ($simpan) {
        $pesan = 'Pejabat berhasil ditambahkan.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal menambahkan data: ' . mysqli_error($koneksi);
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    Swal.fire({
        icon: '<?= $tipe ?>',
        title: '<?= $tipe === "success" ? "Berhasil" : "Gagal" ?>',
        text: '<?= $pesan ?>',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        window.location.href = '<?= $redirect ?>';
    });
</script>

</body>
</html>
