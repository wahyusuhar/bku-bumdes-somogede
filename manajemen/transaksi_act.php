<?php 
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'transaksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal    = $_POST['tanggal'];
    $jenis      = $_POST['jenis'];
    $kategori   = $_POST['kategori'];
    $nominal    = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $bank       = $_POST['bank'];

    $rekening = mysqli_query($koneksi, "SELECT * FROM bank WHERE bank_id='$bank'");
    $r = mysqli_fetch_assoc($rekening);

    if ($r) {
        $saldo_sekarang = $r['bank_saldo'];

        if ($jenis == "Pemasukan") {
            $total = $saldo_sekarang + $nominal;
        } elseif ($jenis == "Pengeluaran") {
            $total = $saldo_sekarang - $nominal;
        }

        $update_saldo = mysqli_query($koneksi, "UPDATE bank SET bank_saldo='$total' WHERE bank_id='$bank'");

        if ($update_saldo) {
            $simpan = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL,'$tanggal','$jenis','$kategori','$nominal','$keterangan','$bank')");

            if ($simpan) {
                $pesan = 'Transaksi berhasil ditambahkan.';
                $tipe = 'success';
            } else {
                $pesan = 'Gagal menyimpan transaksi: ' . mysqli_error($koneksi);
                $tipe = 'error';
                $redirect = 'javascript:history.back()';
            }
        } else {
            $pesan = 'Gagal memperbarui saldo bank: ' . mysqli_error($koneksi);
            $tipe = 'error';
            $redirect = 'javascript:history.back()';
        }
    } else {
        $pesan = 'Data bank tidak ditemukan.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
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
