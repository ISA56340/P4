<?php
//namespace JF\Blog\model;
require_once("Database.php");

class ChapterManager extends Database
{
     
	
	public function getChapters()//récupère la liste des chapitres
	{
		$db = $this->getConnection();
        $result = $db->query('SELECT id, title, content, creation_date FROM chapter ORDER BY id DESC LIMIT 0,3');
        return $result;
	}

    public function getAllChapters()//récupère la liste des chapitres
    {
        $db = $this->getConnection();
        $result = $db->query('SELECT id, title, content, creation_date FROM chapter ORDER BY id DESC');
        return $result;
    }

    public function getAdminChapters()
    {
        $db = $this->getConnection();
        $result = $db->query('SELECT id, title FROM chapter ORDER BY id DESC');
        return $result;
    }

	public function getChapter($chapterId)//récupère un chapitre précis grace au paramètre
	{
		$db = $this->getConnection();
		$result = $db ->prepare('SELECT id, title, content, creation_date FROM chapter WHERE id = ?');
        $result->execute([$chapterId]);
        $chapter = $result->fetch();
        return $chapter;
	}

	public function addChapter()//ajouter un nouveau chapitre
	{
		$title = $_POST['title'];
		$content = $_POST['newChapter'];
		
        $db = $this->getConnection();
        $result = $db ->prepare('INSERT INTO chapter(title, content, creation_date) VALUES (:title,:content ,NOW())');
        $result->execute(['title' => $title,
    					  'content' => $content]);
        return $result;
	}

	public function deleteChapter($chapterId)//supprimer un chapitre
    {
       	$db = $this->getConnection();
        $result = $db->prepare('DELETE FROM chapter WHERE id= ?');
        $result->execute(array( $chapterId));
        
        return $result; 

    }


	  public function updateChapter($title,$content,$chapterId)//modifier un chapitre
    {	
        
       	$db = $this->getConnection();
        $result = $db->prepare('UPDATE chapter SET title=:title, content=:content WHERE id=:id');
        
        $result->execute(array(
                    'title' => $title,
                    'content' => $content,
                    'id' => $chapterId
                    ));
        									                   							
        
       return $result;
    }	

}