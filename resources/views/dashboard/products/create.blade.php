@extends('dashboard.layouts.master')
@section('title','ایجاد محصول')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">

                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                       href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">اطلاعات
                                        پایه</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                       href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">افزودن
                                        ویژگی</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="col-sm-6 col-xs-6">
                                        <form action="{{route('products.store')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @include('sections.error')
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">نام محصول</label>
                                                <input type="text" name="title" class="form-control"
                                                       id="exampleInputEmail111">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">توضیحات محصول</label>
                                                <textarea class="form-control" name="text" id="" cols="30"
                                                          rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">دسته بندی محصول</label>
                                                <select name="categories[]" id="" multiple class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail12">عکس محصول</label>
                                                <input type="file" name="image" class="form-control"
                                                       id="exampleInputEmail12">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword11">قیمت محصول</label>
                                                <input type="price" name="price" class="form-control"
                                                       id="exampleInputPassword11">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword12">موجودی</label>
                                                <input type="text" name="amount" class="form-control"
                                                       id="exampleInputPassword12">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword12">تعداد محصول</label>
                                                <input type="text" name="view" class="form-control"
                                                       id="exampleInputPassword12">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">ثبت محصول</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    @foreach($attributes as $attribute)
                                        <label for="{{$attribute->id}}">{{$attribute->name}}</label>
                                        <select class="form-control"  name="attributeValues[]" id="{{$attribute->id}}">
                                            @foreach($attributeValues as $attributeValue)
                                                @if($attribute->id==$attributeValue->attribute_id)
                                                <option value="{{$attribute->id}}-{{$attributeValue->id}}">{{$attributeValue->value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
