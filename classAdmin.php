<?php
include "classUser.php";

class Admin extends User{

    //Create Account & Role (2 user stories combined)
    public function createUser($email, $fullname, $password, $role, $status) {
        $errorMsg = '';
        // Check if username already exists
        $query = "SELECT * FROM user WHERE email='".$email."'";
        $conn = OpenCon();
        $result = mysqli_query($conn,$query);
        $rowCount = mysqli_num_rows($result);
        //if the username is not in db then insert to the table
        if ($rowCount == 0) {
            $sql = "INSERT INTO user (email, full_name, password, role, status) 
                    VALUES('$email','$fullname', md5('$password'), '$role', '$status')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }

    //Search UserWithRole (2 user stories combined)
    public function searchUserWithRole($fullname, $role)
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, status 
                  FROM user 
                  WHERE full_name LIKE '%$fullname%' 
                  AND 
                  WHERE role LIKE '%$role%'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Search User (2 user stories combined)
    public function searchUser($fullname)
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, status 
                  FROM user 
                  WHERE full_name LIKE '%$fullname%'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Search Role (2 user stories combined)
    public function searchRole($role)
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, status 
                  FROM user 
                  WHERE full_name LIKE '%$role%'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //View Account & Role (2 user stories combined)
    public function viewUser() 
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, status 
                  FROM user";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Show User Details for users to edit (Edit Account & Role user stories)
    public function showUserDetails() 
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, status 
                  FROM user";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Edit Account & Role (2 user stories combined)
    public function editUser($user_id, $password, $role)
    {
        $conn = OpenCon();
        $sql = "UPDATE user SET password='$password', role='$role' WHERE user_id='$user_id'"; 
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot suspend");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //Suspend Account & Role (2 user stories combined)
    public function suspendUser($id, $status) 
    {
        $conn = OpenCon();
        $sql = "UPDATE user SET id='$id', status='$status' WHERE id='$id'"; 
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot suspend");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }
}
?>