<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<?php require_once 'inc/entete.php'; ?>
<div id="contenu">
	<h1>Connexion</h1><hr>

		<form method="post" action="index.php?action=veriferLogin">
			<table>
				<tr>
					<td>email</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="valider" value="Login"></td>
				</tr>
			</table>
		</form>
</div>

	<?php 
		require_once 'inc/menu.php'; 
	?>
</body>
</html><?php 



 ?>