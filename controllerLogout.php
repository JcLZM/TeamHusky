<?php
include 'classUser.php';

class controllerLogout
{
    public function logout()
    {
        $user = new User;
        // When user click on logout button
		$user -> logout();
        header("location:UserLoginUI.php");
    }
}

//Logout User
$logoutfunction = new controllerLogout;
$logoutresult = $logoutfunction -> logout();
if($logoutresult)
{
    header("location:UserLoginUI.php");
}
?>