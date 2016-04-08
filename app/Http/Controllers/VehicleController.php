<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of all vehicles.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => Vehicle::orderBy('created_at', 'asc')->get()
        ]);
    }

    /**
     * creating a new vehicle.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plate' => 'required|min:6|max:6',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $vehicle = new Vehicle;
        $vehicle->plate = $request->plate;
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->save();
        return redirect('/');
    }

    /**
     * Display the specified vechile.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $vehicle
        ], 200);
    }

    /**
     * Remove the specified vehicle.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $vehicle
        ], 200);
    }
}
