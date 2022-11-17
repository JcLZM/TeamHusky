<?php
include 'ChairmanHomeUI.php';
include "classChairman.php";

//Session start
session_start();

class controllerViewNSearchPaper{
    // User Story 16, 19 - View and search papers
    public function ViewNSearchPaper($paperRatings){
        $chairman = new Chairman;

        if (isset($_POST['search'])){
            if (empty($paperRatings)){
                $viewPapers = $chairman->chairman_view_paper();
                return $viewPapers;
            }
        }
        else{
            $paperRatings = $_POST['paperRatings'];
            $_SESSION["paperRatings"] = $paperRatings;
            $paperList = $chairman->chairman_search_paper($paperRatings);
            return $paperList;
        }
    }
}

$viewNSearchFunction = new controllerViewNSearchPaper;
$viewNSearchResults = $viewNSearchFunction->ViewNSearchPaper($_POST['paperRatings']);

/*
 * Insert boundary code in line 35 (displayPaperList)
if ($viewNSearchResults){
    // IF result is not false
    displayPaperList($viewNSearchResults);
}
*/
?>