<?php
include "classChairman.php";
include 'ChairmanHomeUI.php';

class controllerChairmanAllocatePaper{
    // User Story 15 - Manually allocate a paper to a reviewer
    public function allocatePaper($paper_id, $reviewer_id){
        $chairman = new Chairman;

        if (isset($_POST['cancel'])){
            header("location:ReviewerHomeUI.php");
        }

        if (isset($_POST['confirm'])){
            $paper_id = $_POST['paperid'];
            $reviewer_id = $_POST['reviewerid'];
            $_SESSION["paperid"] = $paper_id;
            $_SESSION["reviewerid"] = $reviewer_id;

            $result = $chairman->chairman_allocate_paper($paper_id, $reviewer_id);
            return $result;
        }
    }
}

$function = new controllerChairmanAllocatePaper;
$allocatePaper = $function->allocatePaper($_POST['paperid'], $_POST['reviewerid']);
if ($allocatePaper){
    echo
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Allocation of paper is successful!');
        window.location.href='ChairmanHomeUI.php';
    </script>");
}
?>