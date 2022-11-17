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

$admin = new Admin;
$createUserFunction = new controllerCreateUser;
$createUserResult = $createUserFunction -> createUser($_POST['email'], $_POST['fullname'], $_POST['password'], $_POST['role']);
if($createUserResult)
{
    if($_SESSION['role'] == 'System Administrator') 
    {
        $result = $admin->findUserId($_POST['email']);
        while($row = $result->fetch_assoc())
        {
            $admin->adminUser($row['user_id']); 
        }
    }
    elseif($_SESSION['role'] == 'Author') 
    {
        $result = $admin->findUserId($_POST['email']);
        while($row = $result->fetch_assoc())
        {
            $admin->authorUser($_SESSION['user_id']);
        } 	
    }
    elseif($_SESSION['role'] == 'Conference Chairman')
    {
        $result = $admin->findUserId($_POST['email']);
        while($row = $result->fetch_assoc())
        {
            $admin->chairmanUser($_SESSION['user_id']);
        }    		
    }
    elseif($_SESSION['role'] == 'Reviewer')
    {
        $result = $admin->findUserId($_POST['email']);
        while($row = $result->fetch_assoc())
        {
            $admin->reviewerUser($_SESSION['user_id']);
        }  
    }

    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('User Created Successfully!');
        window.location.href='AdminHomeUI.php';
    </script>");
}
?>