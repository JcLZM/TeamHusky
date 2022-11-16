<?php
include 'classAdmin.php';

class controllerSuspendUser
{
    public function suspendUser($userid)
    {
        $admin = new Admin;

        if (isset($_POST['suspend']))
        {
            $userid = $_POST['userid'];
            $_SESSION["userid"] = $userid;

            $user_status = "Suspend";
            $result = $admin->suspendUser($userid, $user_status);
            return $result;
        }
    }
}

$suspendFunction = new controllerSuspendUser;
$suspendResult = $suspendFunction->suspendUser($_POST['userid']);
if($suspendResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('User Suspended Successfully!');
        window.location.href='AdminHomeUI.php';
    </script>");
}
?>