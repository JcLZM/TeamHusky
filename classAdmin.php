<?php
include "classUser.php";

class Admin extends User{

    //Create Account & Role (2 user stories combined)
    public function createUser($email, $fullname, $password, $role, $user_status) {
        $errorMsg = '';
        // Check if username already exists
        $query = "SELECT * FROM user WHERE email='".$email."'";
        $conn = OpenCon();
        $result = mysqli_query($conn,$query);
        $rowCount = mysqli_num_rows($result);
        //if the username is not in db then insert to the table
        if ($rowCount == 0) {
            $sql = "INSERT INTO user (email, full_name, password, role, user_status) 
                    VALUES('$email','$fullname', '$password', '$role', '$user_status')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }

    //Search UserWithRole (2 user stories combined)
    public function searchUser($fullname, $role)
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, user_status 
                  FROM user 
                  WHERE full_name LIKE '%$fullname%'  
                  AND role LIKE '%$role%'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //View Account & Role (2 user stories combined)
    public function viewUser() 
    {
        $conn = OpenCon();
        $query = "SELECT user_id, email, full_name, role, user_status 
                  FROM user";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //View Account & Role for Edit User stories(2 user stories combined)
    public function showUserDetails($user_id) 
    {
        $conn = OpenCon();
        $query = "SELECT *
                  FROM user
                  WHERE user_id='$user_id'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Edit Account & Role (2 user stories combined)
    public function editUser($user_id, $fullname, $password, $role)
    {
        $conn = OpenCon();
        $sql = "UPDATE user SET full_name='$fullname' , password='$password', role='$role' WHERE user_id='$user_id'"; 
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot suspend");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //Suspend Account & Role (2 user stories combined)
    public function suspendUser($user_id, $user_status) 
    {
        $conn = OpenCon();
        $sql = "UPDATE user SET user_id='$user_id', user_status='$user_status' WHERE user_id='$user_id'"; 
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot suspend");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }
}
?>