<?php 
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'kategori.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ubah transaksi yang pakai kategori ini ke kategori ID 1
    $update = mysqli_query($koneksi, "UPDATE transaksi SET transaksi_kategori='1' WHERE transaksi_kategori='$id'");

    // Hapus kategori
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$id'");

    if ($update && $delete) {
        $pesan = 'Kategori berhasil dihapus.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal menghapus kategori.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
} else {
    $pesan = 'ID kategori tidak ditemukan.';
    $tipe = 'warning';
    $redirect = 'kategori.php';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Kategori</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    Swal.fire({
        icon: '<?= $tipe ?>',
        title: '<?= ucfirst($tipe) ?>',
        text: '<?= $pesan ?>',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        window.location.href = '<?= $redirect ?>';
    });
</script>

</body>
</html>
