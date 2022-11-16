<?php
include 'AdminHomeUI.php';
include 'classAdmin.php';

class controllerSearchUser
{
    public function searchUser($fullname, $role)
    {
        $admin = new Admin;
        $userList= $admin->searchUser($fullname, $role);
        return $userList;
    }
}

$searchUserErr = '';

if (isset($_POST['search'])) 
{
    $searchName = $_POST['searchName'];
    $searchRole = $_POST['searchRole'];

    if (empty($_POST["searchName"]) || empty($_POST["searchRole"])) 
    { 
        $searchUserErr = "Enter a name and role to search!"; 
    }
    else
    {
        $searchName = $_POST["searchName"];
        $searchRole = $_POST["searchRole"];
    }

    $_SESSION["searchUserErr"] = $searchUserErr;
    $_SESSION["searchName"] = $searchName;
    $_SESSION["searchRole"] = $searchRole;

    if($searchUserErr=='') 
    {
        $searchfunction = new controllerSearchUser; 
        $searchResult= $searchfunction->searchUser($searchName, $searchRole);
        if($searchResult) 
        { 
            // if result is not false
            displayUserList($searchResult);
        }
    }
}
?>