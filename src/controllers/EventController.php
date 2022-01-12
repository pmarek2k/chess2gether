<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/EventRepository.php';
require_once __DIR__ . '/../repository/UserEventRepository.php';
require_once __DIR__ . '/../repository/EventLocationRepository.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/EventLocation.php';
require_once __DIR__ . '/../models/EventModel.php';

class EventController extends AppController
{
    public function events()
    {
        if ($this->isGet()) {
            return $this->render('events');
        }

        $eventRepository = new EventRepository();
        $userRepository = new UserRepository();
        $userEventRepository = new UserEventRepository();

        $eventName = $_POST["event-name"];
        $userId = $userRepository->getUserIdByUsername($_COOKIE["user"]);
        $eventId = $eventRepository->getEventIdByEventName($eventName);
        $userEventRepository->removeUserFromEvent($userId, $eventId);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }

    public function getEvents()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {

            header('Content-type: application/json');
            http_response_code(200);

            $eventLocationRepository = new EventLocationRepository();
            $eventRepository = new EventRepository();
            $userRepository = new UserRepository();
            $userEventRepository = new UserEventRepository();

            $user = $_COOKIE["user"];

            $id = $userRepository->getUserIdByUsername($user);
            $userEvents = $userEventRepository->getAllEventsIdWherePlayerIsSignedIn($id);

            $eventModels = [];

            foreach ($userEvents as $eventId) {
                $event = $eventRepository->getEventByEventId($eventId);
                //var_dump($event);
                $creator = $userRepository->getUsernameById($event->getCreatorId());
                $location = $eventLocationRepository->getLocationNameById($event->getLocationId());
                $eventModels[] = new EventModel($creator, $location, $event->getName(), $event->getMaxPlayers(), $event->getBeginTime());
            }
            echo json_encode($eventModels);
        }
    }

}