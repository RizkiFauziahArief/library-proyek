<?php

session_start();
require 'function.php';

if( isset($_COOKIE['id']) && isset( $_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key =$_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	if( $key === hash('sha256', $row['username']) ){
		$_SESSION['login'] = true;
	}
}

if( isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($result) === 1 ){

		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ){

			$_SESSION["login"] = true;

			if( isset($_POST['remember']) ) {

				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

<h1 text align="center">Halaman Login</h1>

<?php if( isset($error)): ?>
	<p style="color: red; font-style: italic;">username / password salah!</p>
<?php endif; ?>

<br><br>
<center>
<table>
	<form action="" method="post">
		<tr text align="center">
			<td><label for="username">Username</label></td>
			<td><label>:</label></td>
			<td><input type="text" name="username" id="username"></td>
		</tr>
		<tr text align="center">
			<td><label for="password">Password</label></td>
			<td><label>:</label></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr text align="center">
			<td><input type="checkbox" name="remember" id="password"></td>
			<td colspan="2"><label for="remember">Remember me</label></td>
			<td></td>
		</tr>
		<tr text align="center">	
			<td colspan="3"><button type="submit" name="login">Login</button></td>
			<td></td>
			<td></td>
		</tr>
	
	</form>
</table>
</center>

</body>
</html>