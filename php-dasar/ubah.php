<?php 

session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];


if( isset($_POST["submit"]) ){
	if( ubah($_POST) > 0 ){
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!')
		</script>
		";
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data</title>
</head>
<body>

	<h1 text align="center">Ubah data mahasiswa</h1>

<br><br>
<table>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
		<tr>
			<td><label for="nim">NIM</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nim" id="nim" required value="<?=$mhs["nim"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="nama">Nama</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="nama" id="nama" value="<?=$mhs["nama"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="email">Email</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="email" id="email" value="<?=$mhs["email"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="jurusan">Jurusan</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="jurusan" id="jurusan" value="<?=$mhs["jurusan"]; ?>"></td>
		</tr>
		<tr>
			<td><label for="gambar">Gambar</label></td>
			<td><label>:</label></td>
			<td><img src="foto/<?= $mhs['gambar']; ?>" width="150"></td>
			<td><input type="file" name="gambar" id="gambar"></td>
		</tr>
		<tr>
			<td><button type="submit" name="submit">Ubah</button></td>
		</tr>
	</form>
</table>

</body>
</html>