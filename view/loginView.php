

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

			<form action="index.php?action=signin" method="POST">
				<h3>Inscription</h3>
  				<label for="login">Identifiant</label><br/><br/>
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				<label for="mdp">Mot de passe</label><br/><br/>
  					<input type="password" id="password1" name="password1" placeholder="Mot de passe" required/><br/><br/>
  					<input type="password" id="password2" name="password2" placeholder="Confirmer votre Mot de passe" required/><br/><br/>
  				<div class="envoi">
  					<input type="submit" name="formsend" id="formsend" value="Créer son compte"/>
  				</div>  				
			</form>  
		</div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>