<?php
//namespace JF\Blog\model;

require_once("Database.php");

class LoginManager extends Database
{
    public function __construct() {
       
    }

    public function loginCheck($pseudo, $password)    
    {
      $db = $this->getConnection();
      $check = false;
      if (!empty($pseudo) && !empty($password))
      {   
          $req = $db->prepare('SELECT id, password, type FROM user WHERE pseudo = :pseudo');
          $req-> execute(['pseudo' => $pseudo]);

          $result = $req->fetch(); //converti le résultat en un tableau

          if($result == true)
          {
            //le compte existe bien
           $hashpass = $result['password'];
           if(password_verify($password, $hashpass))
            {
              $_SESSION['user_type'] = $result['type'];
              $check = true;
            }
          }            
      }
      return $check;
  } 

   public function signinCheck($pseudo, $password) {
      $hashpass = password_hash($password, PASSWORD_DEFAULT);
      $db = $this->getConnection();
      $req = $db->prepare('INSERT INTO user(pseudo, password,creation_date) VALUES(:pseudo, :password, NOW())');
      $req->execute(array(
        'pseudo' => $pseudo,
        'password' => $hashpass));
      $_SESSION['user_type'] = 0;
    }
}