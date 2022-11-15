<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
function displayReviewerHomeUI(){
?>
<title>Reviewer's Dashboard - TeamHusky Conference Systems</title>
<head>
    <div class="topnav">
        <a class="active">TeamHusky Research Conference</a> <!-- should load dashboard again-->
        
        <span style="float:right">
            
            <a href="#logout">Logout</a> <!-- should run logout function / close session, return to login page--> 
            <!-- jiahao -->
            
        </span>
        <span id = "userGreeting">Hello, REVIEWERNAME, REVIEWERID</span>
        <!-- should load from db?? do this at onload-->

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
        #rRadio1, #rRadio2, #rRadio3 {
            visibility:hidden;
        }

        .tableModeSetter{
            top:8%;
            position:absolute;
        }

        </style>
   
</head>

<body onLoad="onLoad()">

    <div class="tableModeSetter">
        <button onClick = "showAssignedPapers()">Show assigned papers</button>&nbsp;&nbsp;&nbsp;
        <button onClick = "showReviewedPapers()">Show reviewed papers</button>&nbsp;&nbsp;&nbsp;
        <button onClick = "showUnassignedPapers()">Show unassigned papers</button>&nbsp;&nbsp;&nbsp;
    </div>

    <div class="midbutton">
        <!-- submit papers modal -->
        <button onclick ="setWorkload()">Set Workload</button>
        <br>
        Your workload is currently set to: <span id="workLoadDisplay"></span>&nbsp;hours
        <div class="modal" id = "setWorkload" >

            <table class="modal-content" style = width:25%>
                <tr>
                    <td>Hours:</td>
                    <td><input style = width:50px type="text" id = "workload"></td>
                </tr>
                    <td><button onclick="confirmWorkloadSubmit()">Confirm</button></td>
                    <td><button onclick="cancelWorkloadSubmit()" class = "close">Cancel</button></td>
                </tr>
            </table>
        </div>
        <!-- popup-->
    </div>

    <div class = "modal" id = "viewReview">
        <table class ="modal-content" style = "width:60%; top:25%">
            <tr>
                <th>Paper Title</td> <!-- paper title-->
                <th>Paper</td> <!-- paper content-->
                
            </tr>
            <tr> 
                <td id = "rTitle1"></td>
                <td id = "rContent1"></td>
                
            </tr>
            <tr>
                <td>Your Review: </td>
            <td id = "rReview1"><textArea style = "height:200px;width:1000px"></textArea></td>
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
                <td id = "button1" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
            </tr>
            <tr> 
                <td id = "num2"></td> <!--Paper number from database-->
                <td id = "name2"></td><!-- Paper title from database-->
                <td id = "author2"></td><!-- Author(s)-->
                <td id = "status2"></td><!-- status of paper-->
                <td id = "button2" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num3"></td> <!--Paper number from database-->
                <td id = "name3"></td><!-- Paper title from database-->
                <td id = "author3"></td><!-- Author(s)-->
                <td id = "status3"></td><!-- status of paper-->
                <td id = "button3" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num4"></td> <!--Paper number from database-->
                <td id = "name4"></td><!-- Paper title from database-->
                <td id = "author4"></td><!-- Author(s)-->
                <td id = "status4"></td><!-- status of paper-->
                <td id = "button4" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num5"></td> <!--Paper number from database-->
                <td id = "name5"></td><!-- Paper title from database-->
                <td id = "author5"></td><!-- Author(s)-->
                <td id = "status5"></td><!-- status of paper-->
                <td id = "button5" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num6"></td> <!--Paper number from database-->
                <td id = "name6"></td><!-- Paper title from database-->
                <td id = "author6"></td><!-- Author(s)-->
                <td id = "status6"></td><!-- status of paper-->
                <td id = "button6" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num7"></td> <!--Paper number from database-->
                <td id = "name7"></td><!-- Paper title from database-->
                <td id = "author7"></td><!-- Author(s)-->
                <td id = "status7"></td><!-- status of paper-->
                <td id = "button7" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num8"></td> <!--Paper number from database-->
                <td id = "name8"></td><!-- Paper title from database-->
                <td id = "author8"></td><!-- Author(s)-->
                <td id = "status8"></td><!-- status of paper-->
                <td id = "button8" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
            <tr> 
                <td id = "num9"></td> <!--Paper number from database-->
                <td id = "name9"></td><!-- Paper title from database-->
                <td id = "author9"></td><!-- Author(s)-->
                <td id = "status9"></td><!-- status of paper-->
                <td id = "button9" onClick="openReviewInterface(this.id)" style="visibility:hidden"><button>Click to review</button></td><!-- button should check status -->
                <!-- should pull reviews from db-->
            </tr>
        </table>
    </div> 
    <script>
        function setWorkload(){ //opens the popup
            var popup = document.getElementById("setWorkload");
            popup.style.display = "block";
        }

        function cancelWorkloadSubmit(){ 
            //closes popup
            //should clear all fields as well
            var popup = document.getElementById("setWorkload");
            popup.style.display = "none";
            var workloadBox = document.getElementById("workload");
            //clear it
            workloadBox.value = "";
        }

        function confirmWorkloadSubmit(){
            var popup = document.getElementById("setWorkload");
            popup.style.display = "none";
            //store all the data in variables and submit it
            var workloadBox = document.getElementById("workload");
            
            
            //SOME CODE HERE JIA HAO LOOK AT IT
            // SEND DATA TO DB, 
            //UPDATE REVIEWERS 
            // SET workload = 
            //WHERE ID = reviewerID  
            //
            var workload = workloadBox.value
            
            //also clear it
            workloadBox.value = "";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            var popup = document.getElementById("setWorkload");
            if (event.target == popup) {
                popup.style.display = "none";
                var workloadBox = document.getElementById("workload");
                workloadBox.value = "";
                    
            }

            var popup2 = document.getElementById("viewReview");
            if (event.target == popup2) {
                popup2.style.display = "none";
            }
        }


        //Click to view reviews function
        
        var paperID = null;
        var reviewerName = null;
        var reviewerID = null;

        function openReviewInterface(buttonID){
            //1.Get Paper Number(Should have been loaded in page.)
            var number = buttonID.substr(buttonID.length - 1);
            var paperNum = "num" + number
            paperID = document.getElementById(paperNum).innerText
            var statusNum = "status" + number

            //submit request to database get paper content
                //JIA HAO
                //run a query to get review
                //SELECT * FROM PAPER WHERE PAPER_ID LIKE paperID(paperNum)
                //paper title and content itself i guess, paperID stores in paperNum atm?

                //place contents in an Array?
                //title, content, show review box.
                var paper = ["Give Me Liberty or Give Me Death!", "The battle, sir, is not to the strong alone; it is to the vigilant, the active, the brave. Besides, sir, we have no election. If we were base enough to desire it, it is now too late to retire from the contest. There is no retreat but in submission and slavery! Our chains are forged! Their clanking may be heard on the plains of Boston! The war is inevitable -- and let it come! I repeat it, sir, let it come! It is in vain, sir, to extenuate the matter. Gentlemen may cry, 'Peace! Peace!' -- but there is no peace. The war is actually begun! The next gale that sweeps from the north will bring to our ears the clash of resounding arms! Our brethren are already in the field! Why stand we here idle? What is it that gentlemen wish? What would they have? Is life so dear, or peace so sweet, as to be purchased at the price of chains and slavery? Forbid it, Almighty God! I know not what course others may take; but as for me, give me liberty, or give me death!"]
                //for testing ^^^^^
            //query should return multiple results
                showReview(paper);
                showViewReviewModal();
            //allow author rating
        }

        function showViewReviewModal(){
            var popup = document.getElementById("viewReview");
            popup.style.display = "block";
        }

        function showReview(array1){
            document.getElementById("rTitle1").innerText = array1[0]
            document.getElementById("rContent1").innerText = array1[1]
            //alert(array1[0])
        }


        function cancelViewReview(){
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
            var popup = document.getElementById("viewReview");
            popup.style.display = "none";
            var review = document.getElementById("rReview1");
            // jiahao add review to database
            //review number should auto increment
            // paper number stored in paperID variable
            //review is review
            //reviewerID is in reviewerID
            

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


        function onLoad(){
            var greeting = document.getElementById("userGreeting")
            reviewerName = "John Smith"
            reviewerId = "00028373"
            greeting.innerText = "Hello, " + reviewerName + ", " + reviewerId
            initialLoadTable()
            // get workload from DB
            var workload = 10 //testing
            document.getElementById("workLoadDisplay").innerText = workload
        }

        function initialLoadTable(){
            //Jiahao get data from database
            //need paper number that matches reviewerid
            //SELECT * from papers where reviewerid == xxxx
            
            //Also Load reviewerid Name and ID for top bar display
            

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

        function showAssignedPapers(){
            initialLoadTable();
        }

        function showReviewedPapers(){

        }

        function showUnassignedPapers(){

        }
    </script>
</body>
<?php
}
displayReviewerHomeUI()
?>
</html>