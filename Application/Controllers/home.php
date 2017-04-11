<?php

class Home extends Controller
{
    public function index() 
    {
        {
            require APP . 'Views/_templates/header.php';
            require APP . 'Views/home/index.php';
            require APP . 'Views/_templates/footer.php';
        }
    }

    public function about()
    {
        {
            require APP . 'Views/_templates/header.php';
            require APP . 'Views/home/about.php';
            require APP . 'Views/_templates/footer.php';
        }
    }


}
