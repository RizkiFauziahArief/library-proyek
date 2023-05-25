<?php

usleep(500000);

require '../function.php';

$keyword = $_GET["keyword"];

$query ="SELECT * FROM mahasiswa
			WHERE
		nama LIKE '%$keyword%' OR
		nim LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		jurusan LIKE '%$keyword%'
		";

$mahasiswa = query($query);

?>

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
		<td text align="center"><img src="foto/<?= $row["gambar"]; ?>" width="150"></td>
		<td text align="center">
			<button><a href="ubah.php?id= <?= $row["id"]; ?>">ubah</a></button>
			<button><a href="hapus.php?id= <?= $row["id"]; ?>">Hapus</a></button>
		</td>
	</tr>

<?php $i++; ?>
<?php endforeach; ?>

</table>