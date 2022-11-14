<!DOCTYPE html>
<title>Author's Dashboard - TeamHusky Conference Systems</title>
<head>
    <div class="topnav">
        <a class="active" href="#home">TeamHusky Research Conference</a> <!-- should load dashboard again-->
        
        <span style="float:right">
            
            <a href="#logout">Logout</a> <!-- should run logout function / close session, return to login page-->
            
        </span>
        <span style = "float:right; color:#f4f4f4;">Hello, AUTHORNAME, AUTHORID</span>

    </div>
    <style>
        body { 
            background-color: #f4f4f4;
        }
        
        .topnav {
            background-color: #414042;
            overflow: hidden;
        }
        
        /* navigation bar */
        .topnav a {
            float: left;
            color: #f4f4f4;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            font-family:Arial;
        }
        
        .mainbox table{
            width:80%;
            border:2px;
            position: absolute;
            top:40%;
            transform:translate(0, -50%);
            padding: 2px;
            border-style:solid;
        }
        .mainbox table tr{
            border: 2px;
            border-color:#000000;
            width:20%;
            height:50px;
            border-style:solid
        }
        
        .midbutton{
            position:absolute;
            top:15%;
            margin:auto;
            padding-left: 85%;
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            position: relative;
            background-color: #f4f4f4;
            margin: auto;
            padding: 0;
            top:50%;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        }


        </style>
    <script>
        function submitPaper(){ //creates the popup
            var popup = document.getElementById("submitpaper")
            popup.style.display = "block";
        }

        function cancelPaperSubmit(){
            var popup = document.getElementById("submitpaper")
            popup.style.display = "none";
        }

        function confirmPaperSubmit(){
            var popup = document.getElementById("submitpaper")
            popup.style.display = "none";
            //store all the data in variables and submit it
            var papername = document.getElementById("papername");
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            cancelPaperSubmit();
}
    </script>
</head>

<?php
function displayAuthorDashboardUI(){
?>

<body>

    <div class="midbutton">
        <!-- just a button to submit papers-->
        <button onclick ="submitPaper()">Submit Papers</button>
        <div class="modal" id = "submitpaper">

            <table class="modal-content">
                <tr>
                    <td>Name of paper:</td>
                    <td><input type="text" id = "papername"></td>
                </tr>
                <tr>
                    <td>Authors:</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Paper Content</td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><button onclick="confirmPaperSubmit()">Confirm</button></td>
                    <td><button onclick="cancelPaperSubmit()" class = "close">Cancel</button></td>
                </tr>
            </table>
        </div>
        <!-- popup-->
    </div>

    <div class="mainbox">
        <table>
            <tr> 
                <td>Paper Number</td>
                <td>Paper Title</td>
                <td>Author(s)</td>
                <td>Status</td> 
                <td>Reviews</td>
             </tr>
            <tr> 
                <td>0000017</td> <!--Paper number from database-->
                <td>Email: a vector of contamination</td><!-- Paper title from database-->
                <td>name of author</td><!-- Author(s)-->
                <td>Pending Review</td><!-- status of paper-->
                <td>None</td>
            </tr>
            <tr> 
                <td>0000018</td> <!--Paper number from database-->
                <td>Email: a donut</td><!-- Paper title from database-->
                <td>name of author</td><!-- Author(s)-->
                <td>Reviewed</td><!-- status of paper-->
                <td><button>click to view</button></td> <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td>0000019</td> <!--Paper number from database-->
                <td>Tomato paste</td><!-- Paper title from database-->
                <td>name of author</td><!-- Author(s)-->
                <td>Pending Review</td><!-- status of paper-->
                <td><button>click to view</button></td> <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td>0000020</td> <!--Paper number from database-->
                <td>Red wiles</td><!-- Paper title from database-->
                <td>name of author</td><!-- Author(s)-->
                <td>Pending Review</td><!-- status of paper-->
                <td><button>click to view</button></td> <!-- should pull reviews from db-->
            </tr>
        </table>
    </div> 
</body>
<?php
}
displayAuthorDashboardUI()
?>
</html>