<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
//Session start
session_start();
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
if($pageRefreshed == 1){
    session_destroy();
}

function displayUserLoginUI() {
  $errorLogin = '';

  //Display Error
  if(isset($_SESSION["errorLogin"])) 
  {
		$errorLogin = $_SESSION["errorLogin"];
	}
?>
<style>
  * {
    padding: 0px;
    margin: 0px;
  }

  body {
    background-image: url('./images/frontpage_husky.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  main {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 90vh;
    width: 100%;
    background-size: cover;
  }
  
  .email {
  width: 80%;
  color: rgb(38, 50, 56);
  font-size: 12px;
  letter-spacing: 1px;
  padding: 10px 5px;
  box-sizing: border-box;
  border: 0.8px solid;
  text-align: center;
  font-family: Arial;
  margin-bottom: 10px;
  }

  .pw {
  width: 80%;
  color: rgb(38, 50, 56);
  font-size: 12px;
  letter-spacing: 1px;
  padding: 10px 30px;
  box-sizing: border-box;
  border: 0.8px solid;
  text-align: center;
  font-family: Arial;
  margin-bottom: 20px;
  }

  .login {
  cursor: pointer;
  color: #fff;
  background: #282120;
  border: 0;
  width: 80%;
  padding-bottom: 10px;
  padding-top: 10px;
  font-family: Arial;
  font-size: 13px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
  }

  .errorMsg 
  {
    color: red;
    text-align: center;
    font-family: Arial;
    font-size: 15px;
  }
</style>
</head>
<body>
  <main>
    <div style="text-align:center; position: absolute; bottom: 50px;">
      <form action="controllerUser.php" method="post">
        <input class="email" type="text" align="center" placeholder="Enter Email" name="username"><br>
        <input class="pw" type="password" align="center" placeholder=" Enter Password" name="password"><br>
        <p class="errorMsg"> <?php if (isset($errorLogin)) echo $errorLogin;?></p><br>
        <button class="login" type = "submit" name = "login" value = "login">
        Login
        </button>
      </form>       
    </div>
  </main>
</body>
<?php
}
displayUserLoginUI()
?>
</html>