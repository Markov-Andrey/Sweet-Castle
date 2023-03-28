<?php

namespace App\Http\Controllers;

use App\Models\Product;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Pagination (3) of product cards
     */
    public function index()
    {
        $products = Product::query()->orderBy("created_at", "DESC")->paginate(9);

        return view('products.index', [
            "products" => $products,
        ]);
    }

    /**
     * Show product card
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            "product" => $product,
        ]);
    }
}
