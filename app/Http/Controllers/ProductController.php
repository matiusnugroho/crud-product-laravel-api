<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $response = [
            'data'=>$products,
            'status'=>'sukses',
            'counts'=>$products->count()
        ];
        return $response;
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->entry_date = $request->entry_date;
        $product->stok = $request->stok;
        $product->save();
        if($product){
            $response = [
                'status'=>'sukses',
                'data'=>$product
            ];
        }
        else{
            $response = ['status'=>'error input'];
        }
        return $response;

    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        //dd($request->all());
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->entry_date = $request->entry_date;
        $product->stok = $request->stok;
        $product->save();
        if($product){
            $response = [
                'status'=>'sukses',
                'data'=>$product
            ];
        }
        else{
            $response = ['status'=>'error input'];
        }
        return $response;
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return ['status'=>'sukses'];
    }

}
