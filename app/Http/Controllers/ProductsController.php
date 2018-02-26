<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $requestEloquent){
        return Product::create($requestEloquent->all());
    }

    public function update(Request $requestEloquent, Product $product){
        $product->update($requestEloquent->all());

        return $product;
    }

    public function show(Product $product){
        return $product;
    }

    public function destroy(Request $requestEloquent, Product $product){
        $product->delete();

        return $product;
    }
}
