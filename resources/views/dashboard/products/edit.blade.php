@extends('dashboard.layouts.master')
@section('title','ویرایش محصول')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{route('products.update',['product'=>$product->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام محصول</label>
                                    <input type="text" name="title" value="{{$product->title}}"  class="form-control" id="exampleInputEmail111">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12">توضیحات محصول</label>
                                    <textarea class="form-control" name="text" id="" cols="30" rows="10">{{$product->text}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword11">قیمت محصول</label>
                                    <input type="price" name="price" value="{{$product->price}}" class="form-control" id="exampleInputPassword11">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">موجودی</label>
                                    <input type="text" name="amount" value="{{$product->amount}}" class="form-control" id="exampleInputPassword12">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">بازدید محصول</label>
                                    <input type="text" name="view" value="{{$product->view}}" class="form-control" id="exampleInputPassword12">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">ویرایش محصول</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
