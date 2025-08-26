<?php
include '../koneksi.php';

$pesan = '';
$tipe = '';
$redirect = 'transaksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id        = $_POST['id'];
    $tanggal   = $_POST['tanggal'];
    $jenis     = $_POST['jenis'];
    $kategori  = $_POST['kategori'];
    $nominal   = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $bank      = $_POST['bank'];

    // Ambil data transaksi lama
    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_id='$id'");
    $t = mysqli_fetch_assoc($transaksi);
    $bank_lama = $t['transaksi_bank'];

    // Ambil saldo bank lama
    $rekening = mysqli_query($koneksi, "SELECT * FROM bank WHERE bank_id='$bank_lama'");
    $r = mysqli_fetch_assoc($rekening);

    // Kembalikan saldo bank lama
    if ($t['transaksi_jenis'] == "Pemasukan") {
        $kembalikan = $r['bank_saldo'] - $t['transaksi_nominal'];
    } elseif ($t['transaksi_jenis'] == "Pengeluaran") {
        $kembalikan = $r['bank_saldo'] + $t['transaksi_nominal'];
    }

    mysqli_query($koneksi, "UPDATE bank SET bank_saldo='$kembalikan' WHERE bank_id='$bank_lama'");

    // Update saldo bank baru
    $rekening2 = mysqli_query($koneksi, "SELECT * FROM bank WHERE bank_id='$bank'");
    $rr = mysqli_fetch_assoc($rekening2);
    $saldo_sekarang = $rr['bank_saldo'];

    if ($jenis == "Pemasukan") {
        $total = $saldo_sekarang + $nominal;
    } elseif ($jenis == "Pengeluaran") {
        $total = $saldo_sekarang - $nominal;
    }

    mysqli_query($koneksi, "UPDATE bank SET bank_saldo='$total' WHERE bank_id='$bank'");

    // Update data transaksi
    $query = "UPDATE transaksi SET 
                transaksi_tanggal='$tanggal', 
                transaksi_jenis='$jenis', 
                transaksi_kategori='$kategori', 
                transaksi_nominal='$nominal', 
                transaksi_keterangan='$keterangan', 
                transaksi_bank='$bank' 
              WHERE transaksi_id='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $pesan = 'Data transaksi berhasil diperbarui.';
        $tipe = 'success';
    } else {
        $pesan = 'Gagal memperbarui transaksi. Silakan coba lagi.';
        $tipe = 'error';
        $redirect = 'javascript:history.back()';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Transaksi</title>
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
