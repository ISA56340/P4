<?php $title = 'UpdateCommentView'; ?> 

<?php ob_start(); ?>
	<section id="modifComment">
		<h1>Modérer un commentaire</h1>
		<div class="wrapper">
			<form method="post" action="index.php?action=updateComment&amp;commentId=<?=$comment['id']?>">
				<label for="author" class="auteur">Auteur</label><br/>
				<input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>"/><br/>
				<div class="commentaire">
					<label for="comment">Commentaire</label><br/>
					<input type="text" id="comment" name="comment" rows="6" cols="60" value="<?= htmlspecialchars($comment['comment']) ?>"/><br/>
				</div>
					<input type="submit" class="update" value="Mettre à jour"/>

			</form>	
		</div>
	
	<?php $content = ob_get_clean(); ?>
	</section>
<?php require('template.php'); ?>