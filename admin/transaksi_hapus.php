<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'transaksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Ambil data transaksi
    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_id='$id'");
    if (mysqli_num_rows($transaksi) > 0) {
        $t = mysqli_fetch_assoc($transaksi);
        $bank_lama = $t['transaksi_bank'];
        $jenis = $t['transaksi_jenis'];
        $nominal = $t['transaksi_nominal'];

        // Ambil saldo bank lama
        $rekening = mysqli_query($koneksi, "SELECT * FROM bank WHERE bank_id='$bank_lama'");
        if (mysqli_num_rows($rekening) > 0) {
            $r = mysqli_fetch_assoc($rekening);
            $saldo_sekarang = $r['bank_saldo'];

            // Hitung saldo setelah rollback transaksi
            if ($jenis === "Pemasukan") {
                $total = $saldo_sekarang - $nominal;
            } else {
                $total = $saldo_sekarang + $nominal;
            }

            // Update saldo bank
            mysqli_query($koneksi, "UPDATE bank SET bank_saldo='$total' WHERE bank_id='$bank_lama'");

            // Hapus transaksi
            $hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE transaksi_id='$id'");

            if ($hapus) {
                $pesan = 'Transaksi berhasil dihapus.';
                $tipe = 'success';
            } else {
                $pesan = 'Gagal menghapus transaksi.';
                $tipe = 'error';
                $redirect = 'javascript:history.back()';
            }
        } else {
            $pesan = 'Data bank tidak ditemukan.';
            $tipe = 'error';
            $redirect = 'javascript:history.back()';
        }
    } else {
        $pesan = 'Data transaksi tidak ditemukan.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
} else {
    $pesan = 'ID tidak valid.';
    $tipe = 'error';
    $redirect = 'javascript:history.back()';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Transaksi</title>
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
