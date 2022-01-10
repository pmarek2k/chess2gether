<?php

require_once 'AppController.php';
require_once __DIR__ .'/../repository/UserRepository.php';
require_once __DIR__ .'/../repository/EventRepository.php';
require_once __DIR__ .'/../repository/EventLocationRepository.php';
require_once __DIR__ .'/../models/Event.php';
require_once __DIR__ .'/../models/EventLocation.php';

class LocationController extends AppController
{
    public function chooseLocation(){
        if(!$this->isPost()){
            $this->render("chooseLocation");
        }

        echo "hello ❤";

    }

    public function createLocation(){
        if(!$this->isPost()){
            $this->render("createLocation");
        }

        else{

        $eventLocationRepository = new EventLocationRepository();
        $eventRepository = new EventRepository();
        $userRepository = new UserRepository();

        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $name = $_POST["name"];
        $max_players = $_POST["max_players"];
        $datetime = $_POST["meeting-time"];
        $userId = $userRepository->getUserIdByUsername($_COOKIE["user"]);

        $eventLocation = new EventLocation($latitude, $longitude);

        $eventLocationRepository->addEventLocation($eventLocation);
        $locationId = $eventLocationRepository->getEventLocationId($eventLocation);

        try {
            $event = new Event($userId, $locationId, $name, intval($max_players), new DateTime($datetime));
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        $eventRepository->addEvent($event);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");

        }

    }

}