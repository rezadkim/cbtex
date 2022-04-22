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
  <?php
		$id_mapel = $_GET['id'];
		if (isset($_REQUEST['tambah'])) {
			$sip = $_SERVER['SERVER_NAME'];
			$smax = mysqli_query($koneksi, "SELECT max(qid) AS maxi FROM savsoft_qbank");
			while ($hmax = mysqli_fetch_array($smax)) :
				$jumsoal = $hmax['maxi'];
			endwhile;
			$smaop = mysqli_query($koneksi, "SELECT max(oid) AS maxop FROM savsoft_options");
			while ($hmaop = mysqli_fetch_array($smaop)) {
				$jumop = $hmaop['maxop'];
			}

			$b_op = ($jumop != 0) ? ($jumop / $jumsoal) : 0;
			$no = 1;
			$sqlcek = mysqli_query($koneksi, "SELECT * FROM savsoft_qbank");
			while ($r = mysqli_fetch_array($sqlcek)) {
				$s_soal = mysqli_fetch_array(mysqli_query($koneksi, "select * from savsoft_qbank where qid='$no'"));
				$soal_tanya = $s_soal['question'];
				$l_soal = $s_soal['lid'];
				$c_id = $s_soal['cid'];
				$g_soal = $s_soal['description'];
				$g_soal = str_replace(" ", "", $g_soal);
				$smin = mysqli_query($koneksi, " select min(oid) as mini from savsoft_options where qid='$no'");
				while ($hmin = mysqli_fetch_array($smin)) {
					$min_op = $hmin['mini'];
				}
				$sqlopc = mysqli_query($koneksi, " select * from savsoft_options where qid='$no' and oid='$min_op'");
				$ropc = mysqli_fetch_array($sqlopc);
				$opj1 = $ropc['q_option'];
				$opj1 = str_replace(" &ndash;", "-", $opj1);
				$opjs1 = $ropc['score'];
				$fileA = $ropc['q_option_match'];
				$fileA = str_replace(" ", "", $fileA);

				$dele = mysqli_query($koneksi, "DELETE FROM savsoft_options WHERE qid='$no' AND oid='$min_op'");

				$smin = mysqli_query($koneksi, " select min(oid) as mini from savsoft_options where qid='$no'");
				while ($hmin = mysqli_fetch_array($smin)) {
					$min_op = $hmin['mini'];
				}

				$sqlopc = mysqli_query($koneksi, " select * from savsoft_options where qid='$no' and oid='$min_op'");
				$rubah = mysqli_query($koneksi, " select * from savsoft_options where qid='$no'");
				$ck_jum = mysqli_num_rows($rubah);

				$ropc = mysqli_fetch_array($sqlopc);
				$opj2 = $ropc['q_option'];
				$opj2 = str_replace(" &ndash;", "-", $opj2);
				$opjs2 = $ropc['score'];
				$fileB = $ropc['q_option_match'];
				$fileB = str_replace(" ", "", $fileB);


				$dele = mysqli_query($koneksi, " delete from savsoft_options where qid='$no' and oid='$min_op'");

				$smin = mysqli_query($koneksi, " select min(oid) as mini from savsoft_options where qid='$no'");
				while ($hmin = mysqli_fetch_array($smin)) {
					$min_op = $hmin['mini'];
				}

				$sqlopc = mysqli_query($koneksi, " select * from savsoft_options where qid='$no' and oid='$min_op'");
				$ropc = mysqli_fetch_array($sqlopc);
				$opj3 = $ropc['q_option'];
				$opj3 = str_replace(" &ndash;", "-", $opj3);
				$opjs3 = $ropc['score'];
				$fileC = $ropc['q_option_match'];
				$fileC = str_replace(" ", "", $fileC);


				$dele = mysqli_query($koneksi, " delete from savsoft_options where qid='$no' and oid='$min_op'");

				$smin = mysqli_query($koneksi, " select min(oid) as mini from savsoft_options where qid='$no'");
				while ($hmin = mysqli_fetch_array($smin)) {
					$min_op = $hmin['mini'];
				}

				$sqlopc = mysqli_query($koneksi, " select * from savsoft_options where qid='$no' and oid='$min_op'");
				$ropc = mysqli_fetch_array($sqlopc);
				$opj4 = $ropc['q_option'];
				$opj4 = str_replace(" &ndash;", "-", $opj4);
				$opjs4 = $ropc['score'];
				$fileD = $ropc['q_option_match'];
				$fileD = str_replace(" ", "", $fileD);

				$dele = mysqli_query($koneksi, " delete from savsoft_options where qid='$no' and oid='$min_op'");

				$smin = mysqli_query($koneksi, " select min(oid) as mini from savsoft_options where qid='$no'");
				while ($hmin = mysqli_fetch_array($smin)) {
					$min_op = $hmin['mini'];
				}

				$sqlopc = mysqli_query($koneksi, " select * from savsoft_options where qid='$no' and oid='$min_op'");
				$ropc = mysqli_fetch_array($sqlopc);
				$opj5 = $ropc['q_option'];
				$opj5 = str_replace(" &ndash;", "-", $opj5);
				$opjs5 = $ropc['score'];
				$fileE = $ropc['q_option_match'];
				$fileE = str_replace(" ", "", $fileE);


				$dele = mysqli_query($koneksi, " delete from savsoft_options where qid='$no' and oid='$min_op'");

				if ($opjs1 == 1) {
					$kunci = "A";
				}
				if ($opjs2 == 1) {
					$kunci = "B";
				}
				if ($opjs3 == 1) {
					$kunci = "C";
				}
				if ($opjs4 == 1) {
					$kunci = "D";
				}
				if ($opjs5 == 1) {
					$kunci = "E";
				}
				if ($ck_jum !== 0) {
					$jns = "1";
				}
				if ($ck_jum == 0) {
					$jns = "2";
				}
				// $jwb522 = str_replace("&amp;lt;", "<", $jwb521);
				// $jwb422 = str_replace("&amp;lt;", "<", $jwb421);
				// $jwb322 = str_replace("&amp;lt;", "<", $jwb321);
				// $jwb222 = str_replace("&amp;lt;", "<", $jwb221);
				// $jwb122 = str_replace("&amp;lt;", "<", $jwb121);
				$soal_tanya2 = str_replace("&amp;lt;", "<", $soal_tanya);
				// $jwb52 = str_replace("&amp;gt;", ">", $jwb522);
				// $jwb42 = str_replace("&amp;gt;", ">", $jwb422);
				// $jwb32 = str_replace("&amp;gt;", ">", $jwb322);
				// $jwb22 = str_replace("&amp;gt;", ">", $jwb222);
				// $jwb12 = str_replace("&amp;gt;", ">", $jwb122);
				$soal_tanya = str_replace("&amp;gt;", ">", $soal_tanya2);
				$exec = mysqli_query($koneksi, "INSERT INTO soal (id_mapel,nomor,soal,pilA,pilB,pilC,pilD,pilE,jawaban,jenis,file1,fileA,fileB,fileC,fileD,fileE) VALUES ('$id_mapel','$no','$soal_tanya','$opj1','$opj2','$opj3','$opj4','$opj5','$kunci','$jns','$g_soal','$fileA','$fileB','$fileC','$fileD','$fileE')");
				$no++;
			}
			$hasil2 = mysqli_query($koneksi, "TRUNCATE TABLE savsoft_qbank");
			$hasil2 = mysqli_query($koneksi, "TRUNCATE TABLE savsoft_options");
		}
		$namamapel = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"));
		if ($namamapel['jml_esai'] == 0) {
			$hide = 'hidden';
		} else {
			$hide = '';
		}
		?>
    <b>A. Soal Pilihan Ganda</b>
						<table class='table table-bordered table-striped'>
							<tbody>
								<?php $soalq = mysqli_query($koneksi, "SELECT * FROM soal where id_mapel='$id_mapel' and jenis='1' order by nomor "); ?>
								<?php while ($soal = mysqli_fetch_array($soalq)) : ?>
									<tr>
										<td style='width:30px'>
											<?= $soal['nomor'] ?>
										</td>
										<td style="text-align:justify">
											<?php
													if ($soal['file'] <> '') :
														$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
														$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
														$ext = explode(".", $soal['file']);
														$ext = end($ext);
														if (in_array($ext, $image)) {
															echo "<p style='margin-bottom: 5px'><img src='$homeurl/files/$soal[file]' style='max-width:200px;'/></p>";
														} elseif (in_array($ext, $audio)) {
															echo "<p style='margin-bottom: 5px'><audio controls><source src='$homeurl/files/$soal[file]' type='audio/$ext'>Your browser does not support the audio tag.</audio></p>";
														} else {
															echo "File tidak didukung!";
														}
													endif;
													?>
											<?= $soal['soal']; ?>
											<?php
													if ($soal['file1'] <> '') :
														$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
														$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
														$ext = explode(".", $soal['file1']);
														$ext = end($ext);
														if (in_array($ext, $image)) {
															echo "<p style='margin-top: 5px'><img src='$homeurl/files/$soal[file1]' style='max-width:200px;' /></p>";
														} elseif (in_array($ext, $audio)) {
															echo "<p style='margin-top: 5px'><audio controls><source src='$homeurl/files/$soal[file1]' type='audio/$ext'>Your browser does not support the audio tag.</audio></p>";
														} else {
															echo "File tidak didukung!";
														}
													endif;
													?>
											<table width=100%>
												<tr>
													<td style="padding: 3px;width: 2%; vertical-align: text-top;">A.</td>
													<td style="padding: 3px;width: 31%; vertical-align: text-top;">
														<?php
																if ($soal['pilA'] <> '') {
																	echo "$soal[pilA]<br>";
																}
																if ($soal['fileA'] <> '') {
																	$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																	$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																	$ext = explode(".", $soal['fileA']);
																	$ext = end($ext);
																	if (in_array($ext, $image)) {
																		echo "<img src='$homeurl/files/$soal[fileA]' style='max-width:100px;'/>";
																	} elseif (in_array($ext, $audio)) {
																		echo "<audio controls><source src='$homeurl/files/$soal[fileA]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																	} else {
																		echo "File tidak didukung!";
																	}
																}
																?>
													</td>
													<td style="padding: 3px;width: 2%; vertical-align: text-top;">C.</td>
													<td style="padding: 3px;width: 31%; vertical-align: text-top;">
														<?php
																if (!$soal['pilC'] == "") {
																	echo "$soal[pilC]<br>";
																}
																if ($soal['fileC'] <> '') {
																	$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																	$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																	$ext = explode(".", $soal['fileC']);
																	$ext = end($ext);
																	if (in_array($ext, $image)) {
																		echo "<img src='$homeurl/files/$soal[fileC]' style='max-width:100px;' />";
																	} elseif (in_array($ext, $audio)) {
																		echo "<audio controls><source src='$homeurl/files/$soal[fileC]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																	} else {
																		echo "File tidak didukung!";
																	}
																}
																?>
													</td>
													<?php if ($namamapel['opsi'] == 5) : ?>
														<td style="padding: 3px;width: 2%; vertical-align: text-top;">E.</td>
														<td style="padding: 3px; vertical-align: text-top;">
															<?php
																		if (!$soal['pilE'] == "") {
																			echo "$soal[pilE]<br>";
																		}
																		if ($soal['fileE'] <> '') {
																			$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																			$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																			$ext = explode(".", $soal['fileE']);
																			$ext = end($ext);
																			if (in_array($ext, $image)) {
																				echo "<img src='$homeurl/files/$soal[fileE]' style='max-width:100px;' />";
																			} elseif (in_array($ext, $audio)) {
																				echo "<audio controls><source src='$homeurl/files/$soal[fileE]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																			} else {
																				echo "File tidak didukung!";
																			}
																		}
																		?>
														</td>
													<?php endif; ?>
												</tr>
												<tr>
													<td style="padding: 3px;width: 2%; vertical-align: text-top;">B.</td>
													<td style="padding: 3px;width: 31%; vertical-align: text-top;">
														<?php
																if (!$soal['pilB'] == "") {
																	echo "$soal[pilB]<br>";
																}
																if ($soal['fileB'] <> '') {
																	$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																	$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																	$ext = explode(".", $soal['fileB']);
																	$ext = end($ext);
																	if (in_array($ext, $image)) {
																		echo "<img src='$homeurl/files/$soal[fileB]' style='max-width:100px;' />";
																	} elseif (in_array($ext, $audio)) {
																		echo "<audio controls><source src='$homeurl/files/$soal[fileB]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																	} else {
																		echo "File tidak didukung!";
																	}
																}
																?>
													</td>
													<?php if ($namamapel['opsi'] <> 3) : ?>
														<td style="padding: 3px;width: 2%; vertical-align: text-top;">D.</td>
														<td style="padding: 3px;width: 31%; vertical-align: text-top;">
															<?php
																		if (!$soal['pilD'] == "") {
																			echo "$soal[pilD]<br>";
																		}
																		if ($soal['fileD'] <> '') {
																			$audio = array('mp3', 'wav', 'ogg', 'MP3', 'WAV', 'OGG');
																			$image = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP');
																			$ext = explode(".", $soal['fileD']);
																			$ext = end($ext);
																			if (in_array($ext, $image)) {
																				echo "<img src='$homeurl/files/$soal[fileD]' style='max-width:100px;' />";
																			} elseif (in_array($ext, $audio)) {
																				echo "<audio controls><source src='$homeurl/files/$soal[fileD]' type='audio/$ext'>Your browser does not support the audio tag.</audio>";
																			} else {
																				echo "File tidak didukung!";
																			}
																		}
																		?>
														</td>
													<?php endif; ?>
												</tr>
												<tr>
													<td colspan='2' style="padding: 3px;vertical-align: text-top;">
														Kunci : <?= $soal['jawaban']; ?>
													</td>
												</tr>
											</table>
										</td>
										<td style='width:30px'>
											<a><button class='btn bg-maroon btn-sm' data-toggle='modal' data-target="#hapus<?= $soal['nomor'] ?>"><i class='fa fa-trash-o'></i></button></a>
										</td>
									</tr>

									<div class='modal fade' id="hapus<?= $soal['nomor'] ?>" style='display: none;'>
										<div class='modal-dialog'>
											<div class='modal-content'>
												<div class='modal-header bg-maroon'>
													<button class='close' data-dismiss='modal'><span aria-hidden='true'><i class='glyphicon glyphicon-remove'></i></span></button>
													<h3 class='modal-title'>Hapus Soal</h3>
												</div>
												<div class='modal-body'>
													<form action='' method='post'>
														<input type='hidden' id='idu' name='idu' value="<?= $soal['id_soal'] ?>" />
														<div class='callout '>
															<h4><?= $info ?></h4>
														</div>
														<div class='modal-footer'>
															<div class='box-tools pull-right '>
																<button type='submit' name='hapus' class='btn btn-sm bg-maroon'><i class='fa fa-trash-o'></i> Hapus</button>
																<button type='button' class='btn btn-default btn-sm pull-left' data-dismiss='modal'>Close</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</tbody>
						</table>
  </body>
</html>
