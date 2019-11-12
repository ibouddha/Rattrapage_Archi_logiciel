<?php 
require_once 'ConnexionManager.php';
require_once 'controleur/Controller.php';

/*
gestion des utilisateur
*/
	
	class UserDao
	{
		private $bdd;

		public function __construct()
		{
			$this->bdd = (new ConnexionManager)->getInstance();
		}

		public function getListUser()
		{
			$data = $this->bdd->query('SELECT * FROM users');
			return $data->fetchAll(PDO::FETCH_CLASS, 'Users');
		}

		public function ajouterUser()
		{
			$controleur = new Controller();
			$token = $controleur->str_random(60);
			
			$password = password_hash ($_POST['password'] , PASSWORD_BCRYPT );

			$data = $this->bdd->prepare("INSERT INTO users (nom, prenom, email, status, password, token) VALUES(?, ?, ?, ?, ?, ?)");
			$data->execute(array($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['status'], $password , $token));

			return $data->fetchAll(PDO::FETCH_CLASS, 'Users');
		}
		/*
			verifier un utilisateur
		*/
		public function verifyUser()
		{
			$data = $this->bdd->prepare('SELECT * FROM users WHERE email = :email');
			$data->execute(['email' => $_POST['email']]);
							
			$users = $data->fetch();
			return $data->fetch(PDO::FETCH_ASSOC);
		}

		public function getListUsers()
		{
			$data = $this->bdd->query('SELECT * FROM users');
			return $data->fetchAll(PDO::FETCH_CLASS, 'Users');
		}

		
	}
 ?>