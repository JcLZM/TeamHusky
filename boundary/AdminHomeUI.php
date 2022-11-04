<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
    margin: 0;
    font-family: Arial;
    background-color: #f4f4f4;
    }

    .topnav {
    overflow: hidden;
    background-color: #414042;
    display: flex;
    align-items: center;
    }

    .topnav a {
    float: left;
    color: white;
    text-align: center;
    padding: 12px 15px;
    text-decoration: none;
    font-size: 17px;
    }

    .topnav a:hover {
    background-color: #282120;
    color: white;
    }

    .topnav h1 {
	color: white;
	font-size:17px;
    font-family: Arial;
    text-transform: uppercase;
    display: block;
    margin-right: 300px;
    margin-left: 300px;
    }

    .logout {
    cursor: pointer;
    border-radius: 5px;
    color: black;
    background: white;
    border: 0;
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 8px;
    padding-top: 8px;
    font-family: Arial;
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    float: right;
    display: block;
    margin: 0 auto;
    }

    .welcomeLogo img {
    width: 150px;
    height: 150px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 25px;
    }

    .welcomeLogo h1 {
    color: black;
	font-size:17px;
    font-family: Arial;
    text-transform: uppercase;
    text-align: center;
    margin-top: 25px;
    }

    .welcomeLogo h2 {
    color: black;
    font-size:17px;
    font-family: Arial;
    text-transform: uppercase;
    text-align: center;
    margin-top: 10px;
    }

    .search-container {
    text-align: center;
    margin-top: 30px;
    }

    .search-container input[type=text] {
    padding: 10px;
    margin-top: 8px;
    margin-right: 10px;
    margin-left: 10px;
    font-size: 13px;
    border: 0.8px solid;
    text-align: center;
    font-family: Arial;
    }

    .search-container button {
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 10px;
    padding-top: 10px;
    margin-top: 8px;
    margin-top: 30px;
    color: #fff;
    background: #282120;
    font-size: 13px;
    cursor: pointer;
    }
</style>
</head>
<body>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">Create User</a>
        <h1>TeamHusky Research Conference</h1>
        <button class="logout" type = "submit" name = "logout">
            Log Out
        </button>
    </div>

    <div class="welcomeLogo">
        <img src="./images/logo_husky.png"/>
        <h1>welcome back to system administrator</h1>
        <h2>XXX</h2>
    </div>

    <div class="search-container">
        <form>
            <input type="text" placeholder="Search email.." name="searchEmail">
            <input type="text" placeholder="Search role.." name="searchRole"><br>
            <button name="search" type="submit">Search</button>
        </form>
    </div>
</body>
</html>
