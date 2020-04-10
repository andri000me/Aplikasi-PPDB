<?php

include('../config/koneksi.php');

require '../vendor/autoload.php';

// // reference the Dompdf namespace
use Dompdf\Dompdf;

// // instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '<style>
    table, th, td {
        padding: 5px;
        vertical-align: top;
    }

</style>

<img src="../assets/img/logo.png" style="float: left; height: 60px;">

<div style="margin-left: 20px">
    <div style="font-size: 18px">Data Pendaftaran Siswa Baru Tahun Pelajaran 2020/2021</div>
    <div style="font-size: 20px"><b>MA NU SUNAN GIRI PRIGEN</b></div>
    <div style="font-size: 12px">Dsn. Talang Ds. Watuagung Kec. Prigen Kab. Pasuruan</div>
</div>

<hr style="border-0,5px solid-black; margin:10px 5px 10px 5px">';

$id_pendaftar = $_GET['id'];
$sql_pendaftar = "SELECT * FROM pendaftar where id='$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);
 
if (!$result_pendaftar) {
    die('Query : ' . mysqli_error($koneksi));
}

$sql_nilai = "SELECT * FROM nilai where pendaftar_id='$id_pendaftar'";
$result_nilai = mysqli_query($koneksi, $sql_nilai);
$data_nilai = mysqli_fetch_array($result_nilai);
 
if (!$result_nilai) {
    die('Query : ' . mysqli_error($koneksi));
}

if($data_pendaftar['foto'] != NULL){
    $gambar ='../uploads/'. $data_pendaftar['foto'];
} else {
    $gambar = '../assets/img/avatar.png';
}

if ($data_pendaftar['jenis_kelamin'] == 'L') {
    $kelamin = "Laki-laki";
} else {
    $kelamin = "Perempuan";
}

if ($data_nilai['status'] == 0) {
    $status = "Pendaftaran Belum Divalidasi";
} else if($data_nilai['status'] == 1) {
    $status = "DITERIMA";
} else {
    $status = "DITOLAK";
}



$html .= '

<div align="center">
    <div style="font-size: 18px">Formulir Pendaftaran Siswa Baru</div>
    <div style="font-size: 20px"><b>MA NU SUNAN GIRI PRIGEN</b></div>
    <div style="font-size: 18px">Tahun Pelajaran 2020/2021</div>
</div>



<h3>A. Data Diri</h3>
<table width="100%">
    <tr>
        <td width="17%">Nama</td>
        <td width="1%">:</td>
        <td width="60%">'. $data_pendaftar['nama'] .'</td>
        <td rowspan="7" align="right"><img src="'. $gambar .'" width="140px" height="160px" ></td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>'. $data_pendaftar['tmpt_lahir'] .', ' . date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])) .'</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>'. $kelamin .'</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>'. $data_pendaftar['alamat'] .'</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>'. $data_pendaftar['agama'] .'</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>'. $data_pendaftar['email'] .'</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>:</td>
        <td>'. $data_pendaftar['telepon'] .'</td>
    </tr>
</table>

<h3>B. Data Nilai</h3>
<table>
    <tr>
        <td width="200px">Nilai Ujian Nasional</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_un'] .'</td>
    </tr>
    <tr>
        <td>Nilai Ujian Sekolah</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_us'] .'</td>
    </tr>
    <tr>
        <td>Nilai Rata-rata</td>
        <td>:</td>
        <td>'. $data_nilai['nilai_rata'] .'</td>
    </tr>
    <tr>
        <td>Hasil</td>
        <td>:</td>
        <td><b>'. $status .'</b></td>
    </tr>
</table>


';






$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
// // $dompdf->stream();
$dompdf->stream("data_pendaftar.pdf", array("Attachment"=>0));


?>


