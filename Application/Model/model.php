<?php

class Model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    /** Functional login model
    */

    public static function logout()
    {
        session_destroy();
    }

    public function isLoggedInSession()
    {
        if (isset($_SESSION['Id'])==false || empty($_SESSION['Id']) ) {
            return 0;
        }
        else
        {
            return 1;
        }
    }


    public function checkUser()
    {      
        $name = $_POST['name'];
        $wachtwoord = $_POST['password'];
        $wachtwoord_hash = password_hash($wachtwoord, PASSWORD_DEFAULT); 
      //  $wachtwoord_verified = password_verify($wachtwoord, $wachtwoord_hash);
        $wachtwoord_verified = md5($wachtwoord);

        if ($this->getUserFromDB($name, $wachtwoord_verified)) { 
            return false; 
            }
    } 

    public function getUserFromDB($name, $wachtwoord_verified)
    {
        $sql = "SELECT id, name, isadmin FROM users 
                WHERE name = :name AND password = :password AND isadmin=1 ;";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, 
                              ':password' => $wachtwoord_verified));
        //echo $email;
        //echo $wachtwoord_verified;
        $count = $query->rowCount();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($count == 1) {
                $_SESSION['Id'] = $row['id'];
                $_SESSION['Name'] = $row['name'];
                $_SESSION['isAdmin'] = $row['isadmin'];
        }
        else
        {
            $_SESSION['errors'][] = "Combinatie van gebruikersnaam en wachtwoord niet gevonden";
        }
    }

    /** End login model
    */

    /** Comment model

    */ /**hrm@hollandshielding.nl */


    public function loadComments()
    {
        $sql = "SELECT * FROM comment_table ORDER BY post_time DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function selectComment()
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM comments WHERE id=? ORDER BY id ASC";
        $query = $this->db->prepare($sql);
        $query->execute(array($id));

        return $query->fetchAll();
    }

    /** End comment model
    */

    /** Admin model
    */

    public function isAdmin()
    {
        if (isset($_SESSION['isAdmin'])==false || empty($_SESSION['isAdmin']) ) {
            return 0;
        }
        else
        {
            return 1;
        }
    }   

    public function addComment($name, $comment)
    {
        $sql = "INSERT INTO comment_table (name, comment) VALUES (:name, :comment)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':comment' => $comment);
        $query->execute($parameters);
    }

    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM comment_table WHERE id = :comment_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);
        $query->execute($parameters);
    }

    public function getComment($comment_id)
    {
        $sql = "SELECT id, name, comment FROM comment_table WHERE id = :comment_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateComment($name, $comment, $comment_id)
    {
        $sql = "UPDATE comment_table SET name = :name, comment = :comment  WHERE id = :comment_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':comment' => $comment, ':comment_id' => $comment_id);
        $query->execute($parameters);
    }


    public function loadMembers()
    {
        $sql = "SELECT * FROM members ORDER BY id ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /** End admin model
    */


}  

