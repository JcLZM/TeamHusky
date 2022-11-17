<?php
include 'classReviewer.php';
include 'ReviewerHomeUI.php';

class controllerViewUnassignedPapers
{
    //view unassigned papers
    public function ViewUnassignedPapers()
    {
        $reviewer = new Reviewer;

        if (isset($_POST['unassigned']))
        {
            $unassignedList= $reviewer->reviewer_view_unassigned_paper();
            return $unassignedList;
        }
    }
}

$unassignedfunction = new controllerViewUnassignedPapers; 
$unassignedResult= $unassignedfunction->ViewUnassignedPapers();
if($unassignedResult) 
{ 
    // if result is not false
    showUnassignedPapers($unassignedResult);
}
?>