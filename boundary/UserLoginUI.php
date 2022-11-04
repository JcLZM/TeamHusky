<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    font-weight: 700;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 10px 60px;
    box-sizing: border-box;
    border: 0.8px solid;
    text-align: center;
    font-family: 'Arial';
    margin-bottom: 20px;
    }

    .pw {
    width: 80%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 10px 30px;
    box-sizing: border-box;
    border: 0.8px solid;
    text-align: center;
    font-family: 'Arial';
    margin-bottom: 20px;
    }

    .submit {
    cursor: pointer;
    color: #fff;
    background: #282120;
    border: 0;
    padding-left: 97px;
    padding-right: 97px;
    padding-bottom: 10px;
    padding-top: 10px;
    font-family: 'Arial';
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

  </style>
  <body>
    <main>
      <div style="text-align:center; position: absolute; bottom: 50px;">
        <form>
          <input class="email" type="text" align="center" placeholder="Enter Email" name="username"><br>
          <input class="pw" type="password" align="center" placeholder=" Enter Password" name="password"><br>
          <button class="submit" type = "submit" name = "login">
          Login
          </button><br>
        </form>       
      </div>
    </main>
  </body>
</html>