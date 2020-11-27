<?php $title = 'Home'; ?> 

<?php ob_start(); ?>
    <div class="wrapper">
        <div class="accueil">
            <h3>Qui suis-je ?</h3>
            <article>
                <ul>
                    <li>Jean Forteroche</li>
                    <li>Acteur et écrivain depuis 2001</li>
                    <li>Derniers titres parus: "Les âmes rebelles (2019)" - "Au pays des Incas (2017)"</li>
                </ul>
            </article>
            <article>
                <p>Après avoir publié plusieurs romans sous forme traditionnelle, j'ai souhaité innover en publiant mon dernier roman en ligne, sur le modèle d'une série.<br/> Je vous propose donc de retrouver, ici même, chaque semaine un nouveau chapitre.<br/>J'espére que vous apprécierez cette nouvelle approche de publication et je vous encourage à me faire part de toutes vos remarques en laissant des commentaires.<br/>
                <p>Chers lecteurs, prenez votre billet pour l'Alaska et laissez-vous embarquer vers le grand nord.<p/> 
                <p>Bonne lecture et bon voyage !</p>
                
            </article>
        </div>
    	
        <div class="last_chapters">
            <h3>Derniers chapitres mis en ligne</h3>			
    		    <?php
                foreach ($listChapters as $id => $chapter) {
                ?>  
                <div class="extrait">
                    <p><span>Publié le : <?= htmlspecialchars($chapter['creation_date']);?></span></p>
                    <h4>Chapitre <?= htmlspecialchars($chapter['id']);?></h4>                  
                    <h2><a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"><?= htmlspecialchars ($chapter['title']);?></a></h2> 
                    <p><?= nl2br(substr($chapter['content'], 0,100));?></p>
                    <a href="index.php?action=chapter&amp;chapterId=<?= $chapter['id'] ?>"class="suite">Lire la suite...</a> <!---on a rediriger vers le bon url via le routeur pour voir le chapitre en entier--->
                </div>                    
                <?php
                }
       			
        		$listChapters->closeCursor();
       			?>
    	</div>
    </div>
		<?php $content = ob_get_clean(); ?>
    

	<?php require('template.php'); ?>
