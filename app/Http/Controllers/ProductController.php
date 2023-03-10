<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::query()->orderBy("created_at", "DESC")->paginate(3);

        return view('products.index', [
            "products" => $products,
        ]);
    }

    /**
     * Show product card
     * @param $id
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            "product" => $product,
        ]);
    }

    /**
     * @param $id
     * @param CommentForm $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function comment($id, CommentForm $request)
    {
        $product = Product::findOrFail($id);

        $product->comments()->create($request->validated());

        return redirect(route("products.show", $id));
    }
}
