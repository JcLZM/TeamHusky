<?php
include 'classUser.php';

class classChairman extends User{

    // User Story #23 - So that I can make changes
    public function deleteBids($bidToBeDeleted){
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "DELETE FROM bids WHERE bid_id = '$bidToBeDeleted'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot deleted");
        if ($result !== FALSE){
            return $result; // If delete is successful, it will return 1
        }
        else{
            return false;
        }
    }

    // User Story #24 - So that when assigning the paper I can take into account of reviewer bid
    public function viewBids(){
        $conn = OpenCon();
        $query = 'SELECT * FROM bids';
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno()."SQL Error");
        return $result;
    }
}
?>