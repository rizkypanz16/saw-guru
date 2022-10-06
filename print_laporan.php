<?php

require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

include 'koneksi.php';

function getNama($id)
{
    $q = mysql_query("SELECT * FROM tb_guru where id_guru = '$id'");
    $d = mysql_fetch_array($q);
    return $d['nama_guru'];
}
function getPeriode($id)
{
    $q = mysql_query("SELECT * FROM tb_periode where id_periode = '$id'");
    $d = mysql_fetch_array($q);
    return $d['nama_periode'];
}

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("saw") or die(mysql_error());
$periode = $_GET['periode'];
$sql = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru WHERE periode = '" . $periode . "'");
$html = "<h4><center>SDN Sukamenak 09 <br>Data Penilaian Guru Terbaik<br> Periode " . getPeriode($periode) . "</center></h4>";
$html .=
    "
    <style>
    table, th, td {
        font-size: 13px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 4px;
      }
    #atas{
        font-weight: bold;
        background-color: #ADD8E6;
    }
    </style>

    <h5> Data Penilaian Guru</h5>
    <table border=\"1\">
    <tr id=\"atas\">
    <td>No</td>
    <td>Nama</td>
    <td>Kualitas Pengajaran</td>
    <td>Kedisiplinan</td>
    <td>Penilaian Teman Sejawat</td>
    <td>Penilaian Administrasi</td>
    <td>jumlah poin</td>
    </tr>
    ";
$no = 1;
while ($dt = mysql_fetch_array($sql)) {
    $jumlah = ($dt['kriteria1']) + ($dt['kriteria2']) + ($dt['kriteria3']) + ($dt['kriteria4']);
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . getNama($dt['guru']) . "</td>
    <td>" . $dt['kriteria1'] . "</td>
    <td>" . $dt['kriteria2'] . "</td>
    <td>" . $dt['kriteria3'] . "</td>
    <td>" . $dt['kriteria4'] . "</td>
    <td>" . $jumlah . "</td>
    </tr>";
    $no++;
}
$html .= "</table><br>";

// TABLE 2
$crMax = mysql_query("SELECT max(kriteria1) as maxK1, 
                                max(kriteria2) as maxK2,
                                max(kriteria3) as maxK3,
                                max(kriteria4) as maxK4 
                            FROM tb_matrik");
$max = mysql_fetch_array($crMax);
$sql2 = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru WHERE periode = '" . $periode . "'");
$html .=
    "
    <h5> Data Matrik Normalisasi </h5>
    <table border=\"1\">
    <tr id=\"atas\">
    <td>No</td>
    <td>Nama</td>
    <td>Kualitas Pengajaran</td>
    <td>Kedisiplinan</td>
    <td>Penilaian Teman Sejawat</td>
    <td>Penilaian Administrasi</td>
    </tr>
    ";
$no = 1;
while ($dt2 = mysql_fetch_array($sql2)) {
    $html .= "<tr>
        <td>" . $no . "</td>
        <td>" . getNama($dt2['guru']) . "</td>
        <td>" . round($dt2['kriteria1'] / $max['maxK1'], 2) . "</td>
        <td>" . round($dt2['kriteria2'] / $max['maxK2'], 2) . "</td>
        <td>" . round($dt2['kriteria3'] / $max['maxK3'], 2) . "</td>
        <td>" . round($dt2['kriteria4'] / $max['maxK4'], 2) . "</td>
        </tr>";
    $no++;
}
$html .= "</table><br>";

// TABLE3
$sql3 = mysql_query("SELECT * FROM `tb_matrik` JOIN `tb_guru` ON tb_matrik.guru = tb_guru.id_guru WHERE periode = '" . $periode . "'");
//Buat tabel untuk menampilkan hasil
$html .=
    "
    <h5> Data Perangkingan Guru </h5>
    <table border=\"1\">
    <tr id=\"atas\">
    <td>No</td>
    <td>Nama</td>
    <td>total poin</td>
    <td>SAW</td>
    <td>keterangan</td>
    </tr>
    ";

$bobot = array(0.30, 0.30, 0.20, 0.20);
while ($dt3 = mysql_fetch_array($sql3)) {
    $jumlah = ($dt3['kriteria1']) + ($dt3['kriteria2']) + ($dt3['kriteria3']) + ($dt3['kriteria4']);
    $poin = round(
        (($dt3['kriteria1'] / $max['maxK1']) * $bobot[0]) +
            (($dt3['kriteria2'] / $max['maxK2']) * $bobot[1]) +
            (($dt3['kriteria3'] / $max['maxK3']) * $bobot[2]) +
            (($dt3['kriteria4'] / $max['maxK4']) * $bobot[3]),
        3
    );

    $data[] = array(
        'nama' => getNama($dt3['guru']),
        'jumlah' => $jumlah,
        'poin' => $poin
    );
}
if (empty($data)) {
    echo "data kosong <br>";
} else {

    //mengurutkan data
    foreach ($data as $key => $isi) {
        $nama[$key] = $isi['nama'];
        $jlh[$key] = $isi['jumlah'];
        $poin1[$key] = $isi['poin'];
    }
    array_multisort($poin1, SORT_DESC, $jlh, SORT_DESC, $data);
    $no = 1;
    $h = "juara";
    $juara = 1;
    $hr = 1;

    foreach ($data as $item) {
        $html .=
            "<tr>
            <td>" . $no . " </td>
            <td>" . $item['nama'] . "</td>
            <td>" . $item['jumlah'] . "</td>
            <td>" . $item['poin'] . "</td>
            <td>" . $h . "" . $juara . "</td>
        </tr>";
        $no++;
        if ($no >= 4) {
            $h = "  ";
            $juara = " ";
        } else {
            $juara++;
        }
    }
    $html .= "</table>";
};


$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('Laporan - ' . getPeriode($periode) . '.pdf');
