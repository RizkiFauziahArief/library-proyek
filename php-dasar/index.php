<?php 

session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';

$jumlahDataPerhalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData =( $jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

if(isset($_POST["cari"]) ){
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 120px;
			position: absolute;
			top: 100px;
			left: 200px;
			z-index: -1;
			display: none;
		}
	</style>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

<h1 text align="center">Data Mahasiswa</h1>

<br><br>
<button>
	<a href="tambah.php">Tambah data mahasiswa</a>
</button>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="30" autofocus="" placeholder="masukan keyword pencarian..." autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari</button>

	<img src="foto/loading.gif" class="loader">
	
</form>
<br>

<div id="container">
<table border="1" cellpadding="10" cellspacing="0" width="100%">
	<tr>
		<th>No.</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
		<th>Gambar</th>
		<th>Aksi</th>
	</tr>

<?php $i = 1; ?>
<?php foreach ($mahasiswa as $row ) : ?>

	<tr>
		<td text align="center"><?= $i; ?></td>
		<td text align="center"><?= $row["nim"]; ?></td>
		<td text align="center"><?= $row["nama"]; ?></td>
		<td text align="center"><?= $row["email"]; ?></td>
		<td text align="center"><?= $row["jurusan"]; ?></td>
		<td text align="center"><img src="foto/<?= $row["gambar"]; ?>" width="120"></td>
		<td text align="center">
			<button><a href="ubah.php?id= <?= $row["id"]; ?>">ubah</a></button>
			<button><a href="hapus.php?id= <?= $row["id"]; ?>">Hapus</a></button>
		</td>
	</tr>

<?php $i++; ?>
<?php endforeach; ?>

</table>
</div>

<br><br>


<center>
<?php if( $halamanAktif > 1 ) : ?>
<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahHalaman; $i++ ) :?>
	<?php if( $i == $halamanAktif) : ?>
	<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>
</center>

<br><br><br>

<table cellspacing="10" cellpadding="0" width="100%" bgcolor="#2f4f4f">
	<tr>
		<td rowspan="2"><img src="foto/LOGOFTI.PNG" alt="LOGOFTI" width="150"></td>
	</tr>
	<tr>
		<td align="right" style="color: white;"><h4>Fakultas Teknologi Informasi
		<br>
		2022
		<br><br>
		<button>
		<a href="logout.php">Logout</a>
		</button><h4>
		</td>
	</tr>
	<tr><td></td></tr>
</table>

</body>
</html>