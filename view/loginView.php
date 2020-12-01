<?php $title = 'login'; ?> 

<?php ob_start(); ?>

		<div id = "formulaire">
			<form action="index.php?action=login" method="POST">
				<h3>Connexion</h3>
  				<label for="login">
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				</label>
          <label for="mdp">
  					<input type="password" id="mypassword" name="mypassword" placeholder="Mot de Passe" required/>
          </label>
  				<div class="envoi">
  					<input type="submit" class="button" name="formlogin" value="Se connecter"/>
  				</div>  				
			</form>

			<form action="index.php?action=signin" method="POST">
				<h3>Inscription</h3>
  				<label for="login">
  					<input type="text" id="pseudo" name="pseudo" placeholder="Identifiant" required/><br/><br/>
  				</label>
          <label for="mdp">
  					<input type="password" id="password1" name="password1" placeholder="Mot de passe" required/><br/><br/>
          </label>
          <label for="mdpbis">
  					<input type="password" id="password2" name="password2" placeholder="Confirmer votre Mot de passe" required/>
          </label>
  				<div class="envoi">
  					<input type="submit" class="button" name="formsend" id="formsend" value="Créer son compte"/>
  				</div>  				
			</form>  
		</div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>