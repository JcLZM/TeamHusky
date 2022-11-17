<?php
include 'ChairmanHomeUI.php';
include "classChairman.php";

//Session start
session_start();

class controllerDeclinePaper{
    // User Story 18 - Reject a paper
    public function declinePaper($paper_id){
        $chairman = new Chairman;

        if (isset($_POST['update'])){
            $paper_id = $_POST['paper_id'];
            $_SESSION["paper_id"] = $paper_id;

            $result = $chairman->chairman_decline_paper($paper_id);
            return $result;
        }
    }
}

$function = new controllerDeclinePaper;
$acceptResult = $function->declinePaper($_POST['paper_id']);
if($acceptResult)
{
    echo
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Paper has been declined successfully!');
        window.location.href='ChairmanHomeUI.php';
    </script>");
}
?>