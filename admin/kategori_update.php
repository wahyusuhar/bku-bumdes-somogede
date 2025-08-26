<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'kategori.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE kategori SET kategori='$kategori' WHERE kategori_id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $pesan = 'Data kategori berhasil diperbarui.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal memperbarui data. Silakan coba lagi.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Kategori</title>
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
