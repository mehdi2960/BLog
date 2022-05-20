<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes=Attribute::all();
        return view('dashboard.attributes.all',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        Attribute::query()->create([
            'name'=>$request->get('name')
        ]);

        alert()->success('ویژگی برای محصول شما ایجاد گردید','با تشکر');
        return redirect(route('attributes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('dashboard.attributes.edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $attribute->query()->update([
            'name'=>$request->get('name')
        ]);

        alert()->success('ویژگی برای محصول شما ویرایش گردید','با تشکر');
        return redirect(route('attributes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return back();
    }

    public function getValues(Attribute $attribute)
    {
        $values=AttributeValue::query()->where('attribute_id',$attribute->id)->get();
        return view('dashboard.attributes.value',compact('attribute','values'));
    }

    public function postValues(Request $request)
    {
        $request->validate([
            'value'=>'required'
        ]);

        AttributeValue::query()->create([
            'attribute_id'=>$request->get('attribute_id'),
            'value'=>$request->get('value'),
        ]);

        return back();
    }
}
