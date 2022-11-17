<?php
include 'classReviewer.php';
include 'ReviewerHomeUI.php';

class controllerViewAssignedPapers
{
    //view unassigned papers
    public function ViewAssignedPapers($userid)
    {
        $reviewer = new Reviewer;

        if (isset($_POST['assigned']))
        {
            $userid = $_POST['userid'];
            $_SESSION["userid"] = $userid;

            $assignedList= $reviewer->reviewer_view_assigned_paper($userid);
            return $assignedList;
        }
    }
}

$assignedfunction = new controllerViewAssignedPapers; 
$assignedResult= $assignedfunction->ViewAssignedPapers($_POST['userid']);
if($assignedResult) 
{ 
    // if result is not false
    showAssignedPapers($assignedResult);
}
?>