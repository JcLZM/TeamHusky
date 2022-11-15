<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
function displayUserLoginUI() {
  $errorLogin = '';

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
  padding: 10px 60px;
  box-sizing: border-box;
  border: 0.8px solid;
  text-align: center;
  font-family: Arial;
  margin-bottom: 20px;
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
  }
</style>
</head>
<body>
  <main>
    <div style="text-align:center; position: absolute; bottom: 50px;">
      <form action="../controller/controllerUser.php" method="post">
        <input class="email" type="text" align="center" placeholder="Enter Email" name="username">
        <input class="pw" type="password" align="center" placeholder=" Enter Password" name="password">
        <span class="errorMsg"> <?php echo $errorLogin;?></span><br>
        <button class="login" type = "submit" name = "login" value = "login">
        Login
        </button><br>
      </form>       
    </div>
  </main>
</body>
<?php
}
displayUserLoginUI()
?>
</html>