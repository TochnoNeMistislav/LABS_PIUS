<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{

    public function showProducts(Request $request, string $code) 
    {
        $product=Product::where('token','=',$code)->firstOrFail();

        return view('products', ['product'=>$product]);
    }
}