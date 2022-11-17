<!-- <?php
include 'classUser.php';
class Chairman extends User{

    // User Story 15 - Manually allocate a paper to a reviewer
    public function chairman_allocate_paper($paper_id, $reviewer_id){
        $conn = OpenCon();
        $query = "UPDATE papers SET paper_status = 'Pending Review' AND reviewer_id = '$reviewer_id' WHERE $paper_id = '$paper_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Request unsuccessful");
        return $result;
    }

    // User Story 16 - Search papers by ratings
    public function chairman_search_paper($review_id){
        $conn = OpenCon();
        $query = "SELECT * FROM papers WHERE review_id = '$review_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No papers with such ratings");
        return $result;
    }

    // User Story 17 - Accept a paper
    public function chairman_accept_paper($paper_id){
        $conn = OpenCon();
        $query = "UPDATE papers SET paper_status = 'Accepted' WHERE paper_id = '$paper_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Request unsuccessful");
        return $result;
    }

    // User Story 18 - Reject a paper
    public function chairman_decline_paper($paper_id){
        $conn = OpenCon();
        $query = "UPDATE papers SET paper_status = 'Rejected' WHERE paper_id = '$paper_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Request unsuccessful");
        return $result;
    }

    // User Story 19 - View papers
    public function chairman_view_paper(){
        $conn = OpenCon();
        $query = "SELECT * FROM papers";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno()."No papers available");
        return $result;
    }

    // User Story #23 - So that I can make changes
    public function chairman_delete_bid($userid, $bid_id){
        $conn = OpenCon();
        $query = "DELETE FROM bids WHERE reviewer_id = '$userid' AND bid_id = '$bid_id'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."Bid cannot be deleted");
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
?> -->
