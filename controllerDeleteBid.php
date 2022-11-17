<?php
include 'classReviewer.php';
include 'classChairman.php';

class controllerDeleteBid
{
    public function deleteBid($userid, $paperid)
    {
        $reviewer = new Reviewer;

        if (isset($_POST['delete']))
        {
            $userid = $_POST['userid'];
            $_SESSION["userid"] = $userid;

            $paperid = $_POST['paperid'];
            $_SESSION["paperid"] = $paperid;

            $result= $reviewer->reviewer_delete_bid($userid, $paperid);
            return $result;
        }
    }

    public function chairManDeleteBid($userid, $bid_id){
        $chairman = new Chairman;

        if (isset($_POST['delete']))
        {
            $userid = $_POST['userid'];
            $_SESSION["userid"] = $userid;

            $bid_id = $_POST['bidid'];
            $_SESSION["bidid"] = $bid_id;

            $result= $chairman->chairman_delete_bid($userid, $bid_id);
            return $result;
        }
    }
}

$function = new controllerDeleteBid; 
$deleteResult = $function->deleteBid($_POST['user_id'], $_POST['paperid']);
if($deleteResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Bid Deleted Successfully!');
        window.location.href='ReviewerHomeUI.php';
    </script>");
}
?>