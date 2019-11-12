<?php  ?>
<div id="menu">
	<h1>Catégories</h1><hr width="20%">

	<ul>
		<li><a href="index.php">Tout</a></li>
		<?php foreach ($categories as $categorie): ?>
			<li><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
		<?php endforeach ?>
	</ul>

	<h1>Principale</h1><hr width="20%">
		<ul>
			<?php 
			require_once 'C:\wamp64\www\mglsi-infos\controleur\Controller.php';
			if(isset($_SESSION['auth'])): ?>
				<li><a href="index.php?action=addArticle">ajouter article</a></li>
				<li><a href="index.php?action=addCategorie">ajouter categorie</a></li>
				<li><a href="index.php?action=logout">deconnexion</a></li>
			<?php else: ?>
					
				<li><a href="index.php?action=login">Connexion</a></li>
				<li><a href="index.php?action=register">Inscription</a></li>
			<?php endif; ?>
			
		</ul>
</div>