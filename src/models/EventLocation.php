<?php

class EventLocation
{
    private $longitude;
    private $latitude;

    /**
     * @param $longitude
     * @param $latitude
     */
    public function __construct(double $longitude, double $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
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