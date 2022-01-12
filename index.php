<?php

require 'Routing.php';

//phpinfo();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'DefaultController');
Router::get('login', 'SecurityController');
Router::get('register', 'SecurityController');
Router::get('home-logged-in', 'DefaultController');
Router::get('createLocation', 'LocationController');
Router::get('chooseLocation', 'LocationController');
Router::get('getLocations', 'LocationController');
Router::get('result', 'LocationController');
Router::get('events', 'EventController');
Router::get('getEvents', 'EventController');

Router::run($path);