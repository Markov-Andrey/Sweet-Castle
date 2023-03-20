<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{
    private $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::query()
            ->orderBy("created_at", "DESC")
            ->paginate(5);

        return view('admin.products.index', [
            "products" => $products,
        ]);
    }
}
