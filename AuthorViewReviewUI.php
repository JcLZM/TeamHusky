<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
function displayAuthorViewReviewUI()
{
?>

    <title>Author's Dashboard - TeamHusky Conference Systems</title>

    <head>
        <div class="topnav">
            <a class="active">TeamHusky Research Conference</a> <!-- should load dashboard again-->

            <span style="float:right">

                <a href="controllerLogout.php">Logout</a> <!-- should run logout function / close session, return to login page-->

            </span>

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
    <form action = "controllerViewReviews.php" method = "post">
        <div class="mainbox"> 
        <table class="myTable" style="width:80%">
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
                    <td colspan="3"><button name = "confirm" onClick="confirmViewReview()">Confirm</button></td> <!--clear the radio button-->
                    <td colspan="2"><button name = "cancel"onClick="cancelViewReview()">Cancel</button></td>
            </table>           

    
</form>
<script>
    <?php
        $paperId = $_POST['viewReviewButton'] 
    ?>
    var paperId = '<?php echo $paperId; ?>';

</script>
    </body>
    <?php
}
displayAuthorViewReviewUI()
?>