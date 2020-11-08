

<?php $title = 'login'; ?> 

<?php ob_start(); ?>

		<div id = "formulaire">
			<form class="form" action="index.php?action=login" method="POST">
				<h3>Connexion</h3>
  				<label for="login">Identifiant</label><br/><br/>
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				<label for="mdp">Mot de passe</label><br/><br/>
  					<input type="password" id="mypassword" name="mypassword" placeholder="Mot de Passe" required/><br/><br/>
  				<div class="envoi">
  					<input type="submit" class="button" type="submit" name="formlogin" value="Se connecter"/>
  				</div>  				
			</form> 
		</div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>