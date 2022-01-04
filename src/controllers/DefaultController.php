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
        if(isset($_COOKIE["user"])){
            $this->render("home-logged-in");
        }
        else{
            $this->render('login');
        }
    }

    public function register()
    {
        if(isset($_COOKIE["user"])){
            $this->render("home-logged-in");
        }
        else{
            $this->render('register');
        }
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
        if(isset($_COOKIE["user"])){
            $this->render("location");
        }
        else{
            $this->render('login');
        }
    }

    public function profile(){
        if(isset($_COOKIE["user"])){
            $this->render("profile");
        }
        else{
            $this->render('login');
        }
    }


}