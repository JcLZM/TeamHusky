<!DOCTYPE html>
<?php
function displayAuthorDashboardUI(){
?>
<title>Author's Dashboard - TeamHusky Conference Systems</title>
<head>
    <div class="topnav">
        <a class="active" href="#home">TeamHusky Research Conference</a> <!-- should load dashboard again-->
        
        <span style="float:right">
            
            <a href="#logout">Logout</a> <!-- should run logout function / close session, return to login page-->
            
        </span>
        <span style = "float:right; color:#f4f4f4;">Hello, AUTHORNAME, AUTHORID</span>
        <!-- should load from db??-->

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
            var popup = document.getElementById("submitpaper");
            popup.style.display = "block";
        }

        function cancelPaperSubmit(){ 
            //closes popup
            //should clear all fields as well
            var popup = document.getElementById("submitpaper");
            popup.style.display = "none";
            var papername = document.getElementById("papername");
            var authors = document.getElementById("authors");
            var papercontent = document.getElementById("papercontent");
            papername.value = "";
            authors.value = "";
            papercontent.value = "";
        }

        function confirmPaperSubmit(){
            var popup = document.getElementById("submitpaper");
            popup.style.display = "none";
            //store all the data in variables and submit it
            var papername = document.getElementById("papername");
            var authors = document.getElementById("authors");
            var papercontent = document.getElementById("papercontent");
            
            //SOME CODE HERE JIA HAO LOOK AT IT
            //
            //
            //
            var paperName = papername.value
            
            //also clear it
            papername.value = "";
            authors.value = "";
            papercontent.value = "";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            var popup = document.getElementById("submitpaper");
            if (event.target == popup) {
                popup.style.display = "none";
                var papername = document.getElementById("papername");
                var authors = document.getElementById("authors");
                var papercontent = document.getElementById("papercontent");
                papername.value = "";
                authors.value = "";
                papercontent.value = "";
                    
            }
        }


        //Click to view reviews function
        
        function viewReviews(buttonID){
            //1.Get Paper Number(Should have been loaded in page.)
            var number = buttonID.substr(buttonID.length - 1);
            //alert(number)
            var paperNum = "num" + number
            //alert(paperNum)
            var paperID = document.getElementById(paperNum).innerHTML
            //alert(paperID)
            var statusNum = status + number
            var status = document.getElementById(statusNum).innerHTML
            if (status == "Pending Review"){
                return;
            } // if there are no reviews, end function here.

            //submit request to database and retrieve review (content, and the reviewer)
                //JIA HAO
                //run a query to get review
                //SELECT * FROM REVIEWS WHERE PAPER_ID LIKE paperID(variable)
                //reviewerid / reviewname + content + reviewer_rating
            //load it in, as a modal
                

            //allow author rating
        }
    </script>
</head>



<body>

    <div class="midbutton">
        <!-- just a button to submit papers-->
        <button onclick ="submitPaper()">Submit Papers</button>
        <div class="modal" id = "submitpaper">

            <table class="modal-content">
                <tr>
                    <td>Name of paper:</td>
                    <td><input style = width:500px type="text" id = "papername"></td>
                </tr>
                <tr>
                    <td>Authors:</td>
                    <td><input style = width:500px type="text" id = "authors"></td>
                </tr>
                <tr>
                    <td>Paper Content:</td>
                    <td><textarea style="height:200px;width:500px;resize:none;" id = "papercontent"></textarea></td>
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
                <td id = "num1">0000017</td> <!--Paper number from database-->
                <td id = "name1">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author1">name of author</td><!-- Author(s)-->
                <td id = "status1">Pending Review</td><!-- status of paper-->
                <td id = "button1" onClick="viewReviews(this.id)">None</td><!-- button should check status -->
            </tr>
            <tr> 
                <td id = "num2">0000027</td> <!--Paper number from database-->
                <td id = "name2">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author2">name of author</td><!-- Author(s)-->
                <td id = "status2">Pending Review</td><!-- status of paper-->
                <td id = "button2" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num3">0000037</td> <!--Paper number from database-->
                <td id = "name3">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author3">name of author</td><!-- Author(s)-->
                <td id = "status3">Pending Review</td><!-- status of paper-->
                <td id = "button3" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num4">0000047</td> <!--Paper number from database-->
                <td id = "name4">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author4">name of author</td><!-- Author(s)-->
                <td id = "status4">Pending Review</td><!-- status of paper-->
                <td id = "button4" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num5">0000057</td> <!--Paper number from database-->
                <td id = "name5">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author5">name of author</td><!-- Author(s)-->
                <td id = "status5">Pending Review</td><!-- status of paper-->
                <td id = "button5" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num6">0000067</td> <!--Paper number from database-->
                <td id = "name6">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author6">name of author</td><!-- Author(s)-->
                <td id = "status6">Pending Review</td><!-- status of paper-->
                <td id = "button6" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num7">0000067</td> <!--Paper number from database-->
                <td id = "name7">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author7">name of author</td><!-- Author(s)-->
                <td id = "status7">Pending Review</td><!-- status of paper-->
                <td id = "button7" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num8">0000077</td> <!--Paper number from database-->
                <td id = "name8">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author8">name of author</td><!-- Author(s)-->
                <td id = "status8">Pending Review</td><!-- status of paper-->
                <td id = "button8" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num9">0000087</td> <!--Paper number from database-->
                <td id = "name9">Email: a vector of contamination</td><!-- Paper title from database-->
                <td id = "author9">name of author</td><!-- Author(s)-->
                <td id = "status9">Pending Review</td><!-- status of paper-->
                <td id = "button9" onClick="viewReviews(this.id)"><button>click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
        </table>
    </div> 
</body>
<?php
}
displayAuthorDashboardUI()
?>
</html>