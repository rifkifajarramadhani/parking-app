<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Symfony\Component\HttpFoundation\Response;

use App\Models\ParkingBlock;
use App\Models\ParkingVehicle;

class ParkingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return ParkingVehicle::where([
            ["status", "=", 1],
            ["block", "<>", null],
        ])
        ->groupBy("block")
        ->having(DB::raw("count(police_number)"), "<", 5)
        ->first("block");
    }

    public function checkVehicle($policeNumber) {
        try {
            $checkVehicle = ParkingVehicle::where("police_number", $policeNumber)->first();

            return $checkVehicle;
        } catch(\Exception $e) {
            Log::debug($e->getMessage() . ' in ' . $e->getFile() . ' line ' . $e->getLine());

            return response()->json([
                'result' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function checkParkingSlot() {
        try {
            $checkParkingSlot = ParkingVehicle::join("parking_blocks", "parking_vehicles.block", "parking_blocks.id")
            ->where([
                ["parking_vehicles.status", "=", 1],
                ["parking_vehicles.block", "<>", null],
            ])
            ->groupBy("parking_vehicles.block")
            ->groupBy("parking_blocks.name")
            ->having(DB::raw("count(police_number)"), "<", 5)
            ->get("parking_blocks.name");

            if(count($checkParkingSlot) > 0) {
                return response()->json([
                    'result' => true,
                    'message' => 'Success get data',
                    'parkingAvailable' => $checkParkingSlot
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'result' => false,
                    'message' => 'No parking slot available'
                ], Response::HTTP_NOT_FOUND);
            }
        } catch(\Exception $e) {
            Log::debug($e->getMessage() . ' in ' . $e->getFile() . ' line ' . $e->getLine());

            return response()->json([
                'result' => false,
                'message' => 'Something went wrong'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getParkingSlot() {
        try {
            $parkingBlock = ParkingVehicle::where([
                ["status", "=", 1],
                ["block", "<>", null],
            ])
            ->groupBy("block")
            ->having(DB::raw("count(police_number)"), "<", 5)
            ->first("block");

            return $parkingBlock;
        } catch(\Exception $e) {
            Log::debug($e->getMessage() . ' in ' . $e->getFile() . ' line ' . $e->getLine());

            return response()->json([
                'result' => false,
                'message' => 'Something went wrong'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function vehicleIn(Request $request) {
        try {
            $checkVehicle = $this->checkVehicle($request->police_number);
            $checkParkingSlot = $this->checkParkingSlot();
            if(!empty($checkVehicle)) {
                if($checkVehicle->status == 1) {
                    return response()->json([
                        'result' => false,
                        'message' => 'There is same police number inside, maybe you have to cantact the police (?)'
                    ]);
                } else {
                    if(!empty($checkParkingSlot)) {
                        $parkingBlock = $this->getParkingSlot();

                        $checkVehicle->status = 1;
                        $checkVehicle->block = $parkingBlock->block;

                        $checkVehicle->save();

                        return response()->json([
                            'result' => true,
                            'message' => 'Success update vehicle status, In'
                        ], Response::HTTP_OK);
                    } else {
                        return response()->json([
                            'result' => true,
                            'message' => 'No space left inside'
                        ], Response::HTTP_NOT_FOUND);
                    }
                }
            } else {
                if(!empty($checkParkingSlot)) {
                    $parkingBlock = $this->getParkingSlot();

                    ParkingVehicle::create([
                        "police_number" => $request->police_number,
                        "block" => $parkingBlock->block,
                        "status" => 1
                    ]);

                    return response()->json([
                        'result' => true,
                        'message' => 'Success insert vehicle, In'
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        'result' => true,
                        'message' => 'No space left inside'
                    ], Response::HTTP_NOT_FOUND);
                }
            }
        } catch(\Exception $e) {
            Log::debug($e->getMessage() . ' in ' . $e->getFile() . ' line ' . $e->getLine());

            return response()->json([
                'result' => false,
                'message' => 'Something went wrong'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function vehicleOut(Request $request) {
        try {
            $checkVehicle = $this->checkVehicle($request->police_number);
            if(!empty($checkVehicle)) {
                if($checkVehicle->status == 0) {
                    return response()->json([
                        'result' => false,
                        'message' => 'This vehicle is not inside'
                    ]);
                } else {
                    $checkVehicle->block = null;
                    $checkVehicle->status = 0;

                    $checkVehicle->save();

                    return response()->json([
                        'result' => true,
                        'message' => 'Success update vehicle status, Out'
                    ], Response::HTTP_OK);
                }
            } else {
                return response()->json([
                    'result' => false,
                    'message' => 'No data for this vehicle'
                ], Response::HTTP_NOT_FOUND);
            }
        } catch(\Exception $e) {
            Log::debug($e->getMessage() . ' in ' . $e->getFile() . ' line ' . $e->getLine());

            return response()->json([
                'result' => false,
                'message' => 'Something went wrong'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
