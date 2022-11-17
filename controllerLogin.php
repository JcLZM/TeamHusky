<?php
include 'classUser.php';

//Session start
session_start();

$_SESSION['errorLogin'] ='';

class controllerLogin {

    public $errorLogin = '';

    //login
    public function login($username, $password)
    {
        $user = new User;

        if(isset($_POST['login'])) 
        {
            //Validate Login
            if (empty($username)|| empty($password))
            {
                $errorLogin = 'Username or Password cannot be blank!';
                $_SESSION['errorLogin'] = $errorLogin;
                
                header("location:UserLoginUI.php");	
            }
            else
            {
                //if login sucess check for user/pass role
                $result = $user -> login($username, $password);
                if($result) 
                {
                    return $result;
                } 
                else 
                {
                    // $errorLogin = 'Wrong username or password!';
                    // $_SESSION['errorLogin'] = $errorLogin;
                    header("location:UserLoginUI.php");	
                }
            }
        }
    }
}

//cast login session
if(isset($_SESSION['login']))
{
    $login = isset($_SESSION['login']);
}

$user = new User;
$loginfunction = new controllerLogin;
$loginresult = $loginfunction -> login($_POST['username'], $_POST['password']);
//If login not empty, check for role
if (!empty($loginresult))
{
    if($_SESSION['role'] == 'System Administrator') 
    {
        header("location:AdminHomeUI.php");
    }
    elseif($_SESSION['role'] == 'Author') 
    {
        header("location:AuthorHomeUI.php");	
    }
    elseif($_SESSION['role'] == 'Conference Chairman')
    {
        // header("location:restaurantstaff.php");		
    }
    elseif($_SESSION['role'] == 'Reviewer')
    {
        header("location:ReviewerHomeUI.php");		
    }
}
else
{
    header("location:UserLoginUI.php");	
}
?>