<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
function displayAuthorHomeUI()
{
?>

    <title>Author's Dashboard - TeamHusky Conference Systems</title>

    <head>
        <div class="topnav">
            <a class="active">TeamHusky Research Conference</a> <!-- should load dashboard again-->

            <span style="float:right">

                <a href="controllerLogout.php">Logout</a> <!-- should run logout function / close session, return to login page-->
                <!-- jiahao -->

            </span>
            <span id="userGreeting">Hello, authorName, authorID</span>

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

            #userGreeting {
                top: 3%;
                left: 80%;
                color: #f4f4f4;
                position: absolute;
            }

            /* navigation bar */
            .topnav a {
                float: left;
                color: #f4f4f4;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
                font-family: Arial;
            }

            .mainbox table {
                width: 80%;
                border: 2px;
                position: absolute;
                top: 40%;
                transform: translate(0, -50%);
                padding: 2px;
                border-style: solid;
            }

            .mainbox table tr {
                border: 2px;
                border-color: #000000;
                width: 20%;
                height: 50px;
                border-style: solid
            }

            .midbutton {
                position: absolute;
                top: 15%;
                margin: auto;
                padding-left: 85%;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
            }

            /* Modal Content/Box */
            .modal-content {
                position: relative;
                background-color: #f4f4f4;
                margin: auto;
                padding: 0;
                top: 50%;
                border: 1px solid #888;
                width: 50%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #rRadio1,
            #rRadio2,
            #rRadio3 {
                visibility: hidden;
            }
        </style>

    </head>



    <body>

        <div class="midbutton">
            <!-- submit papers modal -->
            <button onclick="submitPaper()">Submit Papers</button>
            <div class="modal" id="submitpaper">
                <form action="controllerSubmitPaper.php" method="post">

                    <table class="modal-content">
                        <tr>
                        <td><input type="text" name="userid" value="<?php echo $_SESSION['user_id']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td><input style=width:500px type="text" name="title"></td>
                        </tr>
                        <tr>
                            <td>Content:</td>
                            <td><textarea style="height:200px;width:500px;resize:none;" name="content"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p class="errorMsg"> <?php if (isset($errorCreate)) echo $errorCreate; ?></p>
                                <p class="button">
                                    <button class="enter" type="submit" name="enter">
                                        Enter
                                    </button>
                                    <button class="cancel" type="reset" name="cancel">
                                        Reset
                                    </button>
                                </p>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- popup-->
        </div>

        <div class="modal" id="viewReview">
            <table class="modal-content" style="width:80%">
                <tr>
                    <th>Review Number</td> <!-- review id-->
                    <th>Reviewer Name</td> <!-- reviewer-->
                    <th>Review</td> <!-- score, from 3 to -3-->
                    <th>Rating</td>
                    <th>Rate this Review</td>
                </tr>
                <tr>
                    <td id="rNo1"></td>
                    <td id="rName1"></td>
                    <td id="rReview1"></td>
                    <td id="rScore1"></td>
                    <td id="rRadio1">
                        <input type="radio" id="1" name="review1rating" value="1"> <label for="1">1</label><br>
                        <input type="radio" id="2" name="review1rating" value="2"> <label for="2">2</label><br>
                        <input type="radio" id="3" name="review1rating" value="3"> <label for="3">3</label><br>
                        <input type="radio" id="4" name="review1rating" value="4"> <label for="4">4</label><br>
                        <input type="radio" id="5" name="review1rating" value="5"> <label for="5">5</label>
                    </td>
                </tr>
                <tr>
                    <td id="rNo2"></td>
                    <td id="rName2"></td>
                    <td id="rReview2"></td>
                    <td id="rScore2"></td>
                    <td id="rRadio2">
                        <input type="radio" id="1" name="review2rating" value="1"> <label for="1">1</label><br>
                        <input type="radio" id="2" name="review2rating" value="2"> <label for="2">2</label><br>
                        <input type="radio" id="3" name="review2rating" value="3"> <label for="3">3</label><br>
                        <input type="radio" id="4" name="review2rating" value="4"> <label for="4">4</label><br>
                        <input type="radio" id="5" name="review2rating" value="5"> <label for="5">5</label>
                    </td>
                </tr>
                <tr>
                    <td id="rNo3"></td>
                    <td id="rName3"></td>
                    <td id="rReview3"></td>
                    <td id="rScore3"></td>
                    <td id="rRadio3">
                        <input type="radio" id="1" name="review3rating" value="1"> <label for="1">1</label><br>
                        <input type="radio" id="2" name="review3rating" value="2"> <label for="2">2</label><br>
                        <input type="radio" id="3" name="review3rating" value="3"> <label for="3">3</label><br>
                        <input type="radio" id="4" name="review3rating" value="4"> <label for="4">4</label><br>
                        <input type="radio" id="5" name="review3rating" value="5"> <label for="5">5</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button onClick="confirmViewReview()">Confirm</button></td> <!-- both should clear all fields.-->
                    <td colspan="2"><button onClick="cancelViewReview()">Cancel</button></td>
            </table>

        </div>

        <?php
        $user = 'root';
        $password = '';

        $database = 'teamhusky';

        $servername = 'localhost:3306';
        $mysqli = new mysqli(
            $servername,
            $user,
            $password,
            $database
        );

        // Checking for connections
        if ($mysqli->connect_error) {
            die('Connect Error (' .
                $mysqli->connect_errno . ') ' .
                $mysqli->connect_error);
        }

        // SQL query to select data from database
        $sql = " SELECT * FROM papers ORDER BY paper_id ASC LIMIT 9";
        $result = $mysqli->query($sql);
        $mysqli->close();
        ?>


        <div class="mainbox">
            
                <table>

                    <td>Paper ID</td>
                    <td>Author ID</td>
                    <td>Content</td>
                    <td>Status</td>
                    <td>Reviews</td>
                        <?php
                        // LOOP TILL END OF DATA
                        while ($rows = $result->fetch_assoc()) {
                        ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['paper_id']; ?></td>
                        <td><?php echo $rows['author_id']; ?></td>
                        <td><?php echo $rows['content']; ?></td>
                        <td><?php echo $rows['paper_status']; ?></td>
                        <form action="AuthorViewReviewUI.php" method="post">
                        <td><button name = "viewReviewButton" value = "<?php echo $rows['paper_id']; ?>" onClick ="viewReviews()" >Click to view</button></td>
                        </form><!--onClick="viewReviews(this.id)"-->
                    </tr>
                <?php
                        }
                ?>
                </table>
            </form>
        </div>
    </div>
        <script>

            function onLoadFunction() {
                //alert(123);
                <?php
                $session_name = (isset($_SESSION['full_name'])) ? $_SESSION['full_name'] : '';
                $session_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
                var greeting = document.getElementById("userGreeting");
                //jiahao get data from DB, need to find reviewerName and reviewerID
                authorName = '<?php echo $session_name; ?>';;
                authorID = '<?php echo $session_id; ?>';;
                greeting.innerText = "Hello, " + authorName + ", " + authorID;
                loadTable()
            }

            function submitPaper() { //creates the popup
                var popup = document.getElementById("submitpaper");
                popup.style.display = "block";
            }

            function cancelPaperSubmit() {
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

            function confirmPaperSubmit() {
                var popup = document.getElementById("submitpaper");
                popup.style.display = "none";
                //store all the data in variables and submit it
                var papername = document.getElementById("papername");
                var authors = document.getElementById("authors");
                var papercontent = document.getElementById("papercontent");

                //SOME CODE HERE JIA HAO LOOK AT IT
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

            function viewReviews() {
                showReviewModal();
                //allow author rating
            }

            function showReviewModal() {
                var popup = document.getElementById("viewReview");
                popup.style.display = "block";
            }

            function showReview1(array1) {
                document.getElementById("rNo1").innerText = array1[0]
                document.getElementById("rName1").innerText = array1[1]
                document.getElementById("rScore1").innerText = array1[3]
                document.getElementById("rReview1").innerText = array1[2]
                document.getElementById("rRadio1").style.visibility = "visible"
                //alert(array1[0])
            }

            function showReview2(array2) {
                document.getElementById("rNo2").innerText = array2[0]
                document.getElementById("rName2").innerText = array2[1]
                document.getElementById("rScore2").innerText = array2[3]
                document.getElementById("rReview2").innerText = array2[2]
                document.getElementById("rRadio2").style.visibility = "visible"
            }

            function showReview3(array3) {
                document.getElementById("rNo3").innerText = array3[0]
                document.getElementById("rName3").innerText = array3[1]
                document.getElementById("rScore3").innerText = array3[3]
                document.getElementById("rReview3").innerText = array3[2]
                document.getElementById("rRadio3").style.visibility = "visible"
            }

            function clearViewReview() {
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

            function cancelViewReview() {
                clearViewReview()
                //hide modal
                var popup = document.getElementById("viewReview");
                popup.style.display = "none";
            }

            function findValueOfRadio(array) {
                for (let i = 0; i < array.length; i++) {
                    if (array[i].checked) {
                        return array[i].value;
                    }
                }
            }

            function confirmViewReview() {

                switch (numberOfReviews) {
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

            function populate9(array) {
                document.getElementById("num9").innerText = array[0]
                document.getElementById("name9").innerText = array[1]
                document.getElementById("author9").innerText = array[2]
                document.getElementById("status9").innerText = array[3]
                document.getElementById("button9").style.visibility = "visible"
            }

            function populate8(array) {
                document.getElementById("num8").innerText = array[0]
                document.getElementById("name8").innerText = array[1]
                document.getElementById("author8").innerText = array[2]
                document.getElementById("status8").innerText = array[3]
                document.getElementById("button8").style.visibility = "visible"
            }

            function populate7(array) {
                document.getElementById("num7").innerText = array[0]
                document.getElementById("name7").innerText = array[1]
                document.getElementById("author7").innerText = array[2]
                document.getElementById("status7").innerText = array[3]
                document.getElementById("button7").style.visibility = "visible"
            }

            function populate6(array) {
                document.getElementById("num6").innerText = array[0]
                document.getElementById("name6").innerText = array[1]
                document.getElementById("author6").innerText = array[2]
                document.getElementById("status6").innerText = array[3]
                document.getElementById("button6").style.visibility = "visible"
            }

            function populate5(array) {
                document.getElementById("num5").innerText = array[0]
                document.getElementById("name5").innerText = array[1]
                document.getElementById("author5").innerText = array[2]
                document.getElementById("status5").innerText = array[3]
                document.getElementById("button5").style.visibility = "visible"
            }

            function populate4(array) {
                document.getElementById("num4").innerText = array[0]
                document.getElementById("name4").innerText = array[1]
                document.getElementById("author4").innerText = array[2]
                document.getElementById("status4").innerText = array[3]
                document.getElementById("button4").style.visibility = "visible"
            }

            function populate3(array) {
                document.getElementById("num3").innerText = array[0]
                document.getElementById("name3").innerText = array[1]
                document.getElementById("author3").innerText = array[2]
                document.getElementById("status3").innerText = array[3]
                document.getElementById("button3").style.visibility = "visible"
            }

            function populate2(array) {
                document.getElementById("num2").innerText = array[0]
                document.getElementById("name2").innerText = array[1]
                document.getElementById("author2").innerText = array[2]
                document.getElementById("status2").innerText = array[3]
                document.getElementById("button2").style.visibility = "visible"
            }

            function populate1(array) {
                document.getElementById("num1").innerText = array[0]
                document.getElementById("name1").innerText = array[1]
                document.getElementById("author1").innerText = array[2]
                document.getElementById("status1").innerText = array[3]
                document.getElementById("button1").style.visibility = "visible"
            }

            function loadTable() {
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
                if (numberOfPapers > 9) {
                    numberOfPapers = 9
                }

                //FOR TESTING vvvvvvvvvv
                const array1 = ["09094328", "Emails: A vector of contamination", "John Smith", "Pending Review"]
                const array2 = ["94882394", "Tomatoes: Vegetable or Fruit?", "John Smith, Ellis Snow", "Reviewed"]
                const array3 = ["00000178", "Lorem, Ipsum, Dolor", "John Smith", "Pending Review"]
                //FOR TESTING ^^^^^^^^^^^
                switch (numberOfPapers) {
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