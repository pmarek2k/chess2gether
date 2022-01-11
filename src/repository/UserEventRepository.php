<?php

require_once 'Repository.php';

class UserEventRepository extends Repository
{

    public function insertUserEvent(string $userId, string $eventId){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public."userEvent" (user_id, event_id) VALUES (:user_id, :event_id)
        ');

        $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':event_id', $eventId, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function getPlayersNumber(string $eventId) :int{
        $stmt = $this->database->connect()->prepare('
        SELECT COUNT(*) from public."userEvent" where event_id = :event_id
        ');
        $stmt->bindParam(':event_id', $eventId, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        return $count["count"];
    }

    public function playerTakesPartInEvent(int $userId, int $eventId){
        $stmt = $this->database->connect()->prepare('
        SELECT * from public."userEvent" where user_id = :user_id and event_id = :event_id
        ');
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':event_id', $eventId, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result == false){
            return false;
        }
        return true;
    }

}