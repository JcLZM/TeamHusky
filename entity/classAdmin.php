<?php
include "classUser.php";

class Admin extends User{

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
                    VALUES('$email','$fullname', '$password', '$role', '$status')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }

    //Halfway thru
    public function searchUser($fullname, $role)
    {
        $conn = OpenCon();
        $query = "SELECT id, email, full_name, role, status FROM user WHERE full_name = '$fullname' and role='$role'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function suspendUser($id, $status) {
        $errorMsg = '';
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