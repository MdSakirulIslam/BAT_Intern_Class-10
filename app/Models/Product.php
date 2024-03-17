<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $newItem,$updateItem,$deleteItem,$image,$imageUrl,$derectory,$imageName;
    use HasFactory;
    public static function newProduct($request)
    {
        self::$image     =  $request->file('image');
        self::$imageName =  self::$image->getClientOriginalName();
        self::$derectory =  'upload/product-image/';
        self::$image->move(self::$derectory,self::$imageName);
        self::$imageUrl  =    self::$derectory.self::$imageName;


        self::$newItem              =  new Product();
        self::$newItem->name        =  $request->name;
        self::$newItem->price       =  $request->price;
        self::$newItem->description =  $request->description;
        self::$newItem->image       =  self::$imageUrl;
        self::$newItem->save();
    }

    public static function updateProduct($request)
    {
        self::$image     =  $request->file('image');
        self::$imageName =  self::$image->getClientOriginalName();
        self::$derectory =  'upload/product-image/';
        self::$image->move(self::$derectory,self::$imageName);
        self::$imageUrl  =    self::$derectory.self::$imageName;

        self::$updateItem=Product::find($request->id);
        self::$updateItem->name=$request->name;
        self::$updateItem->price=$request->price;
        self::$updateItem->description=$request->description;
        self::$updateItem->image       =  self::$imageUrl;
        self::$updateItem->save();
    }

    public static function deleteProduct($id)
    {
        self::$deleteItem=Product::find($id);
        self::$deleteItem->delete();
    }

}
