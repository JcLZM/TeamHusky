<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
function displayAuthorHomeUI(){
?>
<title>Author's Dashboard - TeamHusky Conference Systems</title>
<head>
    <div class="topnav">
        <a class="active">TeamHusky Research Conference</a> <!-- should load dashboard again-->
        
        <span style="float:right">
            
            <a href="controllerLogout.php">Logout</a> <!-- should run logout function / close session, return to login page--> 
            <!-- jiahao -->
            
        </span>
        <span id = "userGreeting">Hello, AUTHORNAME, AUTHORID</span>
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

        #userGreeting{
            top:3%;
            left:80%;
            color:#f4f4f4;
            position:absolute;
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
        #rRadio1, #rRadio2, #rRadio3 {
            visibility:hidden;
        }

        </style>
   
</head>



<body onLoad = "loadTable()">

    <div class="midbutton">
        <!-- submit papers modal -->
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

    <div class = "modal" id = "viewReview">
        <table class ="modal-content" style = "width:80%">
            <tr>
                <th>Review Number</td> <!-- review id-->
                <th>Reviewer Name</td> <!-- reviewer-->
                <th>Review</td> <!-- score, from 3 to -3-->
                <th>Rating</td>
                <th>Rate this Review</td>
            </tr>
            <tr> 
                <td id = "rNo1"></td>
                <td id = "rName1"></td>
                <td id = "rReview1"></td>
                <td id = "rScore1"></td>
                <td id = "rRadio1">
                    <input type="radio" id="1" name="review1rating" value = "1"> <label for="1">1</label><br>
                    <input type="radio" id="2" name="review1rating" value = "2"> <label for="2">2</label><br>
                    <input type="radio" id="3" name="review1rating" value = "3"> <label for="3">3</label><br>
                    <input type="radio" id="4" name="review1rating" value = "4"> <label for="4">4</label><br>
                    <input type="radio" id="5" name="review1rating" value = "5"> <label for="5">5</label>
                </td>
            </tr>
            <tr> 
                <td id = "rNo2"></td>
                <td id = "rName2"></td>
                <td id = "rReview2"></td>
                <td id = "rScore2"></td>
                <td id = "rRadio2">
                    <input type="radio" id="1" name="review2rating" value = "1"> <label for="1">1</label><br>
                    <input type="radio" id="2" name="review2rating" value = "2"> <label for="2">2</label><br>
                    <input type="radio" id="3" name="review2rating" value = "3"> <label for="3">3</label><br>
                    <input type="radio" id="4" name="review2rating" value = "4"> <label for="4">4</label><br>
                    <input type="radio" id="5" name="review2rating" value = "5"> <label for="5">5</label>
                </td>
            </tr>
            <tr> 
                <td id = "rNo3"></td>
                <td id = "rName3"></td>
                <td id = "rReview3"></td>
                <td id = "rScore3"></td>
                <td id = "rRadio3">
                    <input type="radio" id="1" name="review3rating" value = "1"> <label for="1">1</label><br>
                    <input type="radio" id="2" name="review3rating" value = "2"> <label for="2">2</label><br>
                    <input type="radio" id="3" name="review3rating" value = "3"> <label for="3">3</label><br>
                    <input type="radio" id="4" name="review3rating" value = "4"> <label for="4">4</label><br>
                    <input type="radio" id="5" name="review3rating" value = "5"> <label for="5">5</label>
                </td>
            </tr>
            <tr>
                <td colspan = "3"><button onClick = "confirmViewReview()">Confirm</button></td> <!-- both should clear all fields.-->
                <td colspan = "2"><button onClick = "cancelViewReview()">Cancel</button></td>
        </table>

    </div>

    <div class="mainbox">
        <table>
            <tr> 
                <th>Paper Number</td>
                <th>Paper Title</td>
                <th>Author(s)</td>
                <th>Status</td> 
                <th>Reviews</td>
             </tr>
            <tr> 
                <td id = "num1"></td> <!--Paper number from database-->
                <td id = "name1"></td><!-- Paper title from database-->
                <td id = "author1"></td><!-- Author(s)-->
                <td id = "status1"></td><!-- status of paper-->
                <td id = "button1" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
            </tr>
            <tr> 
                <td id = "num2"></td> <!--Paper number from database-->
                <td id = "name2"></td><!-- Paper title from database-->
                <td id = "author2"></td><!-- Author(s)-->
                <td id = "status2"></td><!-- status of paper-->
                <td id = "button2" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num3"></td> <!--Paper number from database-->
                <td id = "name3"></td><!-- Paper title from database-->
                <td id = "author3"></td><!-- Author(s)-->
                <td id = "status3"></td><!-- status of paper-->
                <td id = "button3" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num4"></td> <!--Paper number from database-->
                <td id = "name4"></td><!-- Paper title from database-->
                <td id = "author4"></td><!-- Author(s)-->
                <td id = "status4"></td><!-- status of paper-->
                <td id = "button4" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num5"></td> <!--Paper number from database-->
                <td id = "name5"></td><!-- Paper title from database-->
                <td id = "author5"></td><!-- Author(s)-->
                <td id = "status5"></td><!-- status of paper-->
                <td id = "button5" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num6"></td> <!--Paper number from database-->
                <td id = "name6"></td><!-- Paper title from database-->
                <td id = "author6"></td><!-- Author(s)-->
                <td id = "status6"></td><!-- status of paper-->
                <td id = "button6" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num7"></td> <!--Paper number from database-->
                <td id = "name7"></td><!-- Paper title from database-->
                <td id = "author7"></td><!-- Author(s)-->
                <td id = "status7"></td><!-- status of paper-->
                <td id = "button7" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num8"></td> <!--Paper number from database-->
                <td id = "name8"></td><!-- Paper title from database-->
                <td id = "author8"></td><!-- Author(s)-->
                <td id = "status8"></td><!-- status of paper-->
                <td id = "button8" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num9"></td> <!--Paper number from database-->
                <td id = "name9"></td><!-- Paper title from database-->
                <td id = "author9"></td><!-- Author(s)-->
                <td id = "status9"></td><!-- status of paper-->
                <td id = "button9" onClick="viewReviews(this.id)" style="visibility:hidden"><button>Click to view</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
        </table>
    </div> 
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

            var popup2 = document.getElementById("viewReview");
            if (event.target == popup2) {
                popup2.style.display = "none";
            }
        }


        //Click to view reviews function
        
        var numberOfReviews = 0; //global

        function viewReviews(buttonID){
            //1.Get Paper Number(Should have been loaded in page.)
            var number = buttonID.substr(buttonID.length - 1);
            //alert(number)
            var paperNum = "num" + number
            var paperID = document.getElementById(paperNum).innerText
            //alert(paperID)
            var statusNum = "status" + number
            var status = document.getElementById(statusNum).innerText
            if (status == "Pending Review"){
                //alert("wrong");
                return;
            } // if there are no reviews, end function here.

            //submit request to database and retrieve review (content, and the reviewer)
                //JIA HAO
                //run a query to get review
                //SELECT * FROM REVIEWS WHERE PAPER_ID LIKE paperID(variable)
                //reviewerid / reviewname + content + reviewer_rating
                //(FOR EACH REVIEW)

                //store in arrays?
                //const array1 = [reviewNo, reviewerNo, review, reviewerRating]
                //variables
                //current values for testing
                var reviewNo;
                var reviewerNo;
                var reviewerName;
                var review;
                var reviewerRating;

                //for testing vvvvvv
                numberOfReviews = 2;
                const array1 = ["00222011", "00028732", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 3];
                const array2 = ["00187171", "08987872", "Four score and seven years ago our fathers brought forth, upon this continent, a new nation, conceived in liberty, and dedicated to the proposition that all men are created equal.", -2]
                const array3 = ["","","",""]
                //for testing ^^^^^
            //query should return multiple results
                //populate the table with query
                //limit to 3 reviews per paper shown?    
                if (numberOfReviews >= 3){
                    numberOfReviews = 3;
                }
                //alert(numberOfReviews)
                switch(numberOfReviews){
                    case 3:
                        showReview3(array3);
                    case 2:
                        showReview2(array2);
                    case 1:
                        showReview1(array1);
                        showReviewModal();
                    break;
                    default:
                }
            //allow author rating
        }

        function showReviewModal(){
            var popup = document.getElementById("viewReview");
            popup.style.display = "block";
        }

        function showReview1(array1){
            document.getElementById("rNo1").innerText = array1[0]
            document.getElementById("rName1").innerText = array1[1]
            document.getElementById("rScore1").innerText = array1[3]
            document.getElementById("rReview1").innerText = array1[2]
            document.getElementById("rRadio1").style.visibility = "visible"
            //alert(array1[0])
        }

        function showReview2(array2){
            document.getElementById("rNo2").innerText = array2[0]
            document.getElementById("rName2").innerText = array2[1]
            document.getElementById("rScore2").innerText = array2[3]
            document.getElementById("rReview2").innerText = array2[2]
            document.getElementById("rRadio2").style.visibility = "visible"
        }

        function showReview3(array3){
            document.getElementById("rNo3").innerText = array3[0]
            document.getElementById("rName3").innerText = array3[1]
            document.getElementById("rScore3").innerText = array3[3]
            document.getElementById("rReview3").innerText = array3[2]
            document.getElementById("rRadio3").style.visibility = "visible"
        }

        function clearViewReview(){
            document.getElementById("rNo1").innerText = ""
            document.getElementById("rName1").innerText = ""
            document.getElementById("rScore1").innerText = ""
            document.getElementById("rReview1").innerText = ""
            document.getElementById("rRadio1").style.visibility = "hidden"
            document.getElementById("rNo2").innerText = ""
            document.getElementById("rName2").innerText = ""
            document.getElementById("rScore2").innerText = ""
            document.getElementById("rReview2").innerText = ""
            document.getElementById("rRadio2").style.visibility = "hidden"
            document.getElementById("rNo3").innerText = ""
            document.getElementById("rName3").innerText = ""
            document.getElementById("rScore3").innerText = ""
            document.getElementById("rReview3").innerText = ""
            document.getElementById("rRadio3").style.visibility = "hidden"
        }

        function cancelViewReview(){
            clearViewReview()
            //hide modal
            var popup = document.getElementById("viewReview");
            popup.style.display = "none";
        }

        function findValueOfRadio(array){
            for (let i = 0; i < array.length; i++){
                if (array[i].checked){
                    return array[i].value;
                }
            }
        }

        function confirmViewReview(){
            
            switch(numberOfReviews){
                    case 3:
                        var radio3 = document.getElementsByName("review3rating")
                        rating3 = findValueOfradio(radio3)
                        reviewNum3 = document.getElementById("rNo3").innerText
                        //jiahao run some code here to add rating3/2/1 to database. reviewNum3/2/1 is the id of the review in database 
                    case 2:
                        var radio2 = document.getElementsByName("review2rating")
                        rating2 = findValueOfRadio(radio2)
                        reviewNum2 = document.getElementById("rNo2").innerText
                    case 1:
                        var radio1 = document.getElementsByName("review1rating")         
                        rating1 = findValueOfRadio(radio1)
                        reviewNum1 = document.getElementById("rNo1").innerText
                    break;
                    default:
                }
            clearViewReview()
            var popup = document.getElementById("viewReview");
            popup.style.display = "none";
        }
        
        function populate9(array){
            document.getElementById("num9").innerText = array[0]
            document.getElementById("name9").innerText = array[1]
            document.getElementById("author9").innerText = array[2]
            document.getElementById("status9").innerText = array[3]
            document.getElementById("button9").style.visibility = "visible"
        }

        function populate8(array){
            document.getElementById("num8").innerText = array[0]
            document.getElementById("name8").innerText = array[1]
            document.getElementById("author8").innerText = array[2]
            document.getElementById("status8").innerText = array[3]
            document.getElementById("button8").style.visibility = "visible"
        }

        function populate7(array){
            document.getElementById("num7").innerText = array[0]
            document.getElementById("name7").innerText = array[1]
            document.getElementById("author7").innerText = array[2]
            document.getElementById("status7").innerText = array[3]
            document.getElementById("button7").style.visibility = "visible"
        }

        function populate6(array){
            document.getElementById("num6").innerText = array[0]
            document.getElementById("name6").innerText = array[1]
            document.getElementById("author6").innerText = array[2]
            document.getElementById("status6").innerText = array[3]
            document.getElementById("button6").style.visibility = "visible"
        }

        function populate5(array){
            document.getElementById("num5").innerText = array[0]
            document.getElementById("name5").innerText = array[1]
            document.getElementById("author5").innerText = array[2]
            document.getElementById("status5").innerText = array[3]
            document.getElementById("button5").style.visibility = "visible"
        }

        function populate4(array){
            document.getElementById("num4").innerText = array[0]
            document.getElementById("name4").innerText = array[1]
            document.getElementById("author4").innerText = array[2]
            document.getElementById("status4").innerText = array[3]
            document.getElementById("button4").style.visibility = "visible"
        }

        function populate3(array){
            document.getElementById("num3").innerText = array[0]
            document.getElementById("name3").innerText = array[1]
            document.getElementById("author3").innerText = array[2]
            document.getElementById("status3").innerText = array[3]
            document.getElementById("button3").style.visibility = "visible"
        }
        
        function populate2(array){
            document.getElementById("num2").innerText = array[0]
            document.getElementById("name2").innerText = array[1]
            document.getElementById("author2").innerText = array[2]
            document.getElementById("status2").innerText = array[3]
            document.getElementById("button2").style.visibility = "visible"
        }

        function populate1(array){
            document.getElementById("num1").innerText = array[0]
            document.getElementById("name1").innerText = array[1]
            document.getElementById("author1").innerText = array[2]
            document.getElementById("status1").innerText = array[3]
            document.getElementById("button1").style.visibility = "visible"
        }

        function loadTable(){
            //Jiahao get data from database
            //need paper number that matches authorid
            //SELECT * from papers where authorid == xxxx
            
            //Also Load Author Name and ID for top bar display
            var greeting = document.getElementById("userGreeting")
            var authorName = "John Smith"
            var authorId = "00028373"
            greeting.innerText = "Hello, " + authorName + ", " + authorId

            // store in array if possible
            //should get PaperNumber, Title, Author(s), Status
            //authors can just be 1 author for now.
            var numberOfPapers = 3;
            if (numberOfPapers > 9){
                numberOfPapers = 9
            }

            //FOR TESTING vvvvvvvvvv
            const array1 = ["09094328", "Emails: A vector of contamination", "John Smith", "Pending Review"]
            const array2 = ["94882394", "Tomatoes: Vegetable or Fruit?", "John Smith, Ellis Snow", "Reviewed"]
            const array3 = ["00000178", "Lorem, Ipsum, Dolor", "John Smith", "Pending Review"]
            //FOR TESTING ^^^^^^^^^^^
            switch(numberOfPapers){
                case 9:
                    populate9(array9)
                case 8:
                    populate8(array8)
                case 7:
                    populate7(array7)
                case 6:
                    populate6(array6)
                case 5:
                    populate5(array5)
                case 4:
                    populate4(array4)
                case 3:
                    populate3(array3)
                case 2:
                    populate2(array2)
                case 1:
                    populate1(array1)
            }

        }
    </script>
</body>
<?php
}
displayAuthorHomeUI()
?>
</html>