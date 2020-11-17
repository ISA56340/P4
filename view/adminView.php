<?php $title = 'adminView'; ?> 

<?php ob_start(); ?>
 

  <h3>Bonjour Jean et bienvenu sur votre espace privé</h3>
  <section class="espace_admin">
      <div>
        <p>Modifier un chapitre</p>
        <a href ="index.php?action=allChapters">Modifier un chapitre</a>
      </div>

       <div>
        <p>Supprimer un chapitre</p>
        <a href="index.php?action=allChapters">Supprimer un chapitre</a>
      </div>

       <div>
        <p>Créer un nouveau chapitre</p>
        <a href ="index.php?action=newChapter">Nouveau chapitre</a>
      </div>

       <div>
        <p>Voir les commentaires signalés</p>
        <a href ="index.php?action=allComments">commentaires signalés</a>
      </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
