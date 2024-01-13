<?php

namespace App\Repositories;

interface FlightRepositoryInterface
{
    public function addFlight($request);
    public function getLastDestination($user_id);
}

