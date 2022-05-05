<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;

class CategoriesController extends Controller
{

    public function showCategories(Request $request, string $code) 
    {
        if(!Category::where('token','=',$code)->firstOrFail()->activity){
            throw new ModelNotFoundException;
        }

        $products_select = DB::table('products')
        ->select('products.id','products.name', 'products.token', 'products.description', 'products.date_creation', 'price', 'jpeg', 'amount', 'category_id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.token', '=', $code)
        ->where('products.price', 'LIKE', $request->input('price_filter'))
        ->paginate(15);
        return view('categories',['products'=>$products_select]);
    }
}