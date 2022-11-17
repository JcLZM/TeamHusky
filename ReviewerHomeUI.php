<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
//Session start
session_start();

function displayReviewerHomeUI(){
?>
<title>Reviewer's Dashboard - TeamHusky Conference Systems</title>
<head>
    
    <div class="topnav">
        <a class="active">TeamHusky Research Conference</a> <!-- should load dashboard again-->
        
        <span style="float:right">
            
            <a href="controllerLogout.php">Logout</a> <!-- should run logout function / close session, return to login page--> 
            
        </span>
        <span id = "userGreeting">Hello, reviewerName, reviewerID</span>

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
            transform:translate(0, -40%);
            padding: 2px;
            border-style:solid;
        }
        .mainbox table tr{
            border: 2px;
            border-color:#000000;
            width:20%;
            height:50px;
            border-style:solid;
        }
        
        .midbutton{
            position:absolute;
            top:15%;
            margin:auto;
            padding-left: 82.5%;
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

        .tableModeSetter{
            top:8%;
            position:absolute;
        }

        #commentButton1, #commentButton2, #commentButton3,
        #commentButton4, #commentButton5, #commentButton6,
        #commentButton7, #commentButton8, #commentButton9,
        #bidButton1, #bidButton2, #bidButton3, #bidButton4,
        #bidButton5, #bidButton6, #bidButton7, #bidButton8,
        #bidButton9 {
            display:none
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

        </style>
   
</head>


<body onLoad = "onLoadFunction()">
    <div class="tableModeSetter">
            <br><br>
            <form action="controllerViewAssignedPapers.php" method="post">
            <input type="hidden" name="reviewerid" value="<?php $_SESSION['user_id']; ?>">
            <button name="assigned">Show assigned papers</button>
            </form><br>
            <form action="controllerViewReviewedPapers.php" method="post">
            <button name="reviewed">Show reviewed papers</button>
            </form><br>
            <form action="controllerViewUnassignedPapers.php" method="post">
            <button name="unassigned">Show unassigned papers</button>
            </form>
            <br><br>
        </div>

        <div class="midbutton">
            <!-- submit papers modal -->
            <button onClick ="setWorkload()">Set Workload</button>
            <br>
            <!-- Your workload is currently set to: <span id="workLoadDisplay">-1</span>&nbsp;papers -->
            <form action="controllerEditWorkload.php" method="post" >
            <div class="modal" id = "setWorkload" >
                <table class="modal-content" style = width:25%>
                    <tr>
                        <td>Papers:</td>
                        <td><input type="hidden" name="userid" value="<?php echo $_SESSION['user_id']; ?>"></td>
                        <td><input style = width:50px type="text" id = "workload" name="workload"></td>
                    </tr>
                        <td><button name="confirm">Confirm</button></td>
                        <td><button name="cancel" class = "close">Cancel</button></td>
                    </tr>
                </table>
            </div>
            </form>
            <!-- popup-->
        </div>

        <?php
        function showUnassignedPapers($unassignedList)
        {
        ?>
        <form>
            <table id="myTable">
                <tr class="header">
                    <th style="width:15%;">Paper Number</th>
                    <th style="width:10%;">Paper Title</th>
                    <th style="width:10%;">Author(s)</th>
                    <th style="width:15%;">Status</th>
                    <th style="width:15%;">Reviews</th>
                </tr>
                <?php
                while($row = $unassignedList->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['paper_id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['author_id'] ?></td>
                    <td><?php echo $row['paper_status'] ?></td>
                    <td align="center">
                    <button name="bid">Click to bid</button>
                    </td><!-- button should check status -->
                </tr>
                <?php } ?>
            </table>
        </form>
    <?php
        }?>
        
        <?php
        function showReviewedPapers($reviewedList)
        {
        ?>
        <form>
            <table id="myTable">
                <tr class="header">
                    <th style="width:15%;">Paper Number</th>
                    <th style="width:10%;">Paper Title</th>
                    <th style="width:10%;">Author(s)</th>
                    <th style="width:15%;">Status</th>
                    <th style="width:15%;">Reviews</th>
                </tr>
                <?php
                while($row = $reviewedList->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['paper_id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['author_id'] ?></td>
                    <td><?php echo $row['paper_status'] ?></td>
                    <td align="center">
                    <button name="comment">Click to view</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </form>
    <?php
        }?>

<?php
        function showassignedPapers($assignedList)
        {
        ?>
          <form>
            <table id="myTable">
                <tr class="header">
                    <th style="width:15%;">Paper Number</th>
                    <th style="width:10%;">Paper Title</th>
                    <th style="width:10%;">Author(s)</th>
                    <th style="width:15%;">Status</th>
                    <th style="width:15%;">Reviews</th>
                </tr>
                <?php
                while($row = $assignedList->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['paper_id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['author_id'] ?></td>
                    <td><?php echo $row['paper_status'] ?></td>
                    <td align="center">
                    <button name="comment">Click to review</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </form>
    <?php
        }?>
    
    <div class = "modal" id = "createReview">
        <table class ="modal-content" style = "width:60%; top:25%">
            <tr>
                <th>Paper Title</td> <!-- paper title-->
                <th>Paper</td> <!-- paper content-->
                
            </tr>
            <tr> 
                <td id = "pTitle"></td>
                <td id = "pContent"></td>
                
            </tr>
            <tr>
                <td>Your Review: </td>
            <td id = "pReview"><textArea style = "height:200px;width:1000px"></textArea></td>
            </tr>
            <tr>
                <td>Rating:</td>
                <td>    
                    <select name="reviewRating" id="reviewRating">
                        <option value="3">Strong Accept (3)</option>
                        <option value="2">Accept (2)</option>
                        <option value="1">Weak Accept (1)</option>    
                        <option value="0" selected="selected">Borderline (0)</option>
                        <option value="-1">Weak Reject (-1)</option>
                        <option value="-2">Reject (-2)</option>
                        <option value="-3">Strong Reject (-3)</option>
                    </select>
            </tr>
            <tr>
                <td colspan = "3"><button onClick = "confirmCreateReview()">Confirm</button></td> <!-- both should clear all fields.-->
                <td colspan = "2"><button onClick = "cancelCreateReview()">Cancel</button></td>
        </table>

    </div>

    <div class = "modal" id = "displayReview">
        <table class ="modal-content" style = "width:60%; top:25%">
            <tr>
                <th>Paper Title</td> <!-- paper title-->
                <th>Paper</td> <!-- paper content-->
                
            </tr>
            <tr> 
                <td id = "rTitle"></td>
                <td id = "rContent"></td>
                
            </tr>
            <tr>
                <td>Review: </td>
            <td id = "rReview"></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td>    
                <textArea id = "rComment" style = "height:200px;width:1000px"></textArea>
            </tr>
            <tr>
                <td colspan = "3"><button onClick = "confirmDisplayReview()">Confirm</button></td> <!-- both should clear all fields.-->
                <td colspan = "2"><button onClick = "cancelDisplayReview()">Cancel</button></td>
        </table>

    </div>

    <script>
        var currentPaperId = null

        function confirmDisplayReview(){
            //close modal
            var popup = document.getElementById("displayReview")
            popup.style.display = "none";

            //send comment
            //
            //paper id = currentPaperId
            //reviewId = select reviews where paper = paperid
            //insert into comments
            //comment id = autoincrement
            //commenter id = reviewerID (global)
            var comment = document.getElementById("rComment").value


        }

        function cancelDisplayReview(){
            //close modal
            var popup = document.getElementById("displayReview")
            popup.style.display = "none";

            //clear boxes
            document.getElementById("rComment").value = ""
        }

        function setWorkload(){ //opens the popup
            var popup = document.getElementById("setWorkload");
            popup.style.display = "block";
        }

        // function cancelWorkloadSubmit(){ 
        //     //closes popup
        //     //should clear all fields as well
        //     var popup = document.getElementById("setWorkload");
        //     popup.style.display = "none";
        //     var workloadBox = document.getElementById("workload");
        //     //clear it
        //     workloadBox.value = "";
        // }

        function sendBid(buttonID){
            //find paper id
            var number = buttonID.substr(buttonID.length - 1);
            //alert(number)
            var paperNum = "num" + number
            var paperID = document.getElementById(paperNum).innerText
            //set bid for paper id, 
            //add to bids table
            //paper id / reviewer id 
            //reviewer in variable reviewerID (global)
        }

        function confirmWorkloadSubmit(){
            var popup = document.getElementById("setWorkload");
            popup.style.display = "none";
            //store all the data in variables and submit it
            var workloadBox = document.getElementById("workload");
            var workload = workloadBox.value;

            document.getElementById("workLoadDisplay").innerText = workload
        }
 
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            var popup = document.getElementById("setWorkload");
            var popup2 = document.getElementById("createReview");
            var popup3 = document.getElementById("displayReview");
            if (event.target == popup) {
                popup.style.display = "none";
                var workloadBox = document.getElementById("workload");
                workloadBox.value = "";                    
            }

            else if (event.target == popup2) {
                popup2.style.display = "none";
            }
            
            else if (event.target == popup3){
                popup3.style.display = "none";
            }

        }

        var paperID = null;
        var reviewerName = null;
        var reviewerID = null;

        function openCommentInterface(buttonID){
            var number = buttonID.substr(buttonID.length - 1);
            var paperNum = "num" + number;
            currentPaperId = paperNum
            //JIA HAO
            //run a query to get review
            //SELECT * FROM PAPER (paper title, content)
            //select * from review where paperid = xxxxxx
            //paper title, content, review that it has

            var paper = ["I have a dream", "I have a dream that one day down in Alabama, with its vicious racists, with its governor having his lips dripping with the words of interposition and nullification - one day right there in Alabama little black boys and black girls will be able to join hands with little white boys and white girls as sisters and brothers. I have a dream today. I have a dream that one day every valley shall be exalted, and every hill and mountain shall be made low, the rough places will be made plain, and the crooked places will be made straight, and the glory of the Lord shall be revealed and all flesh shall see it together.", "This is our hope. This is the faith that I go back to the South with. With this faith we will be able to hew out of the mountain of despair a stone of hope."];
            showReview(paper);
            showReviewModal();
        }

        function showReview(paper){
            document.getElementById("rTitle").innerText = paper[0];
            document.getElementById("rContent").innerText = paper[1];
            document.getElementById("rReview").innerText = paper[2];
            document.getElementById("rComment").value = ""
        }

        function showReviewModal(){
            var popup = document.getElementById("displayReview");
            popup.style.display = "block";
        }

        var globalButtonVariable = null;

        function openReviewInterface(buttonID){
            //1.Get Paper Number(Should have been loaded in page.)
            var number = buttonID.substr(buttonID.length - 1);
            var paperNum = "num" + number
            globalButtonVariable = buttonID
            paperID = document.getElementById(paperNum).innerText

            //JIA HAO
            //run a query to get review
            //SELECT * FROM PAPER WHERE PAPER_ID LIKE paperID(paperNum)
            //paper title and content itself i guess, paperID stores in paperNum atm?

            //place contents in an Array?
            //title, content, show review box.
            var paper = ["Give Me Liberty or Give Me Death!", "The battle, sir, is not to the strong alone; it is to the vigilant, the active, the brave. Besides, sir, we have no election. If we were base enough to desire it, it is now too late to retire from the contest. There is no retreat but in submission and slavery! Our chains are forged! Their clanking may be heard on the plains of Boston! The war is inevitable -- and let it come! I repeat it, sir, let it come! It is in vain, sir, to extenuate the matter. Gentlemen may cry, 'Peace! Peace!' -- but there is no peace. The war is actually begun! The next gale that sweeps from the north will bring to our ears the clash of resounding arms! Our brethren are already in the field! Why stand we here idle? What is it that gentlemen wish? What would they have? Is life so dear, or peace so sweet, as to be purchased at the price of chains and slavery? Forbid it, Almighty God! I know not what course others may take; but as for me, give me liberty, or give me death!"]
            //for testing ^^^^^
            //query should return multiple results
                showPaper(paper);
                showCreateReviewModal();
            //allow author rating
        }

        function showCreateReviewModal(){
            var popup = document.getElementById("createReview");
            popup.style.display = "block";
        }

        function showPaper(array){
            document.getElementById("pTitle").innerText = array[0];
            document.getElementById("pContent").innerText = array[1];
            //alert(array1[0])
        }


        function cancelCreateReview(){
            //hide modal
            var popup = document.getElementById("createReview");
            popup.style.display = "none";
        }

        function findValueOfRadio(array){
            for (let i = 0; i < array.length; i++){
                if (array[i].checked){
                    return array[i].value;
                }
            }
        }

        function confirmCreateReview(){
            var popup = document.getElementById("createReview");
            popup.style.display = "none";
            var review = document.getElementById("pReview");
            // jiahao add review to database
            //review number should auto increment
            // paper number stored in paperID variable
            //review is review
            //reviewerID is in reviewerID
            var number = globalButtonVariable.substr(globalButtonVariable.length - 1);
            var statusnum = "status" + number
            document.getElementById(statusnum).innerText = "Reviewed"

        }
        
        function onLoadFunction(){
            //alert(123);
            <?php
            $session_name=(isset($_SESSION['full_name']))?$_SESSION['full_name']:'';
            $session_id=(isset($_SESSION['user_id']))?$_SESSION['user_id']:'';?>
            var greeting = document.getElementById("userGreeting");
            //jiahao get data from DB, need to find reviewerName and reviewerID
            var reviewerName = '<?php echo $session_name;?>';;
            var reviewerID = '<?php echo $session_id;?>';;
            greeting.innerText = "Hello, " + reviewerName + ", " + reviewerID;
            initialLoadTable()
            // // get workload from DB
            // var workload = 10 //testing
            // document.getElementById("workLoadDisplay").innerText = workload;
        }
    </script>    
</body>

<?php
}
displayReviewerHomeUI()
?>
</html>