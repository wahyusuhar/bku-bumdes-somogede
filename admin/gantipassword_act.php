<?php 
include '../koneksi.php';
session_start();

$pesan = '';
$tipe = '';
$redirect = 'gantipassword.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "UPDATE user SET user_password='$password' WHERE user_id='$id'");

    if ($query) {
        $pesan = 'Password berhasil diubah.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal mengubah password: ' . mysqli_error($koneksi);
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>
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
