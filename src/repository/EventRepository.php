<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function addEvent(Event $event){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.event (creator, location, name, max_players, begin_time) VALUES (:creator, :location, :name, :max_players, :begin_time)
        ');
        $creator = $event->getCreatorId();
        $location = $event->getLocationId();
        $name = $event->getName();
        $max_players = $event->getMaxPlayers();
        $begin_time = $event->getBeginTime()->format("c");

        $stmt->bindParam(':creator', $creator, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':max_players', $max_players, PDO::PARAM_STR);
        $stmt->bindParam(':begin_time', $begin_time, PDO::PARAM_STR);
        $stmt->execute();
    }
}