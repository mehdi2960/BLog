<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $categories=Category::all();
        return view('dashboard.products.create',compact('categories'));
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
        $path = $request->file('image')->storeAs(
            'public/image-product',$request->file('image')->getClientOriginalName()
        );
        $date=$request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg,svg,mpeg|max:1024',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'categories' => 'required',
        ]);

        $product=Product::query()->create([
            'title'=>$request->get('title'),
            'text'=>$request->get('text'),
            'image'=>$path,
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),
            'view'=>$request->get('view'),
            'categories'=>$request->get('categories'),
        ]);

        $product ->categories()->sync($date['categories']);

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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('dashboard.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $path = $product->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                'public/image-product',$request->file('image')->getClientOriginalName()
            );
        }

        $data=$request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'categories' => 'required',
        ]);

        $product->update([
            'title'=>$request->get('title'),
            'text'=>$request->get('text'),
            'image'=>$path,
            'price'=>$request->get('price'),
            'amount'=>$request->get('amount'),
            'view'=>$request->get('view'),
            'categories'=>$request->get('categories'),
        ]);
        $product ->categories()->sync($data['categories']);

        alert()->success('محصول مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        alert()->success('محصول مورد نظر ایجاد شد', 'باتشکر');
        return redirect()->back();
    }
}
