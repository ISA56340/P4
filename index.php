<?php
session_start();
require_once ('controller/ChapterController.php');
require_once ('controller/CommentController.php');
require_once ('controller/LoginController.php');
//centralise l'appel des requêtes 



     
        try{

             if(isset($_GET['action']))
            {
                if($_GET['action'] === 'lastChapters'){
                    $chapterController = new ChapterController();
                    $chapterController->lastChapters();
                }
                elseif($_GET['action'] === 'allChapters'){
                    $chapterController = new ChapterController();
                    $chapterController->allChapters();
                }
                elseif($_GET['action'] === 'chapter'){
                    $chapterController = new ChapterController();
                    $chapterController->chapter($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'addComment') {
                    $commentController = new CommentController();
                    $commentController->addComment($_GET['chapterId']);
                }
                elseif ($_GET['action'] === 'insertComment') {
                    $commentController = new CommentController();
                    $commentController->insertComment($_GET['chapterId'],$_POST['author'], $_POST['comment']);
                }
                elseif($_GET['action'] === 'reportComment'){
                    $commentController = new CommentController();
                    $commentController->reportComment($_GET['reportId']);
                }
                 elseif($_GET['action'] === 'allComments'){
                    $commentController = new CommentController();
                    $commentController->listAllComments();
                }
                elseif($_GET['action'] === 'deleteComment'){
                        $commentController = new CommentController();
                        $commentController->deleteComment($_GET['commentId']);
                }
                 elseif($_GET['action'] === 'signin'){
                    $loginController = new LoginController();
                    $loginController->signin($_POST['pseudo'], $_POST['password1'], $_POST['password2']);
                }
                elseif($_GET['action'] === 'login'){
                    $loginController = new LoginController();
                    $loginController->login($_POST['pseudo'], $_POST['mypassword']);
                }
                 elseif($_GET['action'] === 'admin'){
                    $loginController = new LoginController();
                    $loginController->admin();
                }
                elseif($_GET['action'] === 'connection'){
                    $loginController = new LoginController();
                    $loginController->connection();
                }
                 elseif($_GET['action'] === 'logout'){
                    $loginController = new LoginController();
                    $loginController->logout();
                }
                elseif($_GET['action'] === 'newChapter'){
                     $chapterController = new ChapterController();
                    $chapterController->newChapter();
                }
                 elseif($_GET['action'] === 'addChapter'){
                     $chapterController = new ChapterController();
                    $chapterController->addChapter();
                }
                 elseif($_GET['action'] == 'delete') {
                    if(isset($_GET['chapterId']) && $_GET['chapterId'] > 0){
                        $chapterController = new ChapterController();
                        $chapterController->deleteChapter($_GET['chapterId']);
                    }
                }
                elseif($_GET['action'] == 'update'){
                    $chapterController = new ChapterController();
                    $chapterController->updateChapterView($_GET['chapterId']);    
                }
                elseif($_GET['action'] == 'updateChapter'){
                    $chapterController = new ChapterController();
                    $chapterController->updateChapter($_POST['title'], $_POST['newChapter'], $_GET['chapterId']);
                }
                else{
                    echo 'page inconnue';
                } 
            } else{
                $chapterController = new ChapterController();
                $chapterController->lastChapters();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur : ' .$e->getMessage();
        }


