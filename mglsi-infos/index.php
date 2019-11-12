<?php
	require_once 'controleur/Controller.php';

	$controller = new Controller();

	if (!isset($_GET['action']))
	{
		$controller->showAccueil();
	}
	else
	{
		if (strtolower($_GET['action']) === 'article')
		{
			if (isset($_GET['id']))
			{
				$controller->showArticle($_GET['id']);
			}
			else
			{
				$controller->ShowErrorPage();
			}
		}
		else if (strtolower($_GET['action']) === 'categorie')
		{
			if (isset($_GET['id']))
			{
				$controller->showCategorie($_GET['id']);
			}
			else
			{
				$controller->ShowErrorPage();
			}
		}
		//login
		else if(strtolower($_GET['action']) === 'login')
		{
			$controller->showLogin();
		}
		//register
		else if(strtolower($_GET['action']) === 'register')
		{
			$controller->showRegister();
		}
		//verification des donné register
		else if($_GET['action'] === 'postRegister')
		{
			$controller->postRegister();
		}
		//page admin
		else if($_GET['action'] === 'accountuser')
		{
			$controller->accountuser();
		}
		//verification les information de connexion
		else if($_GET['action'] === 'veriferLogin')
		{
			$controller->veriferLogin();
		}

		else if($_GET['action'] === 'postarticle')
		{
			$controller->postarticle();
		}

		else if($_GET['action'] === 'logout')
		{
			$controller->logout();
		}

		else if($_GET['action'] === 'addArticle')
		{
			$controller->addArticle();
		}
		
		else
		{
			$controller->showAccueil();
		}
	}
?>