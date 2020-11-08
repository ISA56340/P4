<?php 
if(isset($_SESSION['connexion'])){ //pour vérifier qu'une session n'est pas déjà présente
     //echo "Vous êtes connecté!";
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="public/css/style.css"  type="text/css"/>
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tiny.cloud/1/vbl7evtg0dhgyajokozlbin5xayz3083upqby70jenjsq1oa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title><?= $title ?></title>
	</head>

	<body>
			<header>
				<div class="logo">
					<a href="index.php">
						<img src="public/images/logo4.png" alt="logo">
					</a>
				</div>
				<div id="nav">
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="index.php?action=allChapters">Tous les chapitres</a></li>
						
						

					<!--lien visible uniquement si  jf connecté-->
						<?php if(isset($_SESSION) AND isset($_SESSION['connexion'])): ?>
						<li><a href="index.php?action=logout">Deconnexion</a></li>
						<li><a href="index.php?action=admin">Espace administration</a></li>
						<?php else:?><li class='login'><a href="index.php?action=connection">Connexion</a></li>
						<?php endif; ?>
					</ul>
				</div>
				
				<h1> Billet simple pour l'Alaska</h1>
				<h2> de Jean Forteroche</h2>
			</header>

			<div class="content">
			 	<?= $content ?>
			 </div>

			 <footer>
				<div class="logo_reseaux_sociaux">
					<img src="public/images/facebook_logo.png" alt="logo_facebook">
					<img src="public/images/logo_twitter.png" alt="logo_twitter">
					<img src="public/images/logo_instagram.png" alt="logo_instagram">
				</div>
				<div class="infos">
					<p>Contact</p>
					<p>Politique de confidentialité</p>
				</div>
			</footer>
	</body>
</html>