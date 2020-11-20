<?php $title = 'Chapter'; ?> 

<?php ob_start(); ?>

        <div class="billets">
            <div class="retour">
                <a href="index.php" class="bouton">Retour à l'accueil</a>
            </div>
            <div class="img"></div>
        	<p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
            <h4>Chapitre <?= htmlspecialchars($chapter['id']);?></h4>
            <h2><?= htmlspecialchars($chapter['title']);?></h2>
            <p><?= nl2br($chapter['content']);?></p>
            
        </div>
        <br>
        
		<div class="commentaires">
            <div class="comments">
			    <h3>Commentaires</h3>
                 <p class="info">Si vous souhaitez signaler ou ajouter un commentaire, vous pouvez vous connecter ou créer votre espace <a href="index.php?action=connection"><span>ici</span></a></p>
                <?php
                foreach ($comments as $id=>$comment){
                ?>
                <div class="contenu_comments">
                    <h4><?= htmlspecialchars($comment['author']);?></h4>
                    <p>Posté le <?= htmlspecialchars($comment['comment_date']);?></p>
                    <p><?= htmlspecialchars($comment['comment']);?></p>
                    <?php if(isset($_SESSION['user_type']) AND $_SESSION['user_type'] == 0): ?>        <a href="index.php?action=reportComment&id=<?=$chapter['id']?>&reportId=<?=$comment['id']?>" class="Signaler">Signaler le commentaire</a>
                    <?php endif; ?>
                </div> 
                <?php
                }
                $comments->closeCursor();
                ?>
            </div>   
		
    		<div class="your_comment">
                <?php if(isset($_SESSION['user_type']) AND $_SESSION['user_type'] == 0): ?>
    			     <a href="index.php?action=addComment&amp;chapterId=<?= $_GET['chapterId']?>" class="ajoutcomment">Ajouter un commentaire</a>
                <?php endif; ?> 
    		</div>
        </div>
		
		<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>