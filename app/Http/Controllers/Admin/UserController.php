<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return response()->json([
            'items' => $items
        ]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required",

        ]);
        $creationData = $request->only(["name", "email"]);
        $creationData["status"] = $request->input('status');
       User::create($creationData);
        return response()->json([
            "res" => "Success"
        ]);
    }
    
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required",
        ]);

        $item = User::find($id);

        if ($item) {
            $updateData = $request->only(["name", "email"]);

            $updateData["status"] = $request->input('status');
            $item->update($updateData);
        }
        return response()->json([
            "res" => "Success"
        ]);
    }

    public function updateStatus(Request $request)
    {
        $item = User::find( $request->id);
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'message' => 'User has been updated successfully'
        ]);
    }


    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return response()->json([
            "res" => "Success"
        ]);
    }
    
}
