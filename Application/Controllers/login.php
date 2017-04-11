<?php

class Login extends Controller
{
    public function index()
    {
    	$_SESSION['errors']= [];
		if ( $this->model->isLoggedInSession()==true ) 
		{
		// stuur direct door naar main pagina
	    $_SESSION['errors'][] = "U bent ingelogd!";
		header('location: ' . URL . 'home/index');
		} 
		else 
		{
        	require APP . 'Views/_templates/header.php';
        	require APP . 'Views/login/index.php';
        	require APP . 'Views/_templates/footer.php';
    	}
    }


    public function Login_Action()
    {
    	$_SESSION['errors']= [];
		// redirect back to login with error if user didn't enter email
		if ( empty($_POST['name']) ) {
			$_SESSION['errors'][] = 'Fout: Geen e-mail ingevuld.';
		}

		// redirect back to login with error if user didn't enter pass
		if ( empty($_POST['password']) ) {
			$_SESSION['errors'][] = 'Fout: Geen wachtwoord ingevuld.';
		}

		// check if user can be found
		if (empty($_SESSION['errors'])) $result = $this->model->checkUser($_POST['name'], $_POST['password']);
        {}
		header('location: ' . URL . 'comments/admin');
    }

    public function logout()
    {
    	$this->model->logout();

    	header('location: ' . URL . 'home/index');
    }


 }