<?php $title = 'Chapter'; ?> 

<?php ob_start(); ?>
        
        <div class="billets">
            <div class="img"></div>
        	<p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
            <h2><?= htmlspecialchars($chapter['title']);?></h2>
            <p><?= htmlspecialchars($chapter['content']);?></p>
            <a href="index.php">Retour à l'accueil</a>

        </div>
        <br>
        
		<div class="commentaires">
            <div class="comments">
			    <h3>Commentaires</h3>
            
                <?php
                foreach ($comments as $id=>$comment){
                ?>
                <div class="contenu_comments">
                    <h4><?= htmlspecialchars($comment['author']);?></h4>
                    <p>Posté le <?= htmlspecialchars($comment['comment_date']);?></p>
                    <p><?= htmlspecialchars($comment['comment']);?></p>                   
                    <a href="index.php?action=reportComment&id=<?=$chapter['id']?>&reportId=<?=$comment['id']?>" class="Signaler">Signaler le commentaire</a>
                </div> 
                <?php
                }
                $comments->closeCursor();
                ?>
            </div>   
		
    		<div class="your_comment">
    			<a href="index.php?action=addComment&amp;chapterId=<?= $_GET['chapterId']?>" class="ajoutcomment">Ajouter un commentaire</a> 
    		</div>
        </div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>