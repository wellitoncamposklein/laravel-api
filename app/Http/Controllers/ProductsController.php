<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest as Request;
use App\Product;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function index(){
        $minutes = \Carbon\Carbon::now()->addMinutes(10);
        //Trabalhando com CACHE a baixo
        $products = \Cache::remember('api::products',$minutes, function (){
            return Product::all();
        });

        return $products;
    }

    public function store(Request $requestEloquent){
        //apagando o CACHE a baico
        \Cache::forget('api::products');

        $data = $requestEloquent->all();
        $data['user_id'] = \Auth::user()->id;
        return Product::create($data);
    }

    public function update(Request $requestEloquent, Product $product){
        $product->update($requestEloquent->all());

        return $product;
    }

    public function show(Product $product){
        return $product;
    }

    public function destroy(Request $requestEloquent, Product $product){
        $this->authorize('delete', $product);

        $product->delete();
        return $product;
    }
}
