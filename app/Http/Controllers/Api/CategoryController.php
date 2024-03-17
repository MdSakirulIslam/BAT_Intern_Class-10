<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Product::latest()->get();

        return response()->json([
            'success' => 'true',
            'message' => 'Data Return Successfully',
            'data' => $categories,
        ]);
    }

    public function store(Request $request){
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product Added Successfully',
        ]);
    }
    public function show($id){
        $product = Product::findOrFail($id);

        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);
    }
}
