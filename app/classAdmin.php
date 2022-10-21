<?php
namespace App;
use App\classUser;
	class classAdmin extends classUser{

		public function viewAccount(){
			$conn = OpenCon();
			$query = "SELECT * FROM user";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
			return $result;
		}

		public function viewAccountByID($recordId){
			$conn = OpenCon();
			$query = "SELECT * FROM user where id = '$recordId'";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
			return $result;
		}

		public function viewUserRole(){
			$conn = OpenCon();
			$query = "SELECT * FROM userrole";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
			return $result;
		}

		public function viewUserRoleByID($recordId){
			$conn = OpenCon();
			$query = "SELECT * FROM userrole where id = '$recordId'";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
			return $result;
		}

		public function registerAccount($name, $surname, $email, $phone, $password, $gender, $address) {
			$errorMsg = '';
			// Check if username already exists
			$query = "SELECT * FROM user WHERE email='".$email."'";
			$conn = OpenCon();
			$result = mysqli_query($conn,$query);
			$rowCount = mysqli_num_rows($result);
			//if the username is not in db then insert to the table
			if ($rowCount == 0) {
				$sql = "INSERT INTO user (first_name, last_name, email, gender, address, contact, password) 
						VALUES('$name', '$surname', '$email','$gender', '$address', '$phone', '$password')"; 
				$result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
				return $result; // If insert successful, it should return 1 (number of rows inserted)
			}
			else { 
				return false;
			}
		}
		
		public function registerUserRole($userId, $role) {
			$errorMsg = '';
			// Check if username already exists
			$query = "SELECT * FROM userrole WHERE userId='".$userId."'";
			$conn = OpenCon();
			$result = mysqli_query($conn,$query);
			$rowCount = mysqli_num_rows($result);
			//if the username is not in db then insert to the table
			if ($rowCount == 0) {
				$sql = "INSERT INTO userrole (userId, role) 
						VALUES('$userId', '$role')"; 
				$result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
				return $result; // If insert successful, it should return 1 (number of rows inserted)
			}
			else { 
				return false;
			}
		}

		public function suspendUserRole($userId, $role) {
			$errorMsg = '';
			$conn = OpenCon();
			$sql = "UPDATE userrole SET userId='$userId',role='$role' WHERE userId='$userId'"; 
			$result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot suspend");
			if($result)
				return $result; // If insert successful, it should return 1 (number of rows inserted)
			else { 
				return false;
			}
			
		}

		public function updateUser($id,$name, $surname, $email, $phone, $password, $gender, $address) {
			$errorMsg = '';
			// Check if username already exists
			// $query = "SELECT * FROM user WHERE email='".$email."'";
			$conn = OpenCon();
			$sql = "UPDATE user SET first_name='$name',last_name='$surname',email='$email',gender='$gender',address='$address',contact='$phone',password='$password' WHERE id='$id'";
			$result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot update");
			if($result)
				return $result; // If insert successful, it should return 1 (number of rows inserted)
			else { 
				return false;
			}
		}

		public function updateUserRole($id,$userId, $role) {
			$errorMsg = '';
			// Check if username already exists
			$conn = OpenCon();
			$sql = "UPDATE userrole SET userId='$userId',role='$role' WHERE id='$id'";
			$result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot update");
			if($result)
				return $result; // If insert successful, it should return 1 (number of rows inserted)
			else { 
				return false;
			}
		}

	}	
		
?>