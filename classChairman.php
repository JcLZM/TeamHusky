<?php
include 'classUser.php';

class classChairman extends User{

    // User Story #23 - So that I can make changes
    public function chairman_delete_bid($userid, $bid_id){
        $conn = OpenCon();
        $sql = "DELETE FROM bids WHERE reviewer_id = '$userid' AND bid_id = '$bid_id'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Bid cannot be deleted");
        if ($result !== FALSE){
            return $result; // If delete is successful, it will return 1
        }
        else{
            return false;
        }
    }

    // User Story #24 - So that when assigning the paper I can take into account of reviewer bid
    public function chairman_view_bid($userid){
        $conn = OpenCon();
        $query = "'SELECT * FROM bids WHERE reviewer_id = '$userid'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno()."SQL Error");
        return $result;
    }
}
?>