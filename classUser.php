<?php
include 'database.php';
	class User{
		// Login Function 
		public function login($username, $password){
			$conn = OpenCon();
			$query="SELECT id, first_name, last_name from user WHERE email='$username' and password='$password'";
        	$result = mysqli_query($conn,$query);

			$data = mysqli_fetch_array($result);
        	$count_row = mysqli_num_rows($result);
	        if ($count_row == 1) {
	            $_SESSION['login'] = true;
	            $_SESSION['first_name'] = $data['first_name'];
				$_SESSION['last_name'] = $data['last_name'];
				$_SESSION['id'] = $data['id'];
				
				//check role
				$userId = $data["id"];
				$query= "SELECT userId, role from userrole WHERE userId = '$userId'";
				$result = mysqli_query($conn,$query);
				$data = mysqli_fetch_array($result);
				$count_row = mysqli_num_rows($result);
				if ($count_row == 1) {
					$_SESSION['role'] = $data['role'];
					if($data['role'] != 'Suspend') {
						return true;
					} else {
						$_SESSION['error'] = 'Account has been suspended';
						return false;
					}
				}
	        }
	        else{
				$_SESSION['error'] = 'Invalid Username and Password!';
			    return false;
			}
    	}
		// Log out
		public function logout() {
			// Destroy session and redirect to login page
			session_unset();
			header('Location: MainPage.php');
		}
		
	}
?>