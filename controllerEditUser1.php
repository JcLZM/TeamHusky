<?php
include 'classAdmin.php';
include 'AdminUserInfoUI.php';

class controllerUpdateUser1
{
    //update user
    public function showUserDetails($userid)
    {
        $admin = new Admin;

        $updateUserList= $admin->showUserDetails($userid);
        return $updateUserList;
    }
}

$function = new controllerUpdateUser1; 
$showResult= $function->showUserDetails($_POST['view']);
if($showResult) 
{ 
    // if result is not false
    displayUpdateUserList($showResult);
}
?>