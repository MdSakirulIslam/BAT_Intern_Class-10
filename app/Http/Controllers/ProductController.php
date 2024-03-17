<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public static $product,$products;
    public function index()
    {
        return view('product.index');
    }
    public function store(Request $request)
    {
        Product::newProduct($request);
        return back()->with('message','Product has saved Successfully');
    }
    public function manage()
    {
        return view('product.manage',['products'=>Product::all()]);
    }
    public function edit($id)
    {
        return view('product.edit',['product'=>Product::find($id)]);
    }
    public function update(Request $request)
    {

        Product::updateProduct($request);
        return back()->with('message','Product information has updated successfully');
    }
    public function delete(Request $request)
    {
        Product::deleteProduct($request->id);
        return back()->with('message','Product information has deleted successfully');
    }



}
