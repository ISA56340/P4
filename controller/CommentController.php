<?php
//namespace JF\Blog\controller

require_once('model/LoginManager.php');
require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');
//use JF\Blog\model\LoginManager;
//use JF\Blog\model\ChapterManager;
//use JF\Blog\model\CommentManager;

class CommentController
{

/*affiche vue pour pouvoir ajouter un com*/
	function addComment($chapterId)
	{
		$commentManager = new CommentManager();
		
		require_once('view/insertCommentView.php');
	}
	
/*ajout com*/
	function insertComment($chapterId,$author,$comment)
	{
		$commentManager = new CommentManager();

		$affectedLines = $commentManager->chapterComment($chapterId,$author,$comment);

		if($affectedLines === false){
			throw new Exception('Impossible d\'ajouter un commentaire !');
		}
		else{
			header('Location:index.php?action=chapter&chapterId='. $chapterId);
		}
	}

/*signaler com*/
	function reportComment($commentId)
	{
		$commentManager = new CommentManager();
		$reportComment = $commentManager->reportComment($commentId);
    header('Location:index.php?action=lastChapters');
    //echo "<script>alert(\"Commentaire signalé !\")</script>";
	}

/*affiche tous les com signalés pour le modérateur*/
	function listAllComments()
	{
	    $commentManager = new CommentManager();
	    $allComments = $commentManager->allComments();
	    require_once("view/allCommentsView.php"); 
	}

	function deleteComment($commentId)
	{
		$commentManager = new CommentManager();
	    $deleteComment = $commentManager->deleteComment($commentId);
	  	 header('Location:index.php?action=allComments');
	}
		
}

