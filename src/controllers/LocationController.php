<?php

require_once 'AppController.php';
require_once __DIR__ .'/../repository/UserRepository.php';
require_once __DIR__ .'/../repository/EventRepository.php';
require_once __DIR__ .'/../repository/UserEventRepository.php';
require_once __DIR__ .'/../repository/EventLocationRepository.php';
require_once __DIR__ .'/../models/Event.php';
require_once __DIR__ .'/../models/EventLocation.php';
require_once __DIR__ .'/../models/EventModel.php';

class LocationController extends AppController
{
    public function chooseLocation(){
        if(!$this->isPost()){
            $this->render("chooseLocation");
        }
        else{
            $eventRepository = new EventRepository();
            $userRepository = new UserRepository();
            $userEventRepository = new UserEventRepository();

            $eventName = $_POST["event-name"];

            $userId = $userRepository->getUserIdByUsername($_COOKIE["user"]);
            $eventId = $eventRepository->getEventIdByEventName($eventName);

            //TODO: check if players is already in event

            $max_players = $eventRepository->getEventMaxPlayersByEventId($eventId);
            if($userEventRepository->playerTakesPartInEvent($userId, $eventId)){
                return $this->render('chooseLocation', ['messages' => ['You are already signed to that event']]);
            }
            $playersCount = $userEventRepository->getPlayersNumber($eventId);
            if(intval($playersCount) >= intval($max_players)){
                return $this->render('chooseLocation', ['messages' => ['This event is full!']]);
            }

            $userEventRepository->insertUserEvent($userId, $eventId);

            return $this->render('result', ['messages' => ['Successfully joined event']]);
        }
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

        // TODO: add successfully added page
            return $this->render('result', ['messages' => ['Event created succesfully']]);
        }

    }

    public function getLocations()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {

            header('Content-type: application/json');
            http_response_code(200);

            $eventLocationRepository = new EventLocationRepository();
            $eventRepository = new EventRepository();
            $userRepository = new UserRepository();

            $events = $eventRepository->getAllEvents();

            $eventModels = [];
            foreach ($events as $event) {
                $userId = $event->getCreatorId();
                $locationId = $event->getLocationId();
                $user = $userRepository->getUsernameById($userId);
                $location = $eventLocationRepository->getLocationNameById($locationId);
                $eventModels[] = new EventModel($user, $location, $event->getName(), $event->getMaxPlayers(), $event->getBeginTime());


            }

            echo json_encode($eventModels);
        }
    }

}