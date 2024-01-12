<?php
require_once(__DIR__.'/../config/database.php');
class UserService
{
    use Database;

    protected $db;

    public function adduser(User $user, $email)
{
    $conn = $this->connect();
    $fullname = $user->getFullName();
    $password = $user->getPassword();
    $role = $user->getRole();
   
        $insertQuery = "INSERT INTO users (user_fullname, user_email, user_pwd, user_role) VALUES (:fullname, :email, :pwd, :role)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $password);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    
}

public function cheking($email){
    $conn = $this->connect();

    $query = "SELECT user_email FROM users WHERE user_email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $emails  = $stmt->fetch(PDO::FETCH_ASSOC);
return $emails;

}
    public function getUser()
    {
        $conn =  $this->connect();
        $query = "SELECT * FROM users";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    public function login($email)
    {
        $conn = $this->connect();

        $query = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $loged  = $stmt->fetch(PDO::FETCH_ASSOC);


        
        return $loged;
    }

    public function selectAuthor(){
        $query ="SELECT * FROM users WHERE user_role = 'author'";
        $conn= $this->connect();
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
         $userss=array();
         
         foreach($result as $user){
            $userss[]= new user ($user['user_id'],$user['user_fullname'],$user['user_email'],$user['user_pwd'],$user['user_role']);
         }
         return $userss;
    }

    public function CountAuthors(){

        $conn = $this->connect();
        $query = "SELECT count(user_id) as authors FROM users WHERE user_role = 'author'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       $CountAuthors = $stmt->fetchColumn();
    
       return $CountAuthors;
    }
    
}
