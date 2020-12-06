<?php $title = 'adminView'; ?> 

<?php ob_start(); ?>
 

  <h3>Bonjour Jean et bienvenu sur votre espace privé</h3>
  <section class="espace_admin">
      <div>
        <a href ="index.php?action=allChapters">Modifier un chapitre <img src="public/images/modifier.png" alt="symbole flèche demi-tour"></a>
       
      </div>

      <div>
        <a href="index.php?action=allChapters">Supprimer un chapitre <img src="public/images/poubelle.png" alt="croix pour supprimer"></a>       
      </div>

      <div>
        <a href ="index.php?action=newChapter">Nouveau chapitre<img src="public/images/plume.png" alt="plume dans un encrier"></a>        
      </div>

      <div>
        <a href ="index.php?action=allComments">Commentaires signalés <img src="public/images/attention.png" alt="symbole point exclamation"></a>       
      </div>
  </section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
