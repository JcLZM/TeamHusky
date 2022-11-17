<?php
include 'ChairmanHomeUI.php';
include "classChairman.php";

//Session start
session_start();

class controllerAcceptPaper{
    // User Story 17 - Accept a paper
    public function acceptPaper($paper_id){
        $chairman = new Chairman;

        if (isset($_POST['update'])){
            $paper_id = $_POST['paper_id'];
            $_SESSION["paper_id"] = $paper_id;

            $result = $chairman->chairman_accept_paper($paper_id);
            return $result;
        }
    }
}

$function = new controllerAcceptPaper;
$acceptResult = $function->acceptPaper($_POST['paper_id']);
if($acceptResult)
{
    echo
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Paper has been accepted successfully!');
        window.location.href='ChairmanHomeUI.php';
    </script>");
}
?>
