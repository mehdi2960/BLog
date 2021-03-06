<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
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
        $attributes=Attribute::all();
        $attributeValues=AttributeValue::all();
        return view('dashboard.products.create',compact('categories','attributes','attributeValues'));
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
        $attributeValues = $request->attributeValues;
//        dd($attributeValues);
//        foreach ($attributeValues as $attributeValue){
//            $attributeForProduct =  explode('-',$attributeValue);
////            $attribute_value[] =
//        }

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

        //Image
//        if ($request->image){
//            $image = $request->image;
//            $path = time() . $image->getClientOriginalName();
//            $path = str_replace(' ', '-',$path);
//            $image->move('storage/products/',$path);
//            $path = 'storage/products/'.$path;
//        }

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

        $product->attributes()->attach($attributeForProduct[0],['value_id' => $attributeForProduct[1]]);

        alert()->success('?????????? ???????? ?????? ?????????? ????', '????????????');

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

        alert()->success('?????????? ???????? ?????? ???????????? ????', '????????????');
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
        alert()->warning('?????????? ???????? ?????? ?????? ????', '?????? ????????');
        return redirect()->back();
    }
}
