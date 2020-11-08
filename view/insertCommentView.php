<?php $title = 'Comment'; ?> 

<?php ob_start(); ?>

		<h1>Ajouter un commentaire</h1>

		<form method="post" action="index.php?action=insertComment&amp;chapterId=<?= htmlspecialchars($_GET['chapterId']); ?>">
			<label for="author">Auteur</label><br/>
			<input type="text" id="author" name="author"/><br/>
			<label for="comment" class="commentaire">Commentaire</label><br/>
			<textarea id="comment" name="comment" rows="5" cols="60"></textarea><br/>
			<input type="submit" value="Envoyer"/>
		</form>	
	
	<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
		