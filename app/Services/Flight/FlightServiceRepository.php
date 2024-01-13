<?php

namespace App\Services\Flight;

use App\Http\Requests\AddFlightRequest;
use App\Models\Flight;
use App\Repositories\FlightRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightServiceRepository implements FlightServiceInterface
{

    public function __construct(private FlightRepositoryInterface $flightRepository)
    {
    }
    public function addFlight($request)
    {
       $this->flightRepository->addFlight($request);
    }

    public function getLastDestination($user_id)
    {
        $this->flightRepository->getLastDestination($user_id);
    }
}
