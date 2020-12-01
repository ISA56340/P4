<?php 
if(isset($_SESSION['connexion'])){ //pour vérifier qu'une session n'est pas déjà présente
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf8">
		<meta name= "viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://cdn.tiny.cloud/1/vbl7evtg0dhgyajokozlbin5xayz3083upqby70jenjsq1oa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title><?= $title ?></title>
		<meta name="description" content="Dernier livre de Jean Forteroche publié en ligne"/>
		<meta name="keywords" content="blog, roman,Jean Forteroche,Alaska, responsive design">
		<!--opengraph_ref_facebook_linkedin-->
		<meta property="og:title" content="Billet simple pour l'Alaska" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.surfing-web.com/Billet simple pour l'Alaska/" />
		<meta property="og:image" content="http://www.surfing-web.com/Billet simple pour l'Alaska/images/logo.png" />
		<meta property="og:description" content="Dernier roman de Jean Forteroche"/>
		<!--twitter_cards_ref_twitter-->
		<meta name="twitter:card" content="summary"/>
		<meta name="twitter:site" content="@Billet simple pour l'Alaska"/>
		<meta name="twitter:title" content="Billet simple pour l'Alaska"/>
		<meta name="twitter:description" content="Dernier roman de Jean Forteroche"/>
		<meta name="twitter:image" content="http://www.surfing-web.com/Billet simple pour l'Alaska/images/logo.png"/>
		<link rel="stylesheet" href="public/css/style.css"  type="text/css"/>
	</head>

	<body>
			<header>
				<div class="logo">
					<a href="index.php">
						<img src="public/images/logo4.png" alt="logo">
					</a>
				</div>
				<div class="burger">
					<button id="croix_burger" title="fermer le menu">&#215;</button> 
					<button id="menu_burger"  title="ouvrir le menu">&#9776;</button>  
				</div>
				<nav>
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="index.php?action=allChapters">Tous les chapitres</a></li>
						
						

					<!--lien visible uniquement si  jf connecté-->
						<?php if(isset($_SESSION) AND isset($_SESSION['connexion'])): ?>
							<li><a href="index.php?action=logout">Deconnexion</a></li>
							<?php if(isset($_SESSION['user_type']) AND $_SESSION['user_type'] == 1): ?>
								<li><a href="index.php?action=admin">Espace administration</a></li>
							<?php endif; ?>
						<?php else:?>
							<li class='login'><a href="index.php?action=connection">Connexion</a></li>
						<?php endif; ?>
					</ul>
				</nav>
				
				<h1> Billet simple pour l'Alaska</h1>
				<h2> de Jean Forteroche</h2>
			</header>
			<?php if(isset($_SESSION) AND isset($_SESSION['alert'])): ?>
				<div class="alert"><?php echo $_SESSION['alert'] ?></div>
			<?php unset($_SESSION['alert']); 
			endif; ?>
			
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
					<p><a href="#">Mentions légales</a></p>
				</div>
			</footer>
		<script src="public/js/script.js"></script>

	</body>
</html>