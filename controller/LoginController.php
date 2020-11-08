<?php

require_once('model/LoginManager.php');
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');


class LoginController
{

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
	    		//session_start();
	        	$_SESSION['connexion'] = $_POST['pseudo'] ;
	        	//header("Location:index.php");
	        	require_once("view/adminView.php");
	    	}
	    	else
	   		{
	   			echo 'Identifiant ou mot de passe incorrect';
	   		}
		} else {
			echo 'Identifiant ou mot de passe incorrect';
		}

	}

	function admin()
	{
		require_once("view/adminView.php");
	}

	function connection()
	{
		require_once("view/loginView.php");
	}

	function logout() {

    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');


}
	
 }
