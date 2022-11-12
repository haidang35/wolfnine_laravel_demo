<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function save(ProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->title,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'desc' => $request->description,
            'thumbnail' => $request->thumbnail,
            'seller_stock' => $request->seller_stock,
        ]);
        return response()->json($product, Response::HTTP_CREATED);
    }
}
