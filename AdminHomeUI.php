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

function displayAdminHomeUI() {
?>
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

    #myTable {
    border-collapse: collapse;
    width: 90%;
    margin-left: 60px;
    border: 1px solid #ddd;
    font-size: 18px;
    }

    #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
    }

    #myTable tr {
    border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
    background-color: #f1f1f1;
    }

    .errorMsg 
    {
        color: red;
        text-align: center;
        font-family: Arial;
        font-size: 10px;
    }
</style>
<title>Admin Home Page</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="AdminHomeUI.php">Home</a>
        <a href="AdminCreateUserUI.php">Create User</a>
        <h1>TeamHusky Research Conference</h1>
        <form action="controllerLogout.php" method="POST">
            <button class="logout" type = "submit" name = "logout">
                Log Out
            </button>
        </form>
    </div>

    <div class="welcomeLogo">
        <img src="./images/logo_husky.png"/>
        <h1>welcome back to system administrator</h1>
        <h2>XXX</h2>
    </div>

    <div class="search-container">
        <form action="controllerViewNSearchUser.php" method="post">
            <input type="text" placeholder="Search full name.." name="searchName">
            <input type="text" placeholder="Search role.." name="searchRole"><br>
            <button name="search" type="submit">Search / View</button>
            <button type="reset" name="reset"> Reset </button>
        </form>
    </div>
<?php
}

function displayUserList($userList)
{
    ?>
    <form action="AdminUserInfoUI.php" method="POST" >
    </br>
    <table id="myTable">
    <tr class="header">
        <th style = 'width:20%'>View Details</th>
        <th style="width:15%;">User ID</th>
        <th style="width:10%;">Email</th>
        <th style="width:10%;">Full Name</th>
        <th style="width:15%;">Role</th>
        <th style="width:15%;">Status</th>
        
    </tr>
    <?php
        while($row = $userList->fetch_assoc()) {?>
        <tr>
            <td align="center">
            <button name="view" style="border:none;background-color:white;outline:none;"value="<?php echo $row['user_id'] ?>">click <font color="blue"><u>here</u></font> to view</button>
            </td>
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['full_name'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><?php echo $row['user_status'] ?></td>
        </tr>
    <?php } ?>
    </table>
    </form>
<?php
}
?>
</body>
<?php
displayAdminHomeUI()
?>
</html>