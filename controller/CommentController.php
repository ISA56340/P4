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
		$_SESSION['alert'] = "Le commentaire a bien été signalé !";
    	header('Location:index.php?action=lastChapters');
 		
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
	
	/*récupère et affiche dans la vue un commentaire pour pouvoir le modifier*/
	function updateCommentView($commentId)
	{
		if($_SESSION['user_type'] == 1) {
    		$commentManager = new CommentManager();
	    	$comment = $commentManager->getComment($commentId);	
	    	require_once('view/updateCommentView.php');
    	} else {
    		header("Location:index.php?action=allComments");
    	}
	}


	/*modifier commentaire*/
	function updateComment($author,$comment,$commentId)
	{
		if($_SESSION['user_type'] == 1) {
	    	$commentManager = new CommentManager();
	    	$updateComment = $commentManager->updateComment($author,$comment,$commentId);
	    	if($updateComment){
				header('Location:index.php?action=allComments');
				$_SESSION['alert'] = "Le commentaire a bien été modifié !";
			} else {
				throw new Exception("Impossible modifier le commentaire");	
			}
		} else {
    		header("Location:index.php?action=allChapters");
    	}
	}	
}

