<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('home');
    }

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function home_logged_in()
    {
        $this->render('home-logged-in');
    }

    public function home()
    {
        $this->render('home');
    }

    public function location(){
        $this->render('location');
    }

    public function profile(){
        $this->render('profile');
    }
}