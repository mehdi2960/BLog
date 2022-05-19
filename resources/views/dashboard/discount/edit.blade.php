@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-9">
                            <p> ویرایش تخفیف برای محصول: {{$product->title}}</p>
                            <form action="{{route('product.discount.update',['product'=>$product->id,'discount'=>$discount->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('sections.error')
                                <div class="form-group">
                                    <label for="exampleInputEmail111">تخفیف</label>
                                    <input  value="{{$discount->value}}" type="number" min="1" max="100" name="value" class="form-control" id="exampleInputEmail111">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">ویرایش تخفیف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
