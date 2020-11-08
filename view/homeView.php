<?php $title = 'Home'; ?> 

<?php ob_start(); ?>

		<h3>Derniers chapitres mis en ligne</h3>
        <div id="chapters">			
			<?php
            foreach ($listChapters as $id => $chapter) {
                ?>
                <div class="billets">
                    <h2><a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"><?= htmlspecialchars($chapter['title']);?></a></h2> 
                    <p><?= htmlspecialchars($chapter['content']);?></p>
                    <p>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></p>
                    <a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"class="bouton">Lire la suite...</a> <!---on a rediriger vers le bon url via le routeur pour voir le chapitre en entier--->
                
                <!--liens visibles uniquement si  jf connecté-->
                <?php if(isset($_SESSION) AND isset($_SESSION['connexion'])): ?>
                    <a href ="index.php?action=update&amp;chapterId=<?= $chapter['id'] ?>">Modifier</a>
                    <a href ="index.php?action=delete&amp;chapterId=<?= $chapter['id'] ?>">Supprimer</a><?php endif; ?>                            
                </div>
                
                <?php
            }
   			
    		$listChapters->closeCursor();
   			?>
		</div>

		<?php $content = ob_get_clean(); ?>


	<?php require('template.php'); ?>
