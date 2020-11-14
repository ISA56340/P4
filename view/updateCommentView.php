<?php $title = 'UpdateCommentView'; ?> 

<?php ob_start(); ?>

		<h1>Modérer un commentaire</h1>

		<form method="post" action="index.php?action=updateComment&amp;commentId=<?=$comment['id']?>">
			<label for="author">Auteur</label><br/>
			<input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>"/><br/>
			<label for="comment" class="commentaire">Commentaire</label><br/>
			<input type="text" id="comment" name="comment" rows="5" cols="60" value="<?= htmlspecialchars($comment['comment']) ?>"/><br/>
			<input type="submit" value="Mettre à jour"/>
		</form>	
	
	<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>