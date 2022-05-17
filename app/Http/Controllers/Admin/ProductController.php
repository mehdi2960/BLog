<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'price' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        Product::query()->create([
            'title'=>$request->get('title'),
            'text'=>$request->get('text'),
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),
            'view'=>$request->get('view'),
        ]);

        alert()->success('محصول مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'price' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        $product->update([
            'title'=>$request->get('title'),
            'text'=>$request->get('text'),
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),
            'view'=>$request->get('view'),
        ]);

        alert()->success('محصول مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('محصول مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->back();
    }
}
