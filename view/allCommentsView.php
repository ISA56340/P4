<?php 
require_once("controller/ChapterController.php");
require_once("controller/CommentController.php");


$title = 'allCommentsView'; ?> 

<?php ob_start(); ?>
 
<div class="commentaires">
            <div class="comments">
			    <h3>Liste de tous les commentaires signalés</h3>

        <?php
                foreach ($allComments as $id=>$comment){
                ?>
                <div class="contenu_comments">
                    <h4>Chapitre <?= htmlspecialchars($comment['chapterId']);?></h4>
                    <p><strong>Posté le : </strong><?= htmlspecialchars($comment['comment_date']);?></p>
                    <p><strong>Auteur : </strong><?= htmlspecialchars($comment['author']);?></p>
                    <p><?= htmlspecialchars($comment['comment']);?></p>
                    <p><span>Ce commentaire a été signalé <?= nl2br(htmlspecialchars($comment['report'])) ?> fois.</span></p>
                    <a href="index.php?action=deleteComment&amp;commentId=<?=$comment['id']?>" class="Supprimer">Supprimer le commentaire</a>                  
                </div> 
                <?php
                }
     
                ?>
            </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>