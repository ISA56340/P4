<?php $title = 'adminChapter'; ?> 

<?php ob_start(); ?>

  <section class="edition">

    <form action="index.php?action=updateChapter&chapterId=<?= $chapter['id'] ?>" method="post">
           
        <label>Titre :<input type="text" id="title" name="title" value="<?= htmlspecialchars($chapter['title']) ?>"/></label>
      
  		<textarea id="newChapter" name="newChapter"> <?= htmlspecialchars($chapter['content']) ?></textarea>
      		
      <input type="submit" value="Actualiser"/> 
    </form>
  </section>

  <section class="gestion_com">
    
  </section>
  		
  		
<script src="public/js/textEditor.js"></script> 

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
