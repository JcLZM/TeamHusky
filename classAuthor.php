<?php
include 'classUser.php';
class author extends user
{
    public function author_submit_paper($author_id, $title, $content)
    {
        $conn = OpenCon();
        $query = "INSERT INTO papers (author_id, title, content, paper_status) 
        VALUES('$author_id', '$title', '$content', 'Review pending')";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Submission unsuccessful");
        return $result; // If successful, returns 1 row
    }

    public function author_delete_paper($author_id, $paper_id)
    {
        $conn = OpenCon();
        $query = "DELETE FROM papers WHERE paper_id = '$paper_id'AND author_id = '$author_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Submission unsuccessful");
        return $result; // If successful, returns deleted rows
    }

    public function author_view_rating($author_id, $paper_id)
    {
        $conn = opencon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND author_id = '$author_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "Paper not found");
        $query2 = "SELECT reviewer_rating FROM reviews WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
        return $result2;
    }

    public function author_search_paper($author_id)
    {
        $conn = opencon();
        $query = "SELECT * FROM papers WHERE author_id = '$author_id'";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No papers found");
        return $result;
    }

    public function author_rate_review($author_id, $paper_id, $author_rating)
    {
        $conn = opencon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND author_id = '$author_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "Paper not found");
        $query2 = "UPDATE reviews SET author_rating = '$author_rating' WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
        return $result2;
    }
}
