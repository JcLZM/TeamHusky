<?php
include ('classAdmin.php');

class controllerCreateUser 
{
	// Declare variables for errors
	public $emailErr = '';
    public $fullnameErr = '';
    public $passwordErr = '';
    public $roleErr = '';

    public function createUser($email, $fullname, $password, $role)
    {
        $admin = new Admin;

        if (isset($_POST['enter'])) 
        {
            // Declare variables to hold person info 
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $password = $_POST['password'];
            $confirmpw = $_POST['confirmpw'];
            $role = $_POST['role'];

            // Form validation
            if (empty($email)) 
            { 
                $emailErr = "Email is required!";
            }	
            elseif(!preg_match("/^[^@]+@[^@]+\.[^@]+$/",$email)) 
            {
                $emailErr = '*Please enter a valid email address e.g. abc@gmail.com';
            }
            
            if (empty($fullname)) 
            { 
                $fullnameErr = "Name is required!";
            } 
            elseif (!preg_match("/^[a-zA-Z\s]*$/",$fullname)) 
            {
                $fullnameErr = "*Please use only alphabets and whitespace";
            }

            if (empty($password)) 
            { 
                $passwordErr = "Password is required!";
            } 
            else if ($password != $confirmpw) 
            {
                $passwordErr = "The two passwords do not match!";	
            }

            if (empty($_POST["role"])) 
            {
                $roleErr = "Gender is required!";

            } 
            else 
            {
                $roleErr = $_POST["role"];
            }
            
            $_SESSION["emailErr"] = $emailErr;
            $_SESSION["fullnameErr"] = $fullnameErr;
            $_SESSION["passwordErr"] = $passwordErr;
            $_SESSION["roleErr"] = $roleErr;

            $_SESSION["email"] = $email;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["password"] = $password;
            $_SESSION["role"] = $role;
            $user_status = "Active";

            if($emailErr.$fullnameErr.$passwordErr.$roleErr =='') 
            {
                $result = $admin -> createUser($email, $fullname, $password, $role, $user_status);
                if($result) 
                {
                    return $result;
                }
            } 
            else 
            {
                header('Location: AdminCreateUserUI.php');  
            }
        }
    }
}

$login = isset($_SESSION['login']);

$createUserFunction = new controllerCreateUser;
$createUserResult = $createUserFunction -> createUser($_POST['email'], $_POST['fullname'], $_POST['password'], $_POST['role']);
if($createUserResult) { // if result is not false
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
?>