<?php
include 'classChairman.php';

class controllerViewAssignedPapers
{
    // User Story 24 - Chairman view bids
    public function ChairmanViewBids($userid){
        $chairman = new Chairman;

        if (isset($_POST['assigned']))
        {
            $userid = $_POST['userid'];
            $_SESSION["userid"] = $userid;

            $assignedList= $chairman->chairman_view_bid($userid);
            return $assignedList;
        }
    }
}

$assignedfunction = new controllerViewAssignedPapers; 
$assignedResult= $assignedfunction->ChairmanViewBids($_POST['userid']);
if($assignedResult) 
{ 
    // if result is not false, function is my reviewer one
    showAssignedPapers($assignedResult);
}
?>