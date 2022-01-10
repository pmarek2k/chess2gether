<?php

class Event
{

    private $creatorId;
    private $locationId;
    private $name;
    private $max_players;
    private $begin_time;

    /**
     * @param $name
     * @param $max_players
     * @param $begin_time
     */
    public function __construct(int $creatorId, int $locationId, $name, int $max_players, DateTime $begin_time)
    {
        $this->creatorId = $creatorId;
        $this->locationId = $locationId;
        $this->name = $name;
        $this->max_players = $max_players;
        $this->begin_time = $begin_time;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->max_players;
    }

    /**
     * @return DateTime
     */
    public function getBeginTime(): DateTime
    {
        return $this->begin_time;
    }

    


}