<?php
	require_once 'modele/dao/ArticleDao.php';
	require_once 'modele/dao/CategorieDao.php';
	require_once 'modele/domaine/Article.php';
	require_once 'modele/domaine/Categorie.php';
	require_once 'modele/dao/UserDao.php';
	require_once 'modele/domaine/Users.php';

	/**
	 * Classe représentant notre controleur principal
	 */
	class Controller
	{
		public $data;
		function __construct()
		{
			
		}

		public function showAccueil()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/accueil.php';
		}

		public function showArticle($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$article = $articleDao->getById($id);
			$categories = $categorieDao->getList();
			require_once 'vue/article.php';
		}

		public function showCategorie($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getByCategoryId($id);
			$categories = $categorieDao->getList();
			require_once 'vue/articleByCategorie.php';
		}

		public function showMenue($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getByCategoryId($id);
			$categories = $categorieDao->getList();
			require_once 'vue/inc/menu1.php';
		}

		public function showLogin()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/login.php';
		}

		public function showRegister()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/register.php';
		}
		//ajouter article
		public function postarticle()
		{
			if($this->verifierDonneesArt($_POST))
			{
				$articleDao = new ArticleDao();
				$categorieDao = new CategorieDao();

				$articles = $articleDao->getList();
				$categories = $categorieDao->getList();
				$addArticle = $articleDao->addArticle();
				//require_once 'vue/addArticle';
				echo "article ajouté avec success";
			}
			else
			{
				require_once 'vue/addArticle';
				echo "echec de l'ajout";
			}
		}

		public function verifierDonneesArt()
		{
			$donneesValides = false;
			if(!empty($_POST)){
				$errors = array();

				if (empty($_POST['titre']) || !preg_match('/^[A-Za-z0-9_]+$/', $_POST['titre']))
				{
	        		$errors['titre'] = "le titre titre est invalide";
	    		}
	    		//meme chose
	    		if (empty($_POST['contenu']))
	    		{
	     		   $errors['contenue'] = "votre contenue est invalide";
	    		} 

	    		if (empty($_POST['categorie']))
	    		{
	     		   $errors['categorie'] = "la categorie est invalide";
	    		} 

	    		if(empty($errors))
	    			$donneesValides = true;
			}
			return $donneesValides;
		}
		//fin ajout de l'article

		public function veriferLogin()
		{//affichage de la liste des articles et categorie
			
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			$userDAO = new UserDao();
		
			
			if(!empty($_POST['valider']))
			{	

				$userDAO->verifyUser();
				$users = $userDAO->verifyUser();
				if(password_verify($_POST['password'], $users['password']) )
				{
					session_start();
					$_SESSION['auth'] = $users;
					
				
					header("location:index.php?action=accountuser");
					$SESSION['flash']['success'] =  "vous etes bien connecter";
					exit();
				}else{
					
					echo "login ou mot de passe incorrect";
					require_once 'vue/login.php';
				}	
					
			}
			
		}//fin de la fonction

		public function accountuser()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/accountuser.php';
		}

		public function addArticle()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/addArticle.php';
		}

		

		public function postRegister()
		{
			if($this->verifierDonnees($_POST))
			{
				$articleDao = new ArticleDao();
				$categorieDao = new CategorieDao();

				$articles = $articleDao->getList();
				$categories = $categorieDao->getList();
				$userDAO = new UserDao();
				$userDAO->ajouterUser();
				
				header("location:index.php?action=login");echo "utilisateur ajouter avec success";
			}
			else
			{
				$articleDao = new ArticleDao();
				$categorieDao = new CategorieDao();

				$articles = $articleDao->getList();
				$categories = $categorieDao->getList();
				require_once 'vue/register.php';
			}
			//Si donnees pas valides afficher le formulaire c-a-d appeler showRegister()
		}

		public function verifierDonnees()
		{
			$donneesValide = false;
			if(!empty($_POST))
			{
					$errors = array();
				if (empty($_POST['nom']) || !preg_match('/^[A-Za-z0-9_]+$/', $_POST['nom']))
				{
	        		$errors['nom'] = "votre nom est invalide";
	    		}
	    		//meme chose
	    		if (empty($_POST['prenom']) || !preg_match('/^[A-Za-z0-9_]+$/', $_POST['prenom']))
	    		{
	     		   $errors['prenom'] = "votre prenom est invalide";
	    		}
	    		//validation de l'email
	    		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	    		{
	        		$errors['email'] = "votre email n'est pas valide";
	    		}

	    		if (empty($_POST['status']) && !isset($_POST['status']))
	    		{
	     		   $errors['status'] = "selectioner un status valide";
	    		}
	    		//validation du mot de passe
	    		if (empty($_POST['password']) || $_POST['password'] != $_POST['password2']){
	        		$errors['password'] = "votre mot de passe ne correspond pas";
	    		}


	    		if(empty($errors))
	    			$donneesValide = true;

			}
			return $donneesValide;
    	}
     
			public function str_random($length)
			{
				$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
				return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length); 
			}		

			public function logged_only()
			{
				if(!isset($_SESSION['auth']))
				{
					$_SESSION['flash']['danger'] = "vous n'avez pas access a cette page";
					header("Location: index.php?action=login");
					exit();
				}
			}

			public function logout()
			{
				session_start();
				unset($_SESSION['auth']);
				header("location: index.php?action=login");	
			}


	}
?>