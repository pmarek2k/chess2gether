<?php

class EventLocation implements JsonSerializable
{
    private $longitude;
    private $latitude;

    /**
     * @param $longitude
     * @param $latitude
     */
    public function __construct(string $longitude, string $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    public function jsonSerialize() :array
    {
        return [
            'longitude' => doubleval($this->getLongitude()),
            'latitude' => doubleval($this->getLatitude())
        ];
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

}