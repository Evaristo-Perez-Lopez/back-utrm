<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'unique:products', 'required'],
            'description' => ['string', 'required'],
            'price' => ['numeric', 'gt:0', 'required'],
            'size' => ['string', 'max:1', 'required'],
            'material' => ['string', 'required']
        ]);

        $product = Product::create([
            'name' => $validated["name"],
            'description' => $validated["description"],
            'price' => $validated["price"],
            'size' => $validated["size"],
            'material' => $validated["material"]
        ]);

        if ($product) {
            return response()->json(
                ['message' => "Stored succesfully!"],
                200
            );
        } else {
            return response()->json(
                ['message' => "Whoops!, Something happpened while trying to store the product."],
                401
            );
        }
    }
}
