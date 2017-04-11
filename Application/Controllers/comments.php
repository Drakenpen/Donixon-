<?php 

class comments extends Controller
{
    public function index()
    {
		{
	        $comments = $this->model->loadComments();

        	require APP . 'Views/_templates/header.php';
        	require APP . 'Views/comments/index.php';
        	require APP . 'Views/_templates/footer.php';
    	}
    }

    public function Admin()
    {
        $_SESSION['errors']= [];
        if ( $this->model->isAdmin()==false ) 
        {
        $_SESSION['errors'][] = "U heeft geen admin rechten!";
        header('location: ' . URL . 'login/index');
        } 
        else 
        {
            $comments = $this->model->loadComments();

            require APP . 'Views/_templates/header.php';
            require APP . 'Views/comments/admin.php';
            require APP . 'Views/_templates/footer.php';
        }
    }

    public function addComment()
    {
        $_SESSION['errors']= [];
        if (isset($_POST["submit_add_comment"])) {
            $this->model->addComment($_POST["name"], $_POST["comment"]);
            } 
        header('location: ' . URL . 'comments/index');
 
    }

    public function deleteComment($comment_id)
    {
        $_SESSION['errors']= [];
        if ( $this->model->isAdmin()==false ) 
        {
        $_SESSION['errors'][] = "U heeft geen admin rechten!";
        header('location: ' . URL . 'home/index');
        } 
        else 
        {
        if (isset($comment_id)) {
            $this->model->deleteComment($comment_id);
        }
            header('location: ' . URL . 'comments/admin');
        }
    }

    public function editComment($comment_id)
    {
        $_SESSION['errors']= [];
        if ( $this->model->isAdmin()==false ) 
        {
        $_SESSION['errors'][] = "U heeft geen admin rechten!";
        header('location: ' . URL . 'home/index');
        } 
        else 
        {
        if (isset($comment_id)) {
            $comment = $this->model->getComment($comment_id);

            require APP . 'Views/_templates/header.php';
            require APP . 'Views/comments/edit.php';
            require APP . 'Views/_templates/footer.php';
        } 
        else 
            {
            header('location: ' . URL . 'comments/index');
            }
        }
    }
    
    public function updateComment()
    {
        if (isset($_POST["submit_update_comment"])) {
            $this->model->updateComment($_POST["name"], $_POST["comment"], $_POST["comment_id"]);
        }
        header('location: ' . URL . 'comments/admin');
    }

}