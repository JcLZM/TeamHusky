<?php
include 'classAdmin.php';

//Session start
session_start();

class controllerCreateUser 
{
    public $errorCreate = '';

    //create user
    public function createUser($email, $fullname, $password, $role)
    {
        $admin = new Admin;

        if (isset($_POST['enter']))
        {
            //Validate Create User
            if (empty($email)|| empty($fullname)|| empty($password)|| empty($role))
            {
                $errorCreate = 'Text fields cannot be blank!';
                $_SESSION['errorCreate'] = $errorCreate;

                header("location:AdminCreateUserUI.php");
            }
            else
            {
                $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                $_SESSION["email"] = $email;
                $_SESSION["fullname"] = $fullname;
                $_SESSION["password"] = $password;
                $_SESSION["role"] = $role;

                $user_status = "Active";
                $result = $admin -> createUser($email, $fullname, $password, $role, $user_status);
                if($result) 
                {
                    return $result;
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
    }
}

$createUserFunction = new controllerCreateUser;
$createUserResult = $createUserFunction -> createUser($_POST['email'], $_POST['fullname'], $_POST['password'], $_POST['role']);
if($createUserResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Account Created Successfully!\\nPlease login with new account');
        window.location.href='AdminHomeUI.php';
    </script>");
}
?>