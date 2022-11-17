<?php
include 'classUser.php';
class Reviewer extends User
{
    public function reviewer_edit_workload($reviewer_id, $reviewer_workload)
    {
        $conn = OpenCon();
        $query = "UPDATE reviewer SET reviewer_workload = '$reviewer_workload' WHERE reviewer_id = '$reviewer_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Request unsuccessful");
        return $result;
    }

    public function reviewer_view_reviewed_paper()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM papers WHERE paper_status = 'Reviewed'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No unreviewed papers available");
        return $result;
    }

    public function reviewer_view_unassigned_paper()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM papers WHERE paper_status = 'Pending Review'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No unreviewed papers available");
        return $result;
    }

    public function reviewer_view_assigned_paper($reviewer_id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM papers WHERE reviewer_id = '$reviewer_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No unreviewed papers available");
        return $result;
    }

    public function reviewer_create_bid($reviewer_id, $paper_id)
    {
        $conn = OpenCon();
        $query1 = "SELECT paper_id FROM papers WHERE paper_status = 'Review pending' AND paper_id = '$paper_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "No unreviewed papers available");
        $query2 = "INSERT INTO bids (bid_id, paper_id, reviewer_id) VALUES ('', '$result1', '$reviewer_id')";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_connect_errno() . "Bid unsuccessful");
        return $result2;
    }

    public function reviewer_delete_bid($reviewer_id, $paper_id)
    {
        $conn = OpenCon();
        $query = "DELETE FROM bids WHERE reviewer_id = '$reviewer_id' AND paper_id = '$paper_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No papers available for deletion");
        return $result;
    }

    public function reviewer_view_bid($reviewer_id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM bids WHERE reviewer_id = '$reviewer_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No bids to display");
        return $result;
    }

    public function reviewer_review_rate_paper($paper_id, $reviewer_id, $review_id, $reviewer_rating, $comment)
    {
        $conn = OpenCon();
        $query1 = "UPDATE papers SET reviewer_id = '$reviewer_id' AND review_id = '$review_id' 
        WHERE paper_id = '$paper_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "Review unsuccessful");

        $query2 = "INSERT INTO reviews (review_id, comment_id, reviewer_rating) VALUES ('$review_id', '$review_id', '$reviewer_rating')";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_connect_errno() . "Review unsuccessful");

        $query3 = "INSERT INTO comments VALUES ('$review_id', '$reviewer_id', '$review_id', '$comment')";
        $result3 = mysqli_query($conn, $query3) or die(mysqli_connect_errno() . "Review unsuccessful");
    }

    public function reviewer_view_review($paper_id)
    {
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "No reviews available");

        $query2 = "SELECT * FROM reviews INNER JOIN comments ON reviews.review_id = comments.review_id WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_connect_errno() . "No reviews available");
        return $result2;
    }

    public function reviewer_edit_review_rating($paper_id, $reviewer_id, $reviewer_rating, $comment)
    {
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE reviewer_id = '$reviewer_id' AND paper_id = '$paper_id'";
        $result1 = mysqli_query($conn, $query1);

        $query2 = "UPDATE reviews SET reviewer_rating = '$reviewer_rating' WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);

        $query3 = "UPDATE comments SET comment = '$comment' WHERE review_id = '$result1'";
        $result3 = mysqli_query($conn, $query3);
    }

    public function reviewer_delete_comment($paper_id, $reviewer_id)
    {
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND reviewer_id = '$reviewer_id'";
        $result1 = mysqli_query($conn, $query1);

        $query2 = "DELETE FROM comments WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
    }

    public function reviewer_delete_rating($paper_id, $reviewer_id)
    {
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND reviewer_id = '$reviewer_id'";
        $result1 = mysqli_query($conn, $query1);

        $query2 = "DELETE FROM reviews WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
    }
}
