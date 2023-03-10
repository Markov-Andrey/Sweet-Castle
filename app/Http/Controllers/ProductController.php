<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
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
        $products = Product::query()->orderBy("created_at", "DESC")->paginate(3);

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

    /**
     * @param $id
     * @param CommentFormRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function comment($id, CommentFormRequest $request)
    {
        $product = Product::findOrFail($id);

        $product->comments()->create($request->validated());

        return redirect(route("products.show", $id));
    }
}
