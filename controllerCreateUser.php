<?php
include ('classAdmin.php');

class controllerCreateUser 
{
    public function createUser($email, $fullname, $password, $role)
    {
        $admin = new Admin;
        $user_status = "Active";

        $result = $admin -> createUser($email, $fullname, $password, $role, $user_status);
        if($result) 
        {
            return $result;
        }
    }
}

$_SESSION['errorEmail'] ='';
$_SESSION['errorName'] ='';
$_SESSION['errorPW'] ='';
$_SESSION['errorRole'] ='';

// Declare variables for errors
$errorEmail = '';
$errorName = '';
$errorPW = '';
$errorRole = '';

$login = isset($_SESSION['login']);
if (isset($_POST['enter'])) 
{
    // Declare variables to hold person info
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $confirmpw = $_POST['confirmpw'];
    $role = $_POST['role'];

    //Validate Create User Form
    // Form validation
    if (empty($email)) 
    { 
        $errorEmail = "Email is required!";
    }	
    elseif(!preg_match("/^[^@]+@[^@]+\.[^@]+$/",$email)) 
    {
        $errorEmail = '*Please enter a valid email address e.g. abc@gmail.com';
    }
    
    if (empty($fullname)) 
    { 
        $errorName = "Full Name is required!";
    } 
    elseif (!preg_match("/^[a-zA-Z\s]*$/",$fullname)) 
    {
        $errorName = "*Please use only alphabets and whitespace";
    }

    if (empty($password)) 
    { 
        $errorPW = "Password is required!";
    } 
    else if ($password != $confirmpw) 
    {
        $errorPW = "The two passwords do not match!";
    }

    if (empty($_POST['role'])) 
    {
        $errorRole = "Role is required!";
    } 
    else 
    {
        $role = $_POST["role"];
    }

    $_SESSION["errorEmail"] = $errorEmail;
    $_SESSION["errorName"] = $errorName;
    $_SESSION["errorPW"] = $errorPW;
    $_SESSION["errorRole"] = $errorRole;

    $_SESSION["email"] = $email;
    $_SESSION["fullname"] = $fullname;
    $_SESSION["password"] = $password;
    $_SESSION["role"] = $role;

    if($errorEmail.$errorName.$errorPW.$errorRole =='')
    {
        $createUserFunction = new controllerCreateUser;
        $createUserResult = $createUserFunction -> createUser($email, $fullname, $password, $role);
        if($createUserResult) 
        { 
            // if result is not false
            echo 
            ("<script LANGUAGE='JavaScript'> 		
                window.alert('Account Created Successfully!\\nPlease login with new account');
                window.location.href='AdminHomeUI.php';
            </script>");
        }
        else
        {
            echo 
            ("<script LANGUAGE='JavaScript'> 		
                window.alert('Error! Email already exists in the system.');
                window.location.href='AdminCreateUserUI.php';
            </script>");
        }
    }
}
?>