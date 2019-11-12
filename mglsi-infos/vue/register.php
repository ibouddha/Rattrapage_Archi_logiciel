<?php ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'inc/entete.php'; ?>
	<div id="contenu">
		<h1>Inscription</h1><hr>

			<?php if(!empty($errors)): ?>
		        <div class="alert alert-danger" class="container">
		            <p>Erreur</p>
		            <ul>
		                <?php foreach($errors as $error): ?>
		                    <li><?= $error; ?></li>
		                <?php endforeach; ?>
		            </ul>
		        </div>
		    <?php endif; ?>

		<form method="post" action="index.php?action=postRegister">
			<table>
				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>prenom</td>
					<td><input type="text" name="prenom"></td>
				</tr>
				<tr>
					<td>email</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>status</td>
					<td>
						<select name="status" >  
							<option value=""></option>
		      				<option value="Editeur">Editeur</option>
		      					
		      			</select>
		      		</td>
				</tr>
				<tr>
					<td>password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>password confirmation</td>
					<td><input type="password" name="password2"></td>
				</tr>
				<tr>
					<td><input type="submit" name="valider" value="S'inscrire"></td>
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