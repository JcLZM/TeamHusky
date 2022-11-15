<?php
include '../entity/classUser.php';

//Session start
session_start();
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if($pageRefreshed == 1){
    session_destroy();
}

class controllerUser {

    public $errorUsername = '';
    public $errorPassword = '';

    //login
    public function login($username, $password)
    {
        $user = new User();

        //cast login session
        if(isset($_SESSION['login']))
        {
            $login = isset($_SESSION['login']);
        }

        //if login sucess check for user/pass role
        if(isset($_POST['login'])) 
        {
            $username = $_POST['username'];
		    $password = $_POST['password'];

            //Validate username & password for Login
            if (empty($_POST["username"])) 
            {
                $errorUsername = "Email is required!";
            } else 
            {
                $username = $_POST["username"];
            }

            if (empty($_POST["password"])) 
            {
                $errorPassword = "Password is required!";
            } else 
            {
                $password = $_POST["password"];
            }

            $_SESSION["errorUsername"] = $errorUsername;
		    $_SESSION["errorPassword"] = $errorUsername;

            $_SESSION["username"] = $username;
		    $_SESSION["password"] = $password;

            if($errorUsername.$errorUsername =='')
            {
                $result = $user->login($_POST['username'], $_POST['password']);
                if($result) 
                {
                    $login = $_SESSION['login'];			
                } 
                else 
                {
                    header("location:UserLoginUI.php");	
                }
            }
	    }

        //If login not empty, check for role
        if (!empty($login))
        {
            if($_SESSION['role'] == 'System Administrator') 
            {
                header("location:AdminHomeUI.php");	
            }
            // elseif($_SESSION['role'] == 'Restaurant Manager') 
            // {
            //     header("location:restaurantmanager.php");	
            // }
            // elseif($_SESSION['role'] == 'Restaurant Staff')
            // {
            //     header("location:restaurantstaff.php");		
            // }
            // elseif($_SESSION['role'] == 'Restaurant Owner')
            // {
            //     header("location:restaurantowner.php");		
            // }
        }
    }
}

$login = new controllerUser;
$login->login($_POST['username'], $_POST['password']);
?>