<?php
include 'classAdmin.php';
include 'AdminUserInfoUI.php';

class controllerUpdateUser
{
    public $errorEdit = '';

    public function editUser($userid, $newname, $newpw, $role)
    {
        $admin = new Admin;

        if (isset($_POST['update']))
        {
            $userid = $_POST['userid'];
            $newname = $_POST['newname'];
            $newpw = $_POST['newpw'];
            $role = $_POST['role'];

            $_SESSION["userid"] = $userid;
            $_SESSION["newname"] = $newname;
            $_SESSION["newpw"] = $newpw;
            $_SESSION["role"] = $role;

            $result= $admin->editUser($userid, $newname, $newpw, $role);
            return $result;
        }
    }
}

$function = new controllerUpdateUser; 
$editResult = $function->editUser($_POST['userid'], $_POST['newname'], ['newpw'], $_POST['role']);
if($editResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('User Updated Successfully!');
        window.location.href='AdminHomeUI.php';
    </script>");
}
?>