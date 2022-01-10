<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/EventLocation.php';

class EventLocationRepository extends Repository
{

    public function addEventLocation(EventLocation $eventLocation){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."eventLocation" (longitude, latitude) VALUES (:longitude, :latitude)
        ');
        $longitude = $eventLocation->getLongitude();
        $latitude = $eventLocation->getLatitude();
        $stmt->bindParam(':longitude', $longitude, PDO::PARAM_STR);
        $stmt->bindParam(':latitude', $latitude, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getEventLocationId(EventLocation $eventLocation){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."eventLocation" WHERE longitude = :longitude and latitude = :latitude
        ');
        $longitude = $eventLocation->getLongitude();
        $latitude = $eventLocation->getLatitude();
        $stmt->bindParam(':longitude', $longitude, PDO::PARAM_STR);
        $stmt->bindParam(':latitude', $latitude, PDO::PARAM_STR);
        $stmt->execute();

        $selectedEvent = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($selectedEvent == false) {
            return null;
        }

        return $selectedEvent["id"];
    }

}