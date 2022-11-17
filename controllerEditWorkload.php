<?php
include 'classReviewer.php';

class controllerEditWorkload
{
    public function editWorkload($userid, $workload)
    {
        $reviewer = new Reviewer;

        if (isset($_POST['cancel']))
        {
            header("location:ReviewerHomeUI.php");
        }

        if (isset($_POST['confirm']))
        {
            $workload = $_POST['workload'];
            $userid = $_POST['userid'];
            $_SESSION["workload"] = $workload;
            $_SESSION["userid"] = $userid;

            $result= $reviewer->reviewer_edit_workload($userid, $workload);
            return $result;
        }
    }
}

$function = new controllerEditWorkload; 
$editResult = $function->editWorkload($_POST['userid'], $_POST['workload']);
if($editResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Workload Edited Successfully!');
        window.location.href='ReviewerHomeUI.php';
    </script>");
}
?>