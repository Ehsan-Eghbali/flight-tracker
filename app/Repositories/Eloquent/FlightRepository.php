<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\AddFlightRequest;
use App\Models\Flight;
use App\Repositories\FlightRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlightRepository extends BaseRepository implements FlightRepositoryInterface
{
    public function __construct(private FlightRepositoryInterface $flightRepository)
    {

    }
    public function addFlight($request)
    {
        $flights = $request->input('flights');
        $user_id = $request->input('user_id');
        DB::beginTransaction();
        try {
            foreach ($flights as $flight) {
                $this->flightRepository->create([
                    'user_id' => $user_id,
                    'origin' => $flight[0],
                    'destination' => $flight[1],
                ]);
            }
            DB::commit();
            return response()->json(['message' => 'Flights added successfully']);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return $exception;
        }

    }

    public function getLastDestination($user_id): \Illuminate\Http\JsonResponse
    {
        $last_destination = $this->flightRepository->where('user_id','=', $user_id)->latest()->first();

        if ($last_destination) {
            return response()->json(['last_destination' => [$last_destination->origin, $last_destination->destination]]);
        } else {
            return response()->json(['message' => 'No flight data found for the user']);
        }
    }

}
