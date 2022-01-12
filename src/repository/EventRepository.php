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

    public function getAllEvents(): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.event;
        ');
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            $result[] = new Event(
                $event['creator'],
                $event['location'],
                $event['name'],
                $event['max_players'],
                new DateTime($event['begin_time'])
            );
        }

        return $result;
    }

    public function getEventIdByEventName(string $eventName){
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.event WHERE name = :name
        ");
        $stmt->bindParam(':name', $eventName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]["id"];
    }

    public function getEventMaxPlayersByEventId(string $eventId) :string{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.event WHERE id = :id
        ');
        $stmt->bindParam(':id', $eventId, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]["max_players"];
    }

    public function getEventByEventId(int $eventId): Event
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.event WHERE id = :id
        ');
        $stmt->bindParam(':id', $eventId, PDO::PARAM_STR);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Event($event["creator"], $event["location"], $event["name"], $event["max_players"], new DateTime($event["begin_time"]));
    }
}