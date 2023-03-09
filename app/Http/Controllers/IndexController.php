<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy("created_at","DESC")->limit(3)->get();

        return view('welcome', [
            "products" => $products,
        ]);
    }
}
