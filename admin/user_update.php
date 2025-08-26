<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $password = md5($pwd);
    $level = $_POST['level'];

    // Cek upload file
    $rand = rand();
    $allowed = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['foto']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $query = "";
    if ($pwd == "" && $filename == "") {
        // Tidak ubah password & foto
        $query = "UPDATE user SET user_nama='$nama', user_username='$username', user_level='$level' WHERE user_id='$id'";
    } elseif ($pwd == "") {
        // Ubah foto saja
        if (!in_array($ext, $allowed)) {
            $pesan = 'Format foto tidak didukung.';
            $tipe = 'error';
            $redirect = 'javascript:history.back()';
        } else {
            $x = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/' . $x);
            $query = "UPDATE user SET user_nama='$nama', user_username='$username', user_foto='$x', user_level='$level' WHERE user_id='$id'";
        }
    } elseif ($filename == "") {
        // Ubah password saja
        $query = "UPDATE user SET user_nama='$nama', user_username='$username', user_password='$password', user_level='$level' WHERE user_id='$id'";
    } else {
        // Ubah semua
        if (!in_array($ext, $allowed)) {
            $pesan = 'Format foto tidak didukung.';
            $tipe = 'error';
            $redirect = 'javascript:history.back()';
        } else {
            $x = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/' . $x);
            $query = "UPDATE user SET user_nama='$nama', user_username='$username', user_password='$password', user_foto='$x', user_level='$level' WHERE user_id='$id'";
        }
    }

    if ($query !== "") {
        $simpan = mysqli_query($koneksi, $query);
        if ($simpan) {
            $pesan = 'Data user berhasil diupdate.';
            $tipe = 'success';
        } else {
            $pesan = 'Gagal mengupdate data: ' . mysqli_error($koneksi);
            $tipe = 'error';
            $redirect = 'javascript:history.back()';
        }
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
        window.location.href = '<?= $redirect ?>';
    });
</script>

</body>
</html>
