<?php

namespace App\Services\Flight;

interface FlightServiceInterface
{
    public function addFlight($request);
    public function getLastDestination($user_id);
}

