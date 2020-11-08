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
          $req = $db->prepare('SELECT id, password FROM user WHERE pseudo = :pseudo');
          $req-> execute(['pseudo' => $pseudo]);

          $result = $req->fetch(); //converti le résultat en un tableau

          if($result == true)
          {
            //le compte existe bien
           $hashpass = $result['password'];
           if(password_verify($password, $hashpass))
            {
              $check = true;
            }
          }  
          else
          {
            //throw new Exception("Le compte associé à ce pseudo n'existe pas");
            echo "Le compte associé à ce pseudo n'existe pas";
          }              
      }
      else
      {
        //throw new Exception("Identifiant ou Mot de passe incorrect");
        echo "Identifiant ou Mot de passe incorrect";
      }
      return $check;
  } 
}