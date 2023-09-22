<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Seller::all();
        return response()->json([
            'sellers' => $items
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
       $request->validate([
        'name',
        'email',
        'phone',
        'city_id'
       ]);
       $updateData=$request->only(['name','email','phone','city_id']);
       $updateData["status"]=$request->input('status')=="on" ?1 :0;

       Seller::create($updateData);
       return response()->json([
        "res"=>"Success"
       ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Seller::find($id);
        $item->delete();
        return response()->json([
            "res" => "Success"
        ]);
    }

    public function updateStatus(Request $request)
    {
        $item = Seller::find( $request->id);
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'message' => 'User has been updated successfully'
        ]);
    }
}
