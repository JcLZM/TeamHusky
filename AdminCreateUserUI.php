<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
function displayAdminCreateUserUI() {
    // Declare variables for errors
    $emailErr = '';
    $fullnameErr = '';
    $passwordErr = '';
    $roleErr = '';

    // Declare Variable for sticky form 
    $email = '';
    $fullname = '';
    $password = '';
    $role = '';

    // Validate Session Variables from Registration Controller
	if(isset($_SESSION["emailErr"])) {
		$emailErr = $_SESSION["emailErr"];
	}
	if(isset($_SESSION["fullnameErr"])) {
		$fullnameErr = $_SESSION["fullnameErr"];
	}
	if(isset($_SESSION["passwordErr"])) {
		$passwordErr = $_SESSION["passwordErr"];
	}
    if(isset($_SESSION["roleErr"])) {
		$roleErr = $_SESSION["roleErr"];
	}

    // Variables for Sticky Form 
	if(isset($_SESSION["email"])) {
		$email = $_SESSION["email"];
	}
	if(isset($_SESSION["fullname"])) {
		$fullname = $_SESSION["fullname"];
	}
	if(isset($_SESSION["password"])) {
		$password = $_SESSION["password"];
	}
    if(isset($_SESSION["role"])) {
		$role = $_SESSION["role"];
	}
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

    .createuserform-container {
    position: relative;
    width:100%;
    height:40em;
    }

    .createuserform-container form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    }

    .createuserform-container h2 {
    font-size:17px;
    font-family: Arial;
    text-align: center;
    margin-bottom: 20px;
    }

    .email, .fullname {
    width: 100%;
    color: rgb(38, 50, 56);
    font-size: 12px;
    letter-spacing: 1px;
    padding: 10px 60px;
    box-sizing: border-box;
    border: 0.8px solid;
    text-align: center;
    font-family: Arial;
    margin-bottom: 30px;
    }

    .pw, .confirmpw {
    width: 100%;
    color: rgb(38, 50, 56);
    font-size: 12px;
    letter-spacing: 1px;
    padding: 10px 30px;
    box-sizing: border-box;
    border: 0.8px solid;
    text-align: center;
    font-family: Arial;
    margin-bottom: 30px;
    }

    .button 
    {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 300px;
    }

    .enter, .reset {
    cursor: pointer;
    color: #fff;
    background: #282120;
    border: 0;
    width: 45%;
    padding-bottom: 10px;
    padding-top: 10px;
    font-family: Arial;
    font-size: 13px;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    display:inline-block;
    }

    .custom-select {
    position: relative;
    font-family: Arial;
    margin-bottom: 30px;
    font-size: 13px;
    }

    .custom-select select {
    display: none; /*hide original SELECT element: */
    }

    .select-selected {
    background-color: white;
    }

    /* Style the arrow inside the select element: */
    .select-selected:after {
    position: absolute;
    content: "";
    top: 14px;
    right: 10px;
    width: 0;
    height: 0;
    border: 6px solid;
    border-color: black transparent transparent transparent;
    }

    /* Point the arrow upwards when the select box is open (active): */
    .select-selected.select-arrow-active:after {
    border-color: transparent transparent black transparent;
    top: 7px;
    }

    /* style the items (options), including the selected item: */
    .select-items div,.select-selected {
    padding: 8px 16px;
    border: 1px solid;
    cursor: pointer;
    text-align: center;
    }

    /* Style items (options): */
    .select-items {
    position: absolute;
    background-color: white;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 99;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
    display: none;
    }

    .select-items div:hover, .same-as-selected {
    background-color: #f4f4f4;
    }
</style>
<title>Admin Create User</title>
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

    <div class="createuserform-container">
        <form action="controllerCreateUser.php" method="POST">
            <h2>Enter User's Information</h2>
            <input class="email" type="text" align="center" placeholder="Enter Email" name="username"><br>
            <span class="errorMsg"> <?php echo $emailErr;?></span>
            <input class="fullname" type="text" align="center" placeholder=" Enter Full Name" name="fullname"><br>
            <span class="errorMsg"> <?php echo $fullnameErr;?></span>
            <input class="pw" type="password" align="center" placeholder=" Enter Password" name="password"><br>
            <span class="errorMsg"> <?php echo $passwordErr;?></span>
            <input class="confirmpw" type="password" align="center" placeholder=" Confirm Password" name="confirmpw"><br>
            <div class="custom-select" style="width:100%;">
                <select name="role">
                <option value="0">Select Role:</option>
                <option value="1">System Administrator</option>
                <option value="2">Author</option>
                <option value="3">Conference Chairman</option>
                <option value="4">Reviewer</option>
                </select>
                <span class="errorMsg"> <?php echo $roleErr;?></span>
            </div>
            <p class="button">
            <button class="enter" type = "submit" name = "enter">
            Enter
            </button>
            <button class="reset" type="reset" name="reset"> 
            Reset
            </button>
            </p>
        </form>       
    </div>

    <script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
                s.selectedIndex = i;
                h.innerHTML = this.innerHTML;
                y = this.parentNode.getElementsByClassName("same-as-selected");
                yl = y.length;
                for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
                }
                this.setAttribute("class", "same-as-selected");
                break;
            }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
        arrNo.push(i)
        } else {
        y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
        }
    }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
    </script>
</body>
<?php
}
displayAdminCreateUserUI() 
?>
</html>