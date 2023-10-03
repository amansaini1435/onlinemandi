<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = State::all();
        return response()->json([
            'states' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            if (request()->expectsJson()) {
                $state = State::create([
                    'name' => $request->name,
                    'status' => $request->status,
                ]);
                return response()->json([
                    'res' => "success"
                ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        {
            if (request()->expectsJson()) {
                $state = State::with('cities')->find($id);
                return response()->json([
                    'state' => $state
                ]);
            }
            return view('dashboard');
        }
    }

    public function addCity(Request $request)
    {
        if (request()->expectsJson()) {
            $model = City::create([
                'name' => $request->name,
                'state_id' => $request->stateId,
                'status' => $request->status,
            ]);
            return response()->json([
                'res' => "success"
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $state->update($request->only('name', 'status'));
        return response()->json([
            'message' => 'State has been updated successfully'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            if (request()->expectsJson()) {
                $state = State::with('cities')->find($id);
                if(count($state->cities) > 0){
                    return response()->json([
                        'result' => "fail",                    
                    ]);
                }
                $result = $state->delete();
                return response()->json([
                    'result' => $result,                    
                ]);
    
                
            }
            return view('dashboard');
        }
    }

    public function updateStatus(Request $request)
    {
        $item = City::find( $request->id);
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'message' => 'State has been updated successfully'
        ]);
    }
}
