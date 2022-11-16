<?php
include 'AdminHomeUI.php';
include 'classAdmin.php';

//Session start
session_start();

class controllerViewNSearchUser
{
    //search user
    public function ViewNSearchUser($searchName, $searchRole)
    {
        $admin = new Admin;

        if (isset($_POST['search']))
        {
            //Validate Search User
            if (empty($searchName) && empty($searchRole))
            {
                $viewUserList = $admin -> viewUser();
                return $viewUserList;
            }
            else
            {
                $searchName = $_POST['searchName'];
                $searchRole = $_POST['searchRole'];

                $_SESSION["searchName"] = $searchName;
                $_SESSION["searchRole"] = $searchRole;

                $userList= $admin->searchUser($searchName, $searchRole);
                return $userList;
            }
        }
    }
}

$viewNsearchfunction = new controllerViewNSearchUser; 
$viewNsearchResult= $viewNsearchfunction->ViewNSearchUser($_POST['searchName'], $_POST['searchRole']);
if($viewNsearchResult) 
{ 
    // if result is not false
    displayUserList($viewNsearchResult);
}
?>