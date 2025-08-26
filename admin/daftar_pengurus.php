<?php
$file = 'pengurus.json';
$pengurus = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengurus</title>
</head>
<body>
    <h2>Daftar Sekretaris dan Bendahara</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama Sekretaris</th>
            <th>Nama Bendahara</th>
            <th>Tanggal Input</th>
        </tr>
        <?php if (count($pengurus) > 0): ?>
            <?php foreach ($pengurus as $index => $p): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($p['sekretaris']) ?></td>
                    <td><?= htmlspecialchars($p['bendahara']) ?></td>
                    <td><?= $p['waktu'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Belum ada data pengurus</td></tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="tambah_pengurus.php">Tambah Pengurus Baru</a>
</body>
</html>
