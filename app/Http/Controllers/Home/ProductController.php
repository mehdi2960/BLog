<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::query()->latest()->paginate(10);
        return view('home.products.show',compact('products'));
    }

    public function singleProduct(Product $product)
    {
        return view('home.products.single',compact('product'));
    }
}
