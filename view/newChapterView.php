<?php 

if(!isset($_SESSION)){
    session_start();
}

require_once("controller/ChapterController.php");
require_once("controller/CommentController.php");

$title = 'Create Chapter'; ?> 

<?php ob_start(); ?>
    <section class="edition">
      <form method="post" action=" index.php?action=addChapter"?>        
        <label>Titre :<input type="text" id="title" name="title"/></label>
        <textarea id="newChapter" name="newChapter"></textarea>
        <input type="submit" class="publier" value="Publier"/>
      </form>
    </section>
  	
  <script src="public/js/textEditor.js"></script>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>