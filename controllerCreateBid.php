<?php
include 'classReviewer.php';

class controllerCreateBid
{
    public function createBid($paper_id, $userid)
    {
        $reviewer = new Reviewer;

        if (isset($_POST['bid']))
        {
            $userid = $_POST['userid'];
            $paper_id = $_POST['paper_id'];
            $_SESSION["userid"] = $userid;
            $_SESSION["paper_id"] = $paper_id;

            $result= $reviewer->reviewer_create_bid($paper_id, $userid);
            return $result;
        }
    }
}

$function = new controllerCreateBid; 
$createResult = $function->createBid($_POST['paper_id'], $_POST['userid']);
if($createResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Bid Created Successfully!');
        window.location.href='ReviewerHomeUI.php';
    </script>");
}
?>