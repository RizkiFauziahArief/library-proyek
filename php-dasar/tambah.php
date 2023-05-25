<?php 

session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';

if( isset($_POST["submit"]) ){
	if( tambah($_POST) > 0 ){
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!')
		</script>
		";
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data</title>
</head>
<body>

	<h1 text align="center">Tambah data mahasiswa</h1>

<br><br>
<table>
	<form action="" method="post" enctype="multipart/form-data">
		<tr>
			<td><label for="nim">NIM</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nim" id="nim"></td>
		</tr>
		<tr>
			<td><label for="nama">Nama</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama" id="nama"></td>
		</tr>
		<tr>
			<td><label for="email">Email</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="email" id="email"></td>
		</tr>
		<tr>
			<td><label for="jurusan">Jurusan</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="jurusan" id="jurusan"></td>
		</tr>
		<tr>
			<td><label for="gambar">Gambar</label></td>
			<td><label>:</label></td>
			<td><input type="file" name="gambar" id="gambar"></td>
		</tr>
		<tr>
			<td><button type="submit" name="submit">Tambah</button></td>
		</tr>
	</form>
</table>

</body>
</html>