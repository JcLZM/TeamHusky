<?php
include 'database.php';
	class User {
		// Login Function 
		public function login($username, $password){
			$conn = OpenCon();
			$query="SELECT id, email, full_name, role, status from user WHERE email='$username' and password='$password'";
        	$result = mysqli_query($conn,$query);

			$data = mysqli_fetch_array($result);
        	$count_row = mysqli_num_rows($result);
			$_SESSION['login'] = true;
			$_SESSION['email'] = $data['email'];
			$_SESSION['full_name'] = $data['full_name'];
			$_SESSION['role'] = $data['role'];
			$_SESSION['id'] = $data['id'];
			$_SESSION['status'] = $data['status'];

			if ($count_row == 1) {
				if($data['status'] != 'Suspend') {
					return true;
				} else {
					$_SESSION['error'] = 'Account has been suspended';
					return false;
				}
			}
	        else{
				$_SESSION['error'] = 'Invalid Username or Password!';
			    return false;
			}
    	}
		// Log out
		public function logout() {
			// Destroy session
			session_unset();
		}
		
	}
?>