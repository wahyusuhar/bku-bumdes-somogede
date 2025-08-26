




<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'pejabat.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pejabat WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $pesan = 'Data pejabat berhasil dihapus.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal menghapus data. Silakan coba lagi.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
} else {
    $pesan = 'ID tidak ditemukan.';
    $tipe = 'error';
    $redirect = 'javascript:history.back()';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data</title>
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
