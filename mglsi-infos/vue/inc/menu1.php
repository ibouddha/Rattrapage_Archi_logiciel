<?php session_start(); 
	
		?>
<div id="menu">
	<h1>Catégories</h1><hr width="20%">

	<ul>
		<li><a href="index.php">Tout</a></li>
		<?php 
		
		foreach ($categories as $categorie): ?>
			<li><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
		<?php endforeach ?>
	</ul>

	<h1>Principale</h1><hr width="20%">
		<ul>
			
				<li><a href="index.php?action=addArticle">ajouter article</a></li>
				<li><a href="index.php?action=addCategorie">ajouter categorie</a></li>
				<li><a href="index.php?action=logout">deconnexion</a></li>
			
		</ul>
</div>