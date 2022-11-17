<?php
include 'classAuthor.php';

//Session start
session_start();

class controllerSubmitPaper
{
    public $errorCreate = '';

    //create user
    public function submit_paper($user_id, $title, $content)
    {
        $author = new author;

        if (isset($_POST['enter']))
        {
            //Validate Create User
            if (empty($title)|| empty($content))
            {
                echo 
                    ("<script LANGUAGE='JavaScript'> 		
                        window.alert('Textboxes must not be blank');
                        window.location.href='AuthorHomeUI.php';
                    </script>");
            }
            else
            {
                $title = $_POST['title'];
                $content = $_POST['content'];

                $_SESSION["title"] = $title;
                $_SESSION["content"] = $content;

                $paper_status = "Pending Review";

                $result = $author -> author_submit_paper($user_id, $title, $content, $paper_status);
                if($result) 
                {
                    return $result;
                }
                else
                {
                    echo 
                    ("<script LANGUAGE='JavaScript'> 		
                        window.alert('Error');
                        window.location.href='AuthorHomeUI.php';
                    </script>");
                }
            }
        }
    }
}

$createUserFunction = new controllerSubmitPaper;
$createUserResult = $createUserFunction -> submit_paper($_SESSION['user_id'], $_POST['title'], $_POST['content']);
if($createUserResult)
{
    echo 
    ("<script LANGUAGE='JavaScript'> 		
        window.alert('Paper submitted');
        window.location.href='AuthorHomeUI.php';
    </script>");
}
?>