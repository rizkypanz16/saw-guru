<?php
session_start();
if ($_SESSION['status'] != "login") {
   header("location:login.php?pesan=belum_login");
}


// Koneksi

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("saw") or die(mysql_error());

//Buat array bobot { C1 = 35%; C2 = 25%; C3 = 25%; dan C4 = 15%.}
$bobot = array(0.30, 0.30, 0.20, 0.20);

//Buat fungsi tampilkan nama
function getNama($id)
{
   $q = mysql_query("SELECT * FROM tb_guru where id_guru = '$id'");
   $d = mysql_fetch_array($q);
   return $d['nama_guru'];
}

echo '<a href="http://localhost/saw/beranda.php">beranda</a><br>';
echo '<a href="http://localhost/saw/proses/hapus_hasil.php">hapus data</a>';

//Setelah bobot terbuat select semua di tabel Matrik
$sql = mysql_query("SELECT * FROM tb_matrik");
//Buat tabel untuk menampilkan hasil
echo "<H3>Matrik Awal</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <td>No</td>
   <td>Nama</td>
   <td>C1</td>
   <td>C2</td>
   <td>C3</td>
   <td>C4</td>
   <td>jumlah poin</td>
  </tr>
  ";
$no = 1;
while ($dt = mysql_fetch_array($sql)) {
   $jumlah = ($dt['kriteria1']) + ($dt['kriteria2']) + ($dt['kriteria3']) + ($dt['kriteria4']);
   echo "<tr>
   <td>$no</td>
   <td>" . getNama($dt['guru']) . "</td>
   <td>$dt[kriteria1]</td>
   <td>$dt[kriteria2]</td>
   <td>$dt[kriteria3]</td>
   <td>$dt[kriteria4]</td>
   <td>$jumlah</td>
  </tr>";
   $no++;
}
echo "</table>";

//Lakukan Normalisasi dengan rumus pada langkah 2
//Cari Max atau min dari tiap kolom Matrik
$crMax = mysql_query("SELECT max(kriteria1) as maxK1, 
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4 
   FROM tb_matrik");
$max = mysql_fetch_array($crMax);

//Hitung Normalisasi tiap Elemen
$sql2 = mysql_query("SELECT * FROM tb_matrik");
//Buat tabel untuk menampilkan hasil
echo "<H3>Matrik Normalisasi</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <td>No</td>
   <td>Nama</td>
   <td>C1</td>
   <td>C2</td>
   <td>C3</td>
   <td>C4</td>
  </tr>
  ";
$no = 1;
while ($dt2 = mysql_fetch_array($sql2)) {
   echo "<tr>
   <td>$no</td>
   <td>" . getNama($dt2['guru']) . "</td>
   <td>" . round($dt2['kriteria1'] / $max['maxK1'], 2) . "</td>
   <td>" . round($dt2['kriteria2'] / $max['maxK2'], 2) . "</td>
   <td>" . round($dt2['kriteria3'] / $max['maxK3'], 2) . "</td>
   <td>" . round($dt2['kriteria4'] / $max['maxK4'], 2) . "</td>
  </tr>";
   $no++;
}
echo "</table>";

//Proses perangkingan dengan rumus langkah 3
$sql3 = mysql_query("SELECT * FROM tb_matrik");
//Buat tabel untuk menampilkan hasil
echo "<H3>Perangkingan</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <td>no</td>
   <td>Nama</td>
   <td>total poin</td>
   <td>SAW</td>
   <td>ket</td>
  </tr>
  ";

//Kita gunakan rumus (Normalisasi x bobot)
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

   foreach ($data as $item) { ?>
      <tr>
         <td><?php echo $no ?></td>
         <td><?php echo $item['nama'] ?></td>
         <td><?php echo $item['jumlah'] ?></td>
         <td><?php echo $item['poin'] ?></td>
         <td><?php echo "$h $juara" ?></td>
      </tr>
<?php
      $no++;
      if ($no >= 4) {
         $h = "  ";
         $juara = " ";
      } else {
         $juara++;
      }
   }
   echo "</table>";
};


?>