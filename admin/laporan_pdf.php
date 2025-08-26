
<?php
// memanggil library FPDF
require('../library/fpdf181/fpdf.php');
include '../koneksi.php'; 

$tgl_dari = $_GET['tanggal_dari'];
$tgl_sampai = $_GET['tanggal_sampai'];




// inisialisasi PDF
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$x = 10; // posisi X logo
$y = 8;  // posisi Y logo
$diameter = 30; // diameter logo

// Logo
$pdf->Image('../gambar/sistem/logo-remove.png', $x, $y, $diameter, $diameter);

// Lebar halaman
$pageWidth = $pdf->GetPageWidth();
$logoWidth = 40;

// Geser X teks agar tidak menabrak logo (mulai dari tengah halaman + margin logo)
$pdf->SetXY($logoWidth, 10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($pageWidth - $logoWidth * 2, 6, 'BADAN USAHA MILIK DESA', 0, 1, 'C');


$pdf->SetFont('Arial', 'B', 18);
$pdf->SetX($logoWidth);
$pdf->Cell($pageWidth - $logoWidth * 2, 8, '" SIDOMAJU "', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetX($logoWidth);
$pdf->Cell($pageWidth - $logoWidth * 2, 8, 'DESA SOMOGEDE KECAMATAN WADASLINTANG', 0, 1, 'C');

$pdf->SetFont('Arial', 'I', 11);
$pdf->SetX($logoWidth);
$pdf->Cell($pageWidth - $logoWidth * 2, 6, 'Alamat : JL. Trimulyo - Lancar Km. 07 Kaburikan RT 002 RW 001 Desa Somogede, Wonosobo -  56365', 0, 1, 'C');

// Garis bawah dua lapis
$garisY = 45;
$marginGaris = 5;
$pdf->SetLineWidth(1);
$pdf->Line($marginGaris, $garisY, $pageWidth - $marginGaris, $garisY); // garis tebal
$pdf->SetLineWidth(0.3);
$pdf->Line($marginGaris, $garisY + 2, $pageWidth - $marginGaris, $garisY + 2); // garis tipis

// Spasi setelah garis
$pdf->Ln(16);

// Judul laporan
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN KEUANGAN', 0, 1, 'C');

// Spasi bawah
$pdf->Cell(5, 5, '', 0, 1);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,6,'DARI TANGGAL',0,0);
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(35,6, date('d-m-Y', strtotime($tgl_dari)) ,0,0);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(35,6,'SAMPAI TANGGAL',0,0);
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(35,6, date('d-m-Y', strtotime($tgl_sampai)) ,0,0);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(35,6,'KATEGORI',0,0);
$pdf->Cell(5,6,':',0,0);

$kategori = $_GET['kategori'];
if($kategori == "semua"){
  $kkk = "SEMUA KATEGORI";
} else {
  $k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
  $kk = mysqli_fetch_assoc($k);
  $kkk = $kk['kategori'];
}
$pdf->Cell(35,6, $kkk ,0,0);

$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,14,'NO',1,0,'C');
$pdf->Cell(35,14,'TANGGAL',1,0,'C');
$pdf->Cell(45,14, 'KATEGORI' ,1,0,'C');
$pdf->Cell(105,14,'KETERANGAN',1,0,'C');
$pdf->Cell(82,7,'JENIS',1,0,'C');
$pdf->Cell(1,7,'',0,1);
$pdf->Cell(195,7,'',0,0);
$pdf->Cell(41,7,'PEMASUKAN',1,0,'C');
$pdf->Cell(41,7,'PENGELUARAN',1,1,'C');
$pdf->Cell(10,0,'',0,1);

$pdf->SetFont('Arial','',10);
$no=1;
$total_pemasukan=0;
$total_pengeluaran=0;

if($kategori == "semua"){
  $data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
}else{
  $data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
}

while($d = mysqli_fetch_array($data)){
  if($d['transaksi_jenis'] == "Pemasukan"){
    $total_pemasukan += $d['transaksi_nominal'];
  } elseif($d['transaksi_jenis'] == "Pengeluaran"){
    $total_pengeluaran += $d['transaksi_nominal'];
  }

  $pdf->Cell(10,7,$no++,1,0,'C');
  $pdf->Cell(35,7,date('d-m-Y', strtotime($d['transaksi_tanggal'])),1,0,'C');
  $pdf->Cell(45,7, $d['kategori'] ,1,0,'C');
  $pdf->Cell(105,7,$d['transaksi_keterangan'],1,0,'C');

  $pem = ($d['transaksi_jenis'] == "Pemasukan") ? "Rp. ".number_format($d['transaksi_nominal'])." ,-":"-";
  $peng = ($d['transaksi_jenis'] == "Pengeluaran") ? "Rp. ".number_format($d['transaksi_nominal'])." ,-":"-";

  $pdf->Cell(41,7,$pem,1,0,'C');
  $pdf->Cell(41,7,$peng,1,1,'C');
  $pdf->Cell(10,0,'',0,1);
}

$pdf->Cell(195,7, "TOTAL" ,1,0,'R');
$pdf->Cell(41,7,"Rp. ".number_format($total_pemasukan)." ,-",1,0,'C');
$pdf->Cell(41,7,"Rp. ".number_format($total_pengeluaran)." ,-",1,1,'C');

$pdf->Cell(10,0,'',0,1);
$pdf->Cell(195,7, "SALDO" ,1,0,'R');
$pdf->Cell(82,7,"Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-",1,0,'C');

// Spasi kosong ke bawah sebelum tanda tangan
$pdf->Cell(10,15,'',0,1);

// Ambil data Sekretaris dan Bendahara
$sekretaris = '';
$bendahara = '';
$query = mysqli_query($koneksi, "SELECT jabatan, nama FROM pejabat WHERE jabatan IN ('Sekretaris', 'Bendahara')");
while ($data = mysqli_fetch_assoc($query)) {
    if ($data['jabatan'] == 'Sekretaris') {
        $sekretaris = $data['nama'];
    } elseif ($data['jabatan'] == 'Bendahara') {
        $bendahara = $data['nama'];
    }
}

// Tanda tangan
$pdf->SetFont('Arial','',10);
$pdf->Cell(140,6,'Sekretaris',0,0,'C');
$pdf->Cell(140,6,'Bendahara',0,1,'C');
$pdf->Cell(140,20,'',0,0,'C');
$pdf->Cell(140,20,'',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140,6, $sekretaris,0,0,'C');
$pdf->Cell(140,6, $bendahara,0,1,'C');

$pdf->Output();
?>
