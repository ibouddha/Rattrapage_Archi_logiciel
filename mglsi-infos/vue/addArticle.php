<?php session_start();
	require_once 'controleur/Controller.php';
	$controleur = new Controller();
	$logged = $controleur->logged_only();

	 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ajouter article</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'inc/entete.php'; ?>

		<div id=contenu>
			<form method="post" action="index.php?action=postarticle">
				<table>
					<tr>
						<td>titre</td>
						<td><input type="text" name="titre"></td>
					</tr>
					<tr>
						<td>contenu</td>
						<td><input type="text" name="contenu"></td>
					</tr>
					<tr>
						<td>categorie</td>
						<td><input type="text" name="categorie"></td>
					</tr>
					<tr>
						<td><input type="submit" name="valider" value="ajouter"></td>
					</tr>
				</table>
			</form>
		</div>

	<?php require_once 'inc/menu.php'; ?>	
</body>
</html><?php 



 ?>