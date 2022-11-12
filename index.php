<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="./css/style.css">

	<link rel="icon" href="./images/favicon.ico">
	<title>IFLAB TV</title>
</head>

<body class="bg-light p-5">
	<div class="row wrap">
		<div class="col-lg-2"><img src="./images/informatika.png" class="img-fluid" style="margin-top: -10px"></div>
		<div class="col-lg-9 height-card-1 mb-3 text-center">
			<h1>Informatics Laboratory TV</h1>
		</div>
		<div class="col-lg-1"><img src="./images/logo.png" class="img-fluid" style="margin-top: -40px; height: 130px;"></div>
		<div class="col-lg-9">
			<div class="embed-responsive embed-responsive-16by9 video-position card">
				<video class="embed-responsive-item rounded-3 col-lg-12 video-iflab" autoplay controls loop>
					<?php
					if (date('l') == "Monday") { ?>
						<source src="./IFLAB-1.mp4" type="video/mp4">
					<?php } else if (date('l') == "Tuesday") { ?>
						<source src="./IFLAB-2.mp4" type="video/mp4">
					<?php } else if (date('l') == "Wednesday") { ?>
						<source src="./IFLAB-3.mp4" type="video/mp4">
					<?php } else if (date('l') == "Thursday") { ?>
						<source src="./IFLAB-4.mp4" type="video/mp4">
					<?php } else if (date('l') == "Friday") { ?>
						<source src="./IFLAB-5.mp4" type="video/mp4">
					<?php } else { ?>
						<source src="./IFLAB-6.mp4" type="video/mp4">
					<?php } ?>
				</video>
			</div>
		</div>
		<div class="col-lg-3 card ps-4 pe-4">
			<h3 class="mt-4 mb-3 text-center">Si Paling Ambis</h3>
			<div class="row m-2 pt-2 pb-2 bg-warning">
				<div class="col-lg-5 fw-bolder">Nama</div>
				<div class="col-lg-7 fw-bolder">Sanksi</div>
			</div>
			<marquee class="col-lg-12" direction="up" behavior="alternate" height="670px" scrollamount="30">
				<?php
				include './conn.php';
				$sql = "SELECT * FROM tv_matkul";
				$menu = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($menu)) { ?>
					<div class="row m-2 pt-2 pb-2 bg-primary text-white bg-dark fw-bolder">
						<div class="col-lg-12 text-center"><?= $row['matkul'] ?></div>
					</div>
					<?php
					include './conn.php';
					$sqls = "SELECT * FROM tv_pelanggar WHERE matkul='" . $row['matkul'] . "'";
					$menus = mysqli_query($conn, $sqls);
					while ($rows = mysqli_fetch_array($menus)) { ?>
						<div class="row m-2 pt-2 pb-2 bg-primary text-white">
							<div class="col-lg-5"><?= $rows['nama'] ?></div>
							<div class="col-lg-7"><?= $rows['keterangan'] ?></div>
						</div>
				<?php
					}
				}
				$conn->close();
				?>
			</marquee>
			<span class="mt-3 fw-bold text-danger">* CUKUP DILIHAT, TIDAK UNTUK DISEBAR!!!</span>
		</div>
		<div class="row col-lg-12 card mt-3 height-card-2 ms-0">
			<div class="col-lg-1 fw-bold border-end border-2">Informatics Lab</div>
			<marquee class="col-lg-11">
				Selamat datang di Informatics Laboratory. Hari ini tanggal <?= date("d-m-Y") ?>. Telah tertangkap tangan beberapa mahasiswa Fakulas Informaika yang telah melakukan tindak kecurangan selama pelaksanaan praktikum. Sanksi diberikan sesuai dengan ketentuan dari IFLAB, dan mahasiswa yang tertangkap akan mendapatkan surat peringatan (SP) dari fakultas. Bagi yang merasa keberatan dengan hasil yang telah diputuskan, silahkan hubungi ASLAB.
			</marquee>
		</div>
	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>