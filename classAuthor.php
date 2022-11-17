<?php
include 'classUser.php';
class Author extends User
{   
    public function author_submit_paper($authorid, $title, $content, $paper_status)
    {
        $conn = OpenCon();
        $query = "INSERT INTO papers (author_id, reviewer_id, review_id, title, content, paper_status) 
        VALUES('$authorid', NULL, NULL, '$title', '$content', '$paper_status')";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Submission unsuccessful");
        return $result; // If successful, returns 1 row
    }

    public function author_view_review($paperId){
        $conn = OpenCon();
        $query = "SELECT * FROM reviews where review_id in (SELECT review_id FROM papers where paper_id = $paperId)LIMIT 9";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "Submission unsuccessful");
        return $result; // If successful, all reviews
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
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND author_id = '$author_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "Paper not found");
        $query2 = "SELECT reviewer_rating FROM reviews WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
        return $result2;
    }

    public function author_search_paper($author_id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM papers WHERE author_id = '$author_id' ORDER BY paper_id DESC LIMIT 9";
        $result = mysqli_query($conn, $query) or die(mysqli_connect_errno() . "No papers found");
        return $result;
    }

    public function author_rate_review($author_id, $paper_id, $author_rating)
    {
        $conn = OpenCon();
        $query1 = "SELECT review_id FROM papers WHERE paper_id = '$paper_id' AND author_id = '$author_id'";
        $result1 = mysqli_query($conn, $query1) or die(mysqli_connect_errno() . "Paper not found");
        $query2 = "UPDATE reviews SET author_rating = '$author_rating' WHERE review_id = '$result1'";
        $result2 = mysqli_query($conn, $query2);
        return $result2;
    }
}
