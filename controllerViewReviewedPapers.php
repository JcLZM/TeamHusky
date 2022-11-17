<?php
include 'classReviewer.php';
include 'ReviewerHomeUI.php';

class controllerViewReviewedPapers
{
    //view unassigned papers
    public function ViewReviewedPapers()
    {
        $reviewer = new Reviewer;

        if (isset($_POST['reviewed']))
        {
            $reviewedList= $reviewer->reviewer_view_reviewed_paper();
            return $reviewedList;
        }
    }
}

$reviewedfunction = new controllerViewReviewedPapers; 
$reviewedResult= $reviewedfunction->ViewReviewedPapers();
if($reviewedResult) 
{ 
    // if result is not false
    showReviewedPapers($reviewedResult);
}
?>