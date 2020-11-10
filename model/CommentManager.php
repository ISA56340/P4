<?php
//namespace JF\Blog\model;

require_once("Database.php");

class CommentManager extends Database
{
     

    public function getComments($chapterId)//récupère les commentaires associés à un id de chapitre
    {
        $db = $this->getConnection();
        $result= $db->prepare('SELECT id,author, comment, comment_date, report FROM comment WHERE chapterId = ? ORDER BY comment_date DESC');
        $result->execute([$chapterId]);
        return $result;
    }

    public function chapterComment($chapterId,$author,$comment)//poster un commentaire
    {
        $db = $this->getConnection();
        $result = $db->prepare('INSERT INTO comment (chapterId, author, comment,comment_date) VALUES (?,?,?,NOW())');
        $affectedLines=$result->execute (array($chapterId,$author,$comment));
        return $affectedLines;
        
        header('Location: index.php?action=chapter&id=' . $chapterId);
    }

    public function reportcomment($commentId)//signaler un commentaire
    {
        $db = $this->getConnection();
        $result = $db->prepare('UPDATE comment SET report= report+1 WHERE id=:id');
         $result->execute(array(
                        'id'=>$commentId
                        ));
        return $result;
    }

        public function allComments()
    {
        $db = $this->getConnection();
        $result = $db->query('SELECT id, chapterId, author, comment, report, comment_date FROM comment where report >=1 ORDER BY comment_date DESC');
        return $result;;
    }

     public function deleteComment($commentId)
    {
        $db = $this->getConnection();
        $result = $db->prepare('DELETE FROM comment WHERE id= ?');
        $result->execute(array($commentId));
        
        return $result; 
    }

}

