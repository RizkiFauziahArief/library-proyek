<?php

usleep(750000);

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

<style>
	.tabel1 {
	    font-family: sans-serif;
	    color: #444;
	    border-collapse: collapse;
	    width: 100%;
	    border: 1px solid #f2f5f7;
	}
	.tabel1 tr th{
	    background: #4682B4;
	    text-align: center;
	    color: #fff;
	    font-weight: normal;
	}
	.tabel1, th, td {
	    padding: 10px 20px;
	}
	.button {
	    background-color: #87CEFA;
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 14px;
	    margin: 4px 2px;
	    cursor: pointer;
    }
</style>

<table class="tabel1">
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
			<button class="button"><a style="text-decoration: none;" href="ubah.php?id= <?= $row["id"]; ?>">ubah</a></button>
			<button class="button"><a style="text-decoration: none;" href="hapus.php?id= <?= $row["id"]; ?>">Hapus</a></button>
		</td>
	</tr>

<?php $i++; ?>
<?php endforeach; ?>

</table>