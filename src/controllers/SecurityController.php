<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../repository/UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];

        $password = $_POST['password'];
        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $cookie_name = "user";
        $cookie_value = $user->getUsername();
        setcookie($cookie_name, $cookie_value, time() + (86400), "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register(){

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $username = $_POST['username'];

        $user = $userRepository->getUser($email);
        if($user != null){
            return $this->render('register', ['messages' => ['User with that email already exists!']]);
        }

        if($userRepository->usernameAlreadyExists($username)){
            return $this->render('register', ['messages' => ['Username already taken!']]);
        }

        $user = new User($email, $username, password_hash($_POST['password'], PASSWORD_DEFAULT));
        $userRepository->addUser($user);

        $cookie_name = "user";
        $cookie_value = $user->getUsername();
        setcookie($cookie_name, $cookie_value, time() + (86400), "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

}