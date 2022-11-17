<?php

include 'classAuthor.php';
include 'AuthorHomeUI.php';

class controllerViewReviews{

    public function viewReviews($viewReviewButton){
        $author = new Author;

        if (isset($_POST['viewReviewButton']))
        {   
            $viewReviewButton = $_POST['viewReviewButton'];
            $_SESSION["viewReviewButton"] = $viewReviewButton;

            $result= $author->author_view_review($viewReviewButton);
            return $result;
        }
        
    }
}