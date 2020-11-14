<?php

require_once('model/LoginManager.php');
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');


class LoginController
{
	function signin($pseudo, $password1, $password2)
	{
		//$hashpass = password_hash($password, PASSWORD_DEFAULT);
	    $loginManager = new LoginManager;
		// Vérification de la validité des informations
		if (!empty($password1) && !empty($password2) && !empty($pseudo))
		{ 
	   		if($password1 == $password2){
	    		$signin = $loginManager->signinCheck($pseudo, $password1);
	    		$_SESSION['alert'] = "Bonjour ". $pseudo .", inscription réussie";
	    		$_SESSION['connexion'] = $_POST['pseudo'] ;
	    		header("Location:index.php?action=allChapters");
			}
			else{
				throw new Exception("vos mots de passe ne sont pas identiques");
			}
			
		}
	}

	function login($pseudo, $password)
	{
		if(isset($pseudo) && isset($password)) {
			
			$loginManager = new LoginManager;
			try {
				$check = $loginManager->loginCheck($pseudo, $password);
			} catch (Exception $e) {
				echo 'Erreur :' .$e->getMessage();
			}
	    	if($check)
	    	{	
	        	$_SESSION['connexion'] = $_POST['pseudo'] ;
	        	if($_SESSION['user_type'] == 1) {
	        		header("Location:index.php?action=admin");
	        	} else {
	        		header("Location:index.php?action=allChapters");
	        	}

	        	$_SESSION['connexion'] = $_POST['pseudo'] ;
	        	if($_SESSION['user_type'] == 0) {
	        		header("Location:index.php?action=allChapters");
	        	} else {
	        		header("Location:index.php?action=connection");
	        	}
	    	}
	    	else
	   		{
	   			$_SESSION['alert'] = "Identifiant ou mot de passe incorrect";
	   			header("Location:index.php?action=connection");
	   		}
		} else {
			echo 'Identifiant ou mot de passe incorrect';
		}

	}

	function admin()
	{
		if($_SESSION['user_type'] == 1) {
    		require_once("view/adminView.php");
    	} else {
    		header("Location:index.php?action=allChapters");
    	}
	}

	function connection()
	{
		require_once("view/loginView.php");
	}

	function logout() {
	    // Suppression des variables de session et de la session
	    session_destroy();
	    header('Location: index.php');
	}
	
 }
