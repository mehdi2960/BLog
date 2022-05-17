@extends('dashboard.layouts.master')
@section('title','ایجاد محصول')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{route('products.store')}}" method="post">
                                @csrf
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">نام محصول</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail111">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12">توضیحات محصول</label>
                                    <textarea class="form-control" name="text" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword11">قیمت محصول</label>
                                    <input type="price" name="price" class="form-control" id="exampleInputPassword11">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">موجودی</label>
                                    <input type="text" name="amount" class="form-control" id="exampleInputPassword12">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword12">تعداد محصول</label>
                                    <input type="text" name="view" class="form-control" id="exampleInputPassword12">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">ثبت محصول</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
