<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFlightRequest;
use App\Http\Requests\GetFlightRequest;
use App\Services\Flight\FlightServiceInterface;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    public function __construct(private FlightServiceInterface $flightService)
    {
    }
    public function addFlight(AddFlightRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->flightService->addFlight($request->validated());
    }

    public function getLastDestination(GetFlightRequest $user_id)
    {
        return $this->flightService->getLastDestination($user_id);
    }
}
