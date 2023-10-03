<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::all();
        return response()->json([
            'products' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getAll()
    {
        $products =Product::get()->toJson(JSON_PRETTY_PRINT);
        return response($products, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "hname" => 'required',
            "code" => 'required',
            "category_id"=> 'required',
            "unit_id"=> 'required',
            "weights"=>"required",
            "default_weight"=> 'required',          
            "image"=> 'required',

        ]);
        $creationData = $request->only(["name", "hname", "code", "category_id", "unit_id", "default_weight", "weights","image"]);
        $creationData["status"] = $request->input('status');
        Product::create($creationData);
       
        $response = Product::create();
        return response()->json([
            "res" => "Success",
            'data' => $response
        ]);
    }
   
    public function getProduct($id) {
        if (Product::where('id', $id)->exists()) {
            $product = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($product, 200);
          } else {
            return response()->json([
              "message" => "Product not found"
            ], 404);
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
            "hname" ,
            "category_id",
            "code" ,
            "unit_id",
            "default_weight",
            "weights",
            "image"
            
        ]);
        $updateData = $request->only(["name", "hname","code", "category_id", "unit_id", "default_weight", "weights","image"]);
        $updateData["status"] = $request->input('status') == "on" ? 1 : 0;
        
        Product::create($updateData);
        return response()->json([
            "res" => "Success"
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::find($id);
        $item->delete();
        return response()->json([
            "res" => "Success"
        ]);
    }

    
    public function updateStatus(Request $request)
    {
        $item = Product::find( $request->id);
        $item->status = !$item->status;
        $item->save();
        return response()->json([
            'message' => 'Products has been updated successfully'
        ]);
    }
}
