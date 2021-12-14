<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        if(isset($_COOKIE["user"])){
            $this->render("home-logged-in");
        }
        else{
            $this->render('home');
        }
    }

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function home()
    {
        if ($this->isPost()) {
            $cookie_name = "user";
            $cookie_value = $_COOKIE[$cookie_name];
            setcookie($cookie_name, $cookie_value, time() - 1, "/");

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        }

        if (isset($_COOKIE["user"])) {
            $this->render("home-logged-in");
        } else {
            $this->render('home');
        }
    }

    public function location(){
        $this->render('location');
    }

    public function profile(){
        $this->render('profile');
    }
}