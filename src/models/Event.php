<?php

class Event
{

    private $name;
    private $max_players;
    private $begin_time;

    /**
     * @param $name
     * @param $max_players
     * @param $begin_time
     */
    public function __construct(string $name, int $max_players, date $begin_time)
    {
        $this->name = $name;
        $this->max_players = $max_players;
        $this->begin_time = $begin_time;
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
     * @return date
     */
    public function getBeginTime(): date
    {
        return $this->begin_time;
    }

    


}