<?php
include 'database.php';
	class User {

		//find user_id
		public function findUserId($email)
		{
			$conn = OpenCon();
			$query = "SELECT user_id FROM user WHERE email = '$email'";
			$result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . " Data cannot found");
			return $result;
		}

		//admin
		public function adminUser($user_id)
		{
			$conn = OpenCon();
			$query = "INSERT INTO system_administrator (admin_id) 
						VALUES('$user_id')";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
			return $result; // If insert successful, it should return 1 (number of rows inserted)
		}

		//author
		public function authorUser($user_id)
		{
			$conn = OpenCon();
			$query = "INSERT INTO author (author_id) 
						VALUES('$user_id')";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
			return $result; // If insert successful, it should return 1 (number of rows inserted)
		}

		//chairman
		public function chairmanUser($user_id)
		{
			$conn = OpenCon();
			$query = "INSERT INTO conference_chairman (chairman_id) 
						VALUES('$user_id')";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
			return $result; // If insert successful, it should return 1 (number of rows inserted)
		}

		//reviewer
		public function reviewerUser($user_id)
		{
			$conn = OpenCon();
			$query = "INSERT INTO reviewer (reviewer_id) 
						VALUES('$user_id')";
			$result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
			return $result; // If insert successful, it should return 1 (number of rows inserted)
		}

		// Login
		public function login($username, $password){
			$conn = OpenCon();
			$query="SELECT user_id, email, full_name, role, user_status from user WHERE email='$username' and password='$password'";
        	$result = mysqli_query($conn,$query);

			$data = mysqli_fetch_array($result);
        	$count_row = mysqli_num_rows($result);
			$_SESSION['login'] = true;
			$_SESSION['email'] = $data['email'];
			$_SESSION['full_name'] = $data['full_name'];
			$_SESSION['role'] = $data['role'];
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['user_status'] = $data['user_status'];

			if ($count_row == 1) 
			{
				if($data['user_status'] != 'Suspend') 
				{
					return true;
				} 
				else 
				{
					$_SESSION['errorLogin'] = 'Account has been suspended';
					return false;
				}
			}
	        else
			{
				$_SESSION['errorLogin'] = 'Invalid Username or Password!';
			    return false;
			}
    	}
		
		// Log out
		public function logout() 
		{
			// Destroy session
			session_unset();
		}
	}
?>