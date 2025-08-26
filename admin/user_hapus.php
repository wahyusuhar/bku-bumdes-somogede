<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'user.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
    $d = mysqli_fetch_assoc($data);
    $foto = $d['user_foto'];

    // Hapus foto jika ada
    if ($foto != '' && file_exists("../gambar/user/$foto")) {
        unlink("../gambar/user/$foto");
    }

    $hapus = mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$id'");

    if ($hapus) {
        $pesan = 'Data pengguna berhasil dihapus.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal menghapus data: ' . mysqli_error($koneksi);
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
    <title>Hapus Pengguna</title>
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
