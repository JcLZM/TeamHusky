<?php
include 'database.php';
	class User {

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