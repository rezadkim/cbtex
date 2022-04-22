<?php
error_reporting(E_ALL ^ E_NOTICE);
    $servername = "localhost";
    $database = "cbtcandy25";
    $username = "root";
    $password = "";

    // untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
    // membuat koneksi
    $koneksi = mysqli_connect($servername, $username, $password, $database);
    // mengecek koneksi
    if (!$koneksi) {
        $stat = "<span class='badge bg-danger'>Koneksi Gagal</span>";
        die(mysqli_connect_error());
    }
    $stat = "<span class='badge bg-success'>Koneksi Berhasil</span>";
    
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tembak Jawaban</title>
  </head>
  <body>
      
    <table border="1">
        <thead>
            <tr>
                <th width='5px'>#</th>
                <th>Mata Pelajaran</th>
                <th>Soal PG</th>
                <th>Soal Esai</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mapelQ = mysqli_query($koneksi, "SELECT * FROM mapel ORDER BY date ASC");
            ?>
            <?php while ($mapel = mysqli_fetch_array($mapelQ)) : ?>
                <?php
                    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM soal WHERE id_mapel='$mapel[id_mapel]'"));
                    $no++;
                    ?>
                <tr>
                <td><?= $no ?></td>
                <td>
                    <?php
                        if ($mapel['idpk'] == 'semua') :
                            $jur = 'Semua';
                        else :
                            $jur = $mapel['idpk'];
                        endif;
                    ?>
                    <b><small><?= $mapel['nama'] ?></small></b>
                    <small><?= $mapel['level'] ?></small>
                    <small><?= $jur ?></small>
				</td>
				<td>
                    <small><?= $mapel['tampil_pg'] ?>/<?= $mapel['jml_soal'] ?></small>
                    <small><?= $mapel['bobot_pg'] ?> %</small>
                    <small><?= $mapel['opsi'] ?> opsi</small>
                </td>
                <td>
                    <small><?= $mapel['tampil_esai'] ?>/<?= $mapel['jml_esai'] ?></small>
                    <small><?= $mapel['bobot_esai'] ?> %</small>
                </td>
                <td>
                    <?php
                        $dataArray = unserialize($mapel['kelas']);
                        foreach ($dataArray as $key => $value) :
                            echo "<small>$value </small>&nbsp;";
                        endforeach;
                    ?>
                </td>
                <?php
                    if ($cek <> 0) {
                        if ($mapel['status'] == '0') :
                            $status = '<label>non aktif</label>';
                        else :
                            $status = '<label> aktif </label>';
                        endif;
                    } else {
                        $status = '<label> Soal Kosong </label>';
                    }
                    $guruku = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengawas WHERE id_pengawas = '$mapel[idguru]'"));
                ?>
                <td>
                    <small><?= $guruku['nama'] ?></small>
                </td>
                <td style="text-align:center">
                    <?= $status ?>
                </td>
                <td style="text-align:center">
                    <div class=''>
                        <a href='regular-light.php?id=<?= $mapel['id_mapel'] ?>'><button>Lihat Soal & Jawaban</button></a>
                    </div>
                </td>
			</tr>
		    <?php endwhile; ?>
        </tbody>
    </table>
  </body>
</html>
