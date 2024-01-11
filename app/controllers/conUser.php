<?php
require_once(__DIR__."/../services/UserService.php");
require_once(__DIR__."/../models/user.php");




$Userservice = new Userservice();

if (isset($_POST["register"])) {
    $fullname = $_POST["Fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $id = '';
    $emails =  $Userservice->cheking($email);
    if ($fullname != '' && $email != '' && $password != '' && $cpassword != '' && preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/',$email) && preg_match('/^[A-Za-z\s-]+$/',$fullname) ) {
        if ($password === $cpassword) {
            if ($emails) {
                $_SESSION['error'] = 'E-mail already exists';
                header('Location: ../views/authentification/signUp.php');
            } else {
                $hashing = password_hash($password, PASSWORD_DEFAULT);
                $role = 'author';
                $user = new User($id, $fullname, $email,  $hashing, $role);
                $Userservice->adduser($user, $email);

                header('Location: ../views/authentification/signIn.php');
            }
        } else {

            $_SESSION['error'] = 'Passwords not Matched';
            header('Location: ../views/authentification/signUp.php');
        }
    }else {
        $_SESSION['error'] = 'Empty Input invalid';
            header('Location: ../views/authentification/signUp.php');
    }
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $logPwd = $_POST['password'];
    $loged =  $Userservice->login($email);
    $password = $loged['user_pwd'];
    $role = $loged["user_role"];
    $_SESSION['user'] = $loged['user_id'];
    $_SESSION['username'] = $loged['user_fullname'];




        if (password_verify($logPwd, $password) && $role === 'author') {

            header('Location: ../views/client/index.php');
        } else if (password_verify($logPwd, $password) && $role === 'admin') {
            header('Location: ../views/admin/dashboard.php');
        } else {
            $_SESSION['erreur'] = 'inccorect E-mail Or Password';
            header('Location: ../views/authentification/signIn.php');
        }
   
}
$Authors=$Userservice->selectAuthor();
