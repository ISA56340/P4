<?php

require_once('model/ChapterManager.php');
require_once('model/CommentManager.php');


class ChapterController
{

/*recupère tous les chapitres pour afficher les deux derniers*/
	function lastChapters()
	{
		$chapterManager = new ChapterManager();
    	$lastChapters = $chapterManager->getChapters();//appel de la méthode

		require_once('view/homeView.php');
	}

/*afficher tous les chapitres*/
	function allChapters()
	{
		$chapterManager = new ChapterManager();
    	$allChapters = $chapterManager->getAllChapters();

		require_once('view/allChaptersView.php');
	}

/*afficher un chapitre et commentaires associés*/	
	function chapter($chapterId)
	{
		$chapterManager = new ChapterManager();
		$commentManager = new CommentManager();

		$chapter = $chapterManager->getChapter($chapterId);
		$comments = $commentManager->getComments($chapterId);
		require_once('view/chapterView.php');
	}

/*affiche la vue qui permet de créer nouveau chapitre*/
	function newChapter()
	{
		if($_SESSION['user_type'] == 1) {
    		$chapterManager = new ChapterManager();
			require_once('view/newChapterView.php');
    	} else {
    		header("Location:index.php?action=allChapters");
    	}
	}

	function addChapter()
	{
		$chapterManager = new ChapterManager();
		$chapter = $chapterManager->addChapter();
		header('Location: index.php?action=lastChapters');
		
	}

	function deleteChapter($chapterId)
	{
		if($_SESSION['user_type'] == 1) {
    		$chapterManager = new ChapterManager();
			$chapter = $chapterManager->deleteChapter($chapterId);
			$_SESSION['alert'] = "Chapitre #" . $chapterId . " supprimé";
			header('Location: index.php?action=lastChapters');
    	} else {
    		header("Location:index.php?action=allChapters");
    	}
	}

/*récupère et affiche dans la vue un chapitre pour pouvoir le modifier*/
	function updateChapterView($chapterId)
	{
		if($_SESSION['user_type'] == 1) {
    		$chapterManager = new ChapterManager();
	    	$chapter = $chapterManager->getChapter($chapterId);	
	    	require_once('view/adminChapterView.php');
    	} else {
    		header("Location:index.php?action=allChapters");
    	}
	}

/*modifier chapitre*/
	function updateChapter($title,$content,$chapterId)
	{
		if($_SESSION['user_type'] == 1) {
	    	$chapterManager = new ChapterManager();
	    	$updateChapter = $chapterManager->updateChapter($title,$content,$chapterId);
	    	if($updateChapter){
	    		$_SESSION['alert'] = "Chapitre #" . $chapterId . " mis à jour";
				header('Location: index.php?action=lastChapters');
			} else {
				throw new Exception("Impossible modifier le chapitre");	
			}
		} else {
    		header("Location:index.php?action=allChapters");
    	}
	}
}