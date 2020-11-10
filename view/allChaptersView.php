<?php $title = 'allChapters'; ?> 

<?php ob_start(); ?>
		<h3>Liste de tous les chapitres</h3>
        <div id="chapters">
            
			<?php
            foreach ($allChapters as $id => $chapter) {
                ?>
            <div class="billets">
                <h4>Chapitre <?= htmlspecialchars($chapter['id']);?></h4>
                <h2><a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"><?=htmlspecialchars($chapter['title']);?></a></h2> 
                <p><?= htmlspecialchars($chapter['content']);?></p>
                <p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
                <a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"class="bouton">Lire la suite...</a> <!---on a rediriger vers le bon url via le routeur pour voir le chapitre en entier--->
                
                <!--liens visibles uniquement si  jf connecté-->
                                   <!--liens visibles uniquement si  jf connecté-->
                  <?php if(isset($_SESSION) AND isset($_SESSION['connexion']) AND $_SESSION['user_type'] == 1): ?>
                    <a href ="index.php?action=update&amp;chapterId=<?= $chapter['id'] ?>">Modifier</a>
                    <a href ="index.php?action=delete&amp;chapterId=<?= $chapter['id'] ?>">Supprimer</a>
                <?php endif; ?> 
                        
                            
                </div>
                <br>
                <?php
            }
   			
    		$allChapters->closeCursor();
   			?>
		</div>

		<?php $content = ob_get_clean(); ?>


	<?php require('template.php'); ?>
