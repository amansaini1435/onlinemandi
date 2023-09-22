<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = City::all();
        return response()->json([
            'cities' => $items
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
    public function store(Request $request,)
    {
        if (request()->expectsJson()) {
            $state =City::create([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" ,
            
        ]);
        $updateData = $request->only(["name"]);
        $updateData["status"] = $request->input('status') == "on" ? 1 : 0;
        
        City::create($updateData);
        return response()->json([
            "res" => "Success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $item =City::find($id);
            $item->delete();
            return response()->json([
                "res" => "Success"
            ]);
        }
    }
    public function updateStatus(Request $request)
    {
        $item = City::find( $request->id);
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'message' => 'City has been updated successfully'
        ]);
    }
}
