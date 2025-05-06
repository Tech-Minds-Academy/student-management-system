<?php
class MainController
{
    public function index()
    {
        // handle login logic
        require_once dirname(__DIR__, 1) . '/views/home/index.php';
    }
    public function about()
    {
        //handle about page 
        require_once dirname(__DIR__, 1) . '/views/about.php';

    }
}

?>