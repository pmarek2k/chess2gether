<?php

require 'Routing.php';

//phpinfo();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('login', 'SecurityController');
Router::get('register', 'SecurityController');
Router::get('home_logged_in', 'DefaultController');
Router::get('projects', 'DefaultController');
Router::get('location', 'DefaultController');
Router::get('profile', 'DefaultController');

Router::run($path);