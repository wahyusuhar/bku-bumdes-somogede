<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'pejabat.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];

    $query = "UPDATE pejabat SET jabatan='$jabatan', nama='$nama' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $pesan = 'Data pejabat berhasil diperbarui.';
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
    <title>Update Data</title>
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
    window.location.href = 'pejabat.php';
});
</script>

</body>
</html>
