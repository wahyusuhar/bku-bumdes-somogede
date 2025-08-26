<?php 
include '../koneksi.php';

$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level    = $_POST['level'];

$rand     = rand();
$allowed  = array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

$pesan    = '';
$tipe     = '';
$redirect = 'user.php';

if ($filename == "") {
    $simpan = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL,'$nama','$username','$password','','$level')");

    if ($simpan) {
        $pesan = 'Pengguna berhasil ditambahkan.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal menambahkan pengguna: ' . mysqli_error($koneksi);
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
} else {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        $pesan = 'Format file tidak didukung. Hanya boleh .gif, .png, .jpg, .jpeg';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    } else {
        $file_gambar = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/' . $file_gambar);

        $simpan = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL,'$nama','$username','$password','$file_gambar','$level')");

        if ($simpan) {
            $pesan = 'Pengguna dengan foto berhasil ditambahkan.';
            $tipe = 'success';
        } else {
            $pesan = 'Gagal menambahkan pengguna: ' . mysqli_error($koneksi);
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
    <title>Tambah Pengguna</title>
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
