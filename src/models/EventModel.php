<?php

class EventModel implements JsonSerializable
{
    private $creator;
    private $location;
    private $name;
    private $max_players;
    private $begin_time;

    public function __construct(string $creator, EventLocation $location, string $name, int $max_players, DateTime $begin_time)
    {
        $this->creator = $creator;
        $this->location = $location;
        $this->name = $name;
        $this->max_players = $max_players;
        $this->begin_time = $begin_time;
    }

    public function jsonSerialize(): array
    {
        return [
            'creator' => $this->getCreator(),
            'location' => $this->getLocation(),
            'name' => $this->getName(),
            'max_players' => strval($this->getMaxPlayers()),
            'begin_time' => $this->getBeginTime()->format("c")
        ];
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @return EventLocation
     */
    public function getLocation(): EventLocation
    {
        return $this->location;
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